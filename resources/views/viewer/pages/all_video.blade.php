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

                        {{--                        <li><strong itemprop="title">Sách yêu thích</strong></li>--}}

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        <div class="row">
            <section class="products-view products-view-grid">
                <div class="row">


                    <div class="category-view">
                        <div class="title">
                            <span>Tin tức</span>
                        </div>
                        <ul class="product-list">
                            @foreach($videos as $video)
                                <li>
                                    <div>
                                        <a href="{{route('get-video', ['slug'=> $video->slug])}}"
                                           class="tacpham-main-img"><img
                                                src="{{asset('upload/admin/New/image/' . $video->image)}}"
                                                title="{{$video->name}}">
                                        </a>
                                    </div>
                                    <div class="book-infor">
                                        <div class="prodouct-name">
                                            <a href="{{route('get-video', ['slug'=> $video->slug])}}"
                                               title="{{$video->name}}">
                                                {{$video->name}} </a>
                                        </div>

                                        <div> Tác giả: <a
                                                href="{{route('get-video', ['slug'=> $video->slug])}}"><span
                                                    class="tacgia">  {{$video->author}} </span></a></div>
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
                        {{$videos->links()}}
                    </nav>

                </div>

            </section>
        </div>
    </div>
@endsection
