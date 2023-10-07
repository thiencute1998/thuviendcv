@extends('viewer.layouts.master')
@section('main-content')

    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        <div class="row">
            <section class="products-view products-view-grid">
                <div class="row">


                    <div class="category-view">
                        <div class="title">
                            <span>Sách nổi bật</span>
                        </div>
                        <ul class="product-list">
                            @foreach($greatBooks as $book)
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
                        {{$greatBooks->links()}}
                    </nav>

                </div>

            </section>
        </div>
    </div>
@endsection
