@extends('viewer.layouts.master')
@section('main-content')
    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        @if(count($categories))
            <div class="row">
                <section class="mn-content col-md-12 list-blog-page">
                    <div class="category-list">
                        <div class="title">
                            {{$parentCate ? $parentCate->name : ""}}
                        </div>

                        <div class="ddc-list-10">
                            @foreach($categories as $category)
                                <div class="ddc-list-item">
                                    <a href="{{route('get-cate', ['cate'=> $category->slug])}}">
                                        <p>{{$category->name}} <span class="count-tp-list">({{$category->posts_count}})</span> </p>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>
            </div>
        @endif
            <hr>
        @if(count($books))
            <div class="row">
                <section class="products-view col-md-12 products-view-grid">
                    <div class="row">

                        <div class="category-view">
                            <div class="title">
                                <span>{{$parentCate ? $parentCate->name : ""}}</span>
                            </div>
                            <ul class="product-list">
                                @foreach($books as $book)
                                    <li>
                                        <div>
                                            <a href="{{route('get-cate', ['cate'=> $book->slug])}}"
                                               class="tacpham-main-img"><img
                                                    src="{{asset('upload/admin/post/image/' . $book->image)}}"
                                                    title="{{$book->name}}">
                                            </a>
                                        </div>
                                        <div class="book-infor">
                                            <div class="prodouct-name">
                                                <a href="{{route('get-cate', ['cate'=> $book->slug])}}"
                                                   title="{{$book->name}}">
                                                    {{$book->name}} </a>
                                            </div>

                                            <div> Tác giả: <a
                                                    href="{{route('get-cate', ['cate'=> $book->slug])}}"><span
                                                        class="tacgia">  {{$book->author}} </span></a></div>
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
                    <div class="text-xs-right">

                        <nav class="text-center">
                            {{$books->links()}}
                        </nav>

                    </div>

                </section>
            </div>

        @endif

    </div>

@endsection
