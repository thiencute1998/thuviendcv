<?php

namespace App\Repositories\Viewer;

use App\Models\About;
use App\Models\Banner;
use App\Models\BookBorrow;
use App\Models\BookFavorite;
use App\Models\CalenderEvent;
use App\Models\Category;
use App\Models\Contact;
use App\Models\EmailSignUp;
use App\Models\Homepage;
use App\Models\Link;
use App\Models\NewEvent;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IndexRepository extends BaseRepository {
    public function model()
    {
        return Homepage::class;
    }

    public function index() {
        $categories = Category::where('status', 1)->where('level', 1)->orderBy('order', 'asc')->get();
        $links = Link::where('status',1)->orderBy('created_at', 'asc')->get();
        $newBooks = Post::where('status', 1)->orderBy('created_at', 'asc')->take(10)->get();
        $greatBooks = Post::where('status', 1)->orderBy('views', 'desc')->take(10)->get(); // Lay chua dung
        $news = NewEvent::where('status', 1)->where('new_type', 1)->take(10)->get();
        $videos = NewEvent::where('status', 1)->where('new_type', 2)->take(10)->get();
        $giomc = NewEvent::where('status', 1)->where('new_type', 3)->get();
        return view('viewer.pages.index', compact('categories', 'links', 'newBooks', 'greatBooks', 'news', 'videos', 'giomc'));
    }
    public function getCate($cate) {
        $parentCate = Category::where('status', 1)->where('slug', $cate)->first();
        $categories = collect([]);
        if($parentCate) {
            $categories = Category::where('status', 1)
                ->withCount('posts')
                ->where('parent_id', $parentCate->id)->get();
        }
        return ['parentCate'=> $parentCate, 'categories'=> $categories];
    }

    public function getBooks($category) {
        return Post::where('status', 1)
            ->where('category_id', $category->id)
            ->paginate(10);
    }

    public function getBookDetail($slug) {
        $query = Post::where('status', 1)
            ->where('slug', $slug);
        $query->with('bookVersion');

        return $query->first();
    }

    public function getBookByCategory($category_id, $id = null) {
        $query =  Post::where('status', 1)->where('category_id', $category_id);
        if ($id) {
            $query->where('id', '!=' , $id);
        }
        return $query->orderBy('created_at', 'asc')->take(10)->get();
    }

    public function getAllGreatBook() {
        // chua dung
        return Post::where('status', 1)
            ->where('views', '!=',0)
            ->orderBy('views', 'desc')
            ->paginate(10);
    }

    public function postBookBorrow($params) {
        $userParams = $params['user_borrow'];
        $user = User::where('code', $userParams['user_code'])->first();
//        if (!$user) {
//            return "ko co ma doc gia";
//        } else {
//            $user = User::where('email', $userParams['user_email'])->first();
//            if (!$user) {
//                return "ko co email";
//            } else {
                $user = User::where('code', $userParams['user_code'])
                    ->where('email', $userParams['user_email'])
                    ->first();
                if (!$user) {
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'msg' => 'Mã độc giả hoặc email không tồn tại',
                    ]);
                    throw $error;
                }
//            }
//        }
        DB::beginTransaction();
        try {
            $userBorrow = new BookBorrow;
            $userBorrow->fill($params['user_borrow']);
            $userBorrow->save();
            $borrow_id = $userBorrow->id;
            $arrBook = [];
            foreach ($params['book_borrow'] as $book) {
                $arrBook[] = [
                    "book_borrow_id"=> $borrow_id,
                    "book_code" => $book['code'],
                    "book_name"=> $book['name'],
                    "book_author"=> $book['author'],
                ];
            }

            DB::table('book_borrow_details')->insert($arrBook);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return 1;
    }

//    public function getBookFavorite() {
//        return BookFavorite::where('user_id', auth()->user()->id)
//            ->with('book')->get();
//
//    }

    public function addBookFavorite($params) {
        if (auth()->user()) {
            if(isset($params['book_id'])) {
                $user_id = auth()->user()->id;
                $book = BookFavorite::where('book_id', $params['book_id'])
                    ->where('user_id', $user_id)->first();
                if(!$book) {
                    $bookNew = new BookFavorite;
                    $bookNew->user_id = $user_id;
                    $bookNew->book_id = $params['book_id'];
                    $bookNew->save();
                }
            }
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'msg' => 'Not Authentication',
            ]);
            throw $error;
        }
        return 1;
    }

    public function plusCountBook($params) {
        if (isset($params['book_id'])) {
            $book = Post::where('id', $params['book_id'])->first();
            Post::where('id', $params['book_id'])->update(['views'=> $book->views + 1]);
        }
    }

    public function getCategoryLevel($level) {
        return Category::where('status', 1)->where('level', $level)->get();
    }

    public function getConfig($view) {
        $categories = $this->getCategoryLevel(1);
        $config =  About::first();
        return view('viewer.pages.' . $view, compact('config', 'categories'));
    }

    public function postContact($params) {
        $contact = new Contact;
        $contact->fill($params);
        $contact->save();
    }

    public function search($type, $item) {
        $query = Post::where('status', 1);
        if ($type) {
            switch ($type) {
                case "tacpham":
                    if ($item) {
                        $query->where('name', 'like',"%$item%");
                    }
                    break;
                case "tacgia":
                    if ($item){
                        $query->where('author', 'like',"%$item%");
                    }
                    break;
                case "ngonngu":
                    if ($item){
                        $query->where('language',$item);
                    }
                    break;
            }
        }

        $query->orderBy('created_at', 'desc');
        return $query->paginate(10);
    }

    public function getNewByType($slug, $type = 1) {
        return NewEvent::where('status', 1)->where('new_type', $type)
            ->where('slug', $slug)->firstOrFail();
    }

    public function getAllNewByType($type = 1) {
        return NewEvent::where('status', 1)
            ->where('new_type', $type)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }



    // ko dung
    public function getVideoIndex() {
        $query = Video::where('status', 1);
        $query->orderBy('created_at', 'desc');
        return $query->take(4)->get();
    }

    public function paginatePost($category) {
        $posts = collect();
        if ($category) {
            //Lấy tất cả Category con
            $arrcategory_id = [];
            $childCategory = Category::where('parent_id', $category->id)->get();
            if($childCategory){
                foreach($childCategory as $item){
                    $arrcategory_id[] = $item->id;
                }
            }
            $queryPost = Post::where('status', 1);
            //$queryPost->where('category_id', $category->id);
            $queryPost->where(function($q) use ($category, $arrcategory_id) {
                $q->where('category_id', '=', $category->id)
                    ->orWhereIn('category_id', $arrcategory_id);
            });
            $queryPost->with('category');
            $posts = $queryPost->paginate(10);
            return $posts->through(function ($value) {
                $value->fullDate = $value->created_at;
                if ($value->created_at) {
                    $value->fullDate = $this->formatVNFullDate($value->created_at, "Y-m-d H:i:s");
                }
                return $value;
            });
        }
        return $posts;
    }
    public function getPost($post) {
        //Update View
        $postNew = Post::where('slug', $post)->first();
        $postNew->views = $postNew->views +1 ;
        $postNew->update();
        $query = Post::where('status', 1);
        $query->where('slug', $post);
        $query->with('category');
        return $query->firstOrFail();
    }

    public function getPostRelated($post) {
        $query = Post::where('status', 1);
        $query->where('id', '!=',$post->id);
        if ($post->category_id) {
            $query->where('category_id', $post->category_id);
        }
        $query->orderBy('created_at', 'desc');
        return $query->limit(10)->get()->map(function($value) {
            $value->fullDate = $value->created_at;
            if ($value->created_at) {
                $value->fullDate = $this->formatDate($value->created_at, 'Y-m-d H:i:s');
            }
            return $value;
        });
    }

    public function getEventCalendar($event) {
        $query = CalenderEvent::where('status', 1);
        $query->where('slug', $event);
        return $query->firstOrFail();
    }

    public function getEventRelated() {
        $query = Post::where('status', 1);
        $query->orderBy('created_at', 'desc');
        return $query->limit(3)->get();
    }

    public function getEvent($params) {
        $query = CalenderEvent::query();
        $query->where('status', 1);
        $formatFullDate = "";
        if ($params['date']){
            $date = Carbon::createFromFormat('d/m/Y', $params['date'])->format('Y-m-d');
            $formatFullDate = $this->formatVNFullDate($date);
            $query->where('d_date', $date);
        }

        $data = $query->get()->map(function ($value) {
            $value->full_date = $this->formatVNFullDate($value->d_date);
            $value->d_date = $this->formatVNDate($value->d_date);
            return $value;
        });
        return ['formatFullDate'=> $formatFullDate, 'data'=> $data];
    }

    public function events() {
        $query = CalenderEvent::where('status', 1);
        $query->orderBy('created_at', 'asc');
        $data = $query->paginate(10);
        return $data->through(function ($value) {
            $value->fullDate = $value->created_at;
            if ($value->created_at) {
                $value->fullDate = $this->formatVNFullDate($value->created_at, "Y-m-d H:i:s");
            }
            return $value;
        });
    }

    public function getVideo($video) {
        $query = Video::where('slug', $video);
        return $query->firstOrFail();
    }

    public function getVideoRelated($video) {
        $query = Video::where('status', 1);
        $query->where('id', '!=',$video->id);
        $query->orderBy('created_at', 'desc');
        return $query->limit(3)->get();
    }

    public function formatDate($date, $format = 'Y-m-d') {
        if ($date) {
            $day = Carbon::createFromFormat($format,$date)->format('d');
            $month = Carbon::createFromFormat($format,$date)->format('m');
            $year = Carbon::createFromFormat($format,$date)->format('Y');
            $date = $day . "/". $month . "/" . $year;
        }
        return $date;
    }

    public function formatVNDate($date) {
        if ($date) {
            $day = Carbon::createFromFormat('Y-m-d',$date)->format('d');
            $month = Carbon::createFromFormat('Y-m-d',$date)->format('m');
            $year = Carbon::createFromFormat('Y-m-d',$date)->format('y');
            $date = $day . " Thg". $month . " " . $year;
        }
        return $date;
    }

    public function formatVNFullDate($date, $format = 'Y-m-d') {
        if ($date) {
            $day = Carbon::createFromFormat($format,$date)->format('d');
            $month = Carbon::createFromFormat($format,$date)->format('m');
            $year = Carbon::createFromFormat($format,$date)->format('Y');
            $date = $day . " " . $this->getMonth($month) . ", " . $year;
        }
        return $date;
    }

    public function getMonth($month) {
        $fullMonth = "Tháng ";
        switch ((int) $month) {
            case 1:
                $fullMonth .= "Một";
                break;
            case 2:
                $fullMonth .= "Hai";
                break;
            case 3:
                $fullMonth .= "Ba";
                break;
            case 4:
                $fullMonth .= "Tư";
                break;
            case 5:
                $fullMonth .= "Năm";
                break;
            case 6:
                $fullMonth .= "Sáu";
                break;
            case 7:
                $fullMonth .= "Bảy";
                break;
            case 8:
                $fullMonth .= "Tám";
                break;
            case 9:
                $fullMonth .= "Chín";
                break;
            case 10:
                $fullMonth .= "Mười";
                break;
            case 11:
                $fullMonth .= "Mười Một";
                break;
            case 12:
                $fullMonth .= "Mười Hai";
                break;
        }
        return $fullMonth;
    }

    public function getMap() {
        return About::first();
    }

    public function searchPost($params) {
        $query = Post::where('status', 1);
        if (isset($params['post'])) {
            $post = $params['post'];
            $query->where('name', 'like', "%$post%");
        }
        $query->orderBy('created_at', 'desc');
        return $query->take(3)->get()->map(function($value) {
            $value->fullDate = $value->created_at;
            if ($value->created_at) {
                $value->fullDate = $this->formatVNFullDate($value->created_at, 'Y-m-d H:i:s');
            }
            $value->slug_path = route('get-post', $value->slug);
            $value->image_path = asset('upload/admin/post/image/' . $value->image);
            return $value;
        });
    }

    public function searchAllPost($post) {
        $query = Post::where('status', 1);
        if (isset($post)) {
            $query->where('name', 'like', "%$post%");
        }
        $query->with('category');
        $query->orderBy('created_at', 'desc');
        $data = $query->paginate(10);
        return $data->through(function ($value) {
            $value->fullDate = $value->created_at;
            if ($value->created_at) {
                $value->fullDate = getDateDiff($value->created_at);
            }
            return $value;
        });
    }

    public function signUpEmail($params) {
        if (isset($params['email'])) {
            $email = EmailSignUp::where('email', $params['email'])->first();
            if (!$email) {
                $email = new EmailSignUp;
                $email->fill($params);
                $email->save();
            }
        }

        return 1;
    }

    public function plusViewPost($params) {
        if(isset($params['slug'])) {
            $post = Post::where('status', 1)->where('slug', $params['slug'])->first();
            if($post) {
                $post->views = $post->views + 1;
                $post->save();
            }
        }
    }

    public function plusViewEvent($params) {
        if(isset($params['slug'])) {
            $event = CalenderEvent::where('status', 1)->where('slug', $params['slug'])->first();
            if($event) {
                if ($event->views === null) {
                    $event->views = 0;
                } else {
                    $event->views = $event->views + 1;
                }
                $event->save();
            }
        }
    }
}
