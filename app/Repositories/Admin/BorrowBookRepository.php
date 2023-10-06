<?php

namespace App\Repositories\Admin;

use App\Models\BookBorrowDetail;
use App\Models\BorrowBook;
use App\Repositories\BaseRepository;

class BorrowBookRepository extends BaseRepository {

    public function model()
    {
        return BorrowBook::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['search'])) {
            $search = $searchParams['search'];
            $query->where('email', 'like', "$search%");
        }

        $query->orderBy('created_at', 'desc');
        $borrowbooks = $query->paginate(10);
        //Sách mượn
        $bookborrowdetails = BookBorrowDetail::orderBy('id', 'asc')->get();
        return view('admin.pages.borrow-book.index', compact('borrowbooks','bookborrowdetails'));
    }
}
