@extends('viewer.layouts.master')
@section('main-content')
    <section class="bread-crumb margin-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <li class="home">
                            <a itemprop="url" href="/" title="Trang chủ"><span itemprop="title">Trang chủ</span></a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>

                        <li><strong itemprop="title">Tìm kiếm</strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        <div class="row">
            <section class="products-view products-view-grid">
                <div class="main-container col1-layout">
                    <div class="main">
                        <div class="col-main">
                            <div class="category-view">
                                <div class="title">
                                    <span>Có <span id="count-search-result">{{count($books)}}</span> kết quả tìm kiếm 				<i>Tên tác phẩm</i>: <b><i>Giải nghĩa Kinh Thánh</i></b>				</span>

                                </div>

                                <ul class="product-list">
                                    @foreach($books as $book)
                                        <li>
                                            <div>
                                                <a href="{{route('get-cate', ['cate'=> $book->slug])}}"
                                                   class="tacpham-main-img"><img src="{{asset('upload/admin/post/image/' . $book->image)}}"
                                                 title="{{$book->name}}">
                                                </a>

                                            </div>
                                            <div class="book-infor">
                                                <div class="prodouct-name">
                                                    <a href="{{route('get-cate', ['cate'=> $book->slug])}}" title="{{$book->name}}">
                                                        {{$book->name}}                                </a>
                                                </div>

                                                <div>Tập số: {{$book->episode}}</div>
                                                <div> Tác giả: <a href="#"><span class="tacgia"> {{$book->author}} </span></a></div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="toolbar">

                                    <div class="pager pager-no-toolbar">

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-xs-right">

                    <nav class="text-center">
                        {{$books->links()}}
                    </nav>

                </div>

            </section>
        </div>
    </div>
@endsection
