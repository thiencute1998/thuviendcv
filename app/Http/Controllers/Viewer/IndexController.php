<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Viewer\ContactRequest;
use App\Models\BookFavorite;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Viewer\IndexRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    private $repository;

    public function __construct(IndexRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        return $this->repository->index();
    }

    public function getCate($cate) {
        $bookDetail = $this->repository->getBookDetail($cate);
        if ($bookDetail) {
            // chi tiet sach
            $bookCategories = $bookDetail->category_id ? $this->repository->getBookByCategory($bookDetail->category_id, $bookDetail->id) : [];
            return view('viewer.pages.book_detail', compact('bookDetail', 'bookCategories'));
        } else {
            $category = Category::where('status', 1)->where('slug', $cate)->firstOrFail();
            if ($category) {
                // List sach theo danh muc
                $books = $this->repository->getBooks($category);
                if (count($books)) {
                    return view('viewer.pages.books', compact('books'));
                } else {
                    // List danh muc
                    $data = $this->repository->getCate($cate);
                    $parentCate = $data['parentCate'];
                    $categories = $data['categories'];
                    return view('viewer.pages.category', compact('parentCate', 'categories'));
                }
            }
        }
    }

    public function getAllGreatBook() {
        $greatBooks = $this->repository->getAllGreatBook();
        return view('viewer.pages.book_great_all', compact('greatBooks'));
    }

    public function getBookBorrow() {
        return view('viewer.pages.book_borrow');
    }

    public function postBookBorrow(Request $request) {
        return $this->repository->postBookBorrow($request->only('user_borrow', 'book_borrow'));
    }

    public function getBookFavorite() {
        if (auth()->user()) {
            $bookFavorites = BookFavorite::where('user_id', auth()->user()->id)
                ->with('book')->paginate(10);
            return view('viewer.pages.book_favorite', compact('bookFavorites'));
        } else {
            return redirect()->route('get-login-user');
        }

    }

    public function addBookFavorite(Request $request) {
        return $this->repository->addBookFavorite($request->only('book_id'));
    }

    public function plusCountBook(Request $request) {
        $this->repository->plusCountBook($request->only('book_id'));
    }

    public function getIntroduce() {
        return $this->repository->getConfig('introduce');
    }

    public function getRule() {
        return $this->repository->getConfig('rule');
    }

    public function getInstruct() {
        return $this->repository->getConfig('instruct');
    }

    public function getContact() {
        return view('viewer.pages.contact');
    }

    public function postContact(ContactRequest $request) {
        $this->repository->postContact($request->only('name', 'email', 'phone', 'content'));
        return redirect("contact")->with('contact-success', 'Liên hệ thành công!');
    }

    public function search(Request $request) {
        $books = $this->repository->search($request->get('typesearch'), $request->get('q'));
        return view('viewer.pages.search_book', compact('books'));
    }





    // Khong dung
    public function getPost($post) {
        $category = $this->repository->getCate($post);
        if ($category) {
            $posts = $this->repository->paginatePost($category);
            return view('viewer.pages.category', compact('category', 'posts'));
        } else {
            $post = $this->repository->getPost($post);
            $postRelated = $this->repository->getPostRelated($post);
            return view('viewer.pages.post', compact('post', 'postRelated'));
        }
    }

    public function getEventCalendar($event) {
        $event = $this->repository->getEventCalendar($event);
        $eventRelated = $this->repository->getEventRelated();
        return view('viewer.pages.event_detail', compact('event', 'eventRelated'));
    }

    public function getEvent(Request $request){
        return $this->repository->getEvent($request->only('date'));
    }

    public function events() {
        $events = $this->repository->events();
        return view('viewer.pages.events', compact('events'));
    }

    public function getTag($tag) {
        $data = $this->repository->getTag($tag);
        $tag = $data['tag'];
        $posts = $data['posts'];
        return view('viewer.pages.tag', compact('tag', 'posts'));
    }

    public function findChurch() {
        return view('viewer.pages.find_church');
    }

    public function getVideo($video) {
        $video = $this->repository->getVideo($video);
        $videoRelated = $this->repository->getVideoRelated($video);
        return view('viewer.pages.video', compact('video', 'videoRelated'));
    }

    public function getMap() {
        $map = $this->repository->getMap();
        return view('viewer.pages.map', compact('map'));
    }

    public function searchPost(Request $request) {
        return $this->repository->searchPost($request->only('post'));
    }

    public function searchAllPost($post) {
        $posts = $this->repository->searchAllPost($post);
        return view('viewer.pages.find_post', compact('posts'));
    }

    public function signUpEmail(Request $request) {
        $params = $request->only('email');
        return $this->repository->signUpEmail($params);
    }

    public function plusViewPost(Request $request) {
        $params = $request->only('slug');
        $this->repository->plusViewPost($params);
    }

    public function plusViewEvent(Request $request) {
        $params = $request->only('slug');
        $this->repository->plusViewEvent($params);
    }
}
