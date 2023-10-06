<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\BorrowBookRepository;
use Illuminate\Http\Request;

class BorrowBookController extends Controller
{
    //
    private $repository;
    public function __construct(BorrowBookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }
}
