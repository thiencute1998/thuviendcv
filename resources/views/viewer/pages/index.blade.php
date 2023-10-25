@extends('viewer.layouts.master')
@section('main-content')
    <section class="awe-section-3">
        <div class="section_slide">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 hidden-sm hidden-xs" style="padding-right:0px;">
                        <div class="mainmenu">
                            <div class="danhmucsach">
                                <ul id="menu">
                                    @foreach($categories as $category)
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>
                                            <a href="{{route('get-cate', ['cate'=> $category->slug])}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <div class="img-bt-home">
                            <a href="" target="_blank"><img
                                    src="{{ asset('assets/viewer/style/images/thuvien_left.png') }}" width="272"
                                    height="132"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <section class="awe-section-1">
                                <div class="slogan">
                                    <marquee  onMouseOver="this.stop()" onMouseOut="this.start()">
                                        <p>
                                            <em><a href="{{route('get-all-great-book')}}"
                                                   target="_blank"><strong style="color: #268102;">Sách Hay Nên Đọc (bấm
                                                        vào
                                                        để xem):</strong></a><span style="color: #268102;">&nbsp;</span>
                                                &nbsp;

                                                <span style="color: #268102;">
                                                    @foreach($greatBooks as $keyGreatBook=> $greatBook)
                                                        @if ($keyGreatBook < 6)
                                                        <a
                                                            href="{{route('get-cate', ['cate'=> $greatBook->slug])}}"
                                                            target="_blank">
                                                            <span style="color: #268102;">{{$greatBook->name}}
                                                                (<span>{{$greatBook->author}}</span>)&nbsp;
                                                            </span>
                                                        </a>
                                                        @endif
                                                    @endforeach
                                                </span>

                                            </em></p>
                                    </marquee>
                                </div>
                                <div class="home-slider owl-carousel not-dqowl">

                                    @foreach($greatBooks as $keyGreatBook=> $greatBook)
                                        @if ($keyGreatBook < 6)
                                        <div class="item">
                                            <a href="{{route('get-cate', ['cate'=> $greatBook->slug])}}" class="clearfix">
                                                <picture>
                                                    <img src="{{$greatBook->image ? asset('upload/admin/post/image/' . $greatBook->image) : "assets/viewer/style/images/noname.jpg"}}" alt="{{$greatBook->name}}"
                                                         class="img-responsive center-block" width="278" height="421"/>
                                                </picture>
                                            </a>
                                            <p style="width: 48%; margin: auto; opacity: 0.8; background: rgba(80, 80, 80, 0.75); padding: 5px; color: #FFF">{{$greatBook->name}}</p>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>

                            </section>

                        </div>
                    </div>
                    <div class="col-md-3">

                        <div class="row">
                            <section class="menu-header">
                                <div class="col-md-9 hidden-sm hidden-xs" style="width:100%;">
                                    <div class="boder-wap">
                                        <nav class="hidden-sm hidden-xs">
                                            <ul id="nav">
                                                <li class="nav-item "><i class="fa fa-chevron-right"
                                                                         aria-hidden="true"></i><a
                                                        class="nav-link" href="{{route('introduce')}}">Giới Thiệu</a></li>
                                                <li class="nav-item "><i class="fa fa-chevron-right"
                                                                         aria-hidden="true"></i><a
                                                        class="nav-link" href="{{route('rule')}}">Nội Quy</a></li>
                                                <li class="nav-item "><i class="fa fa-chevron-right"
                                                                         aria-hidden="true"></i><a
                                                        class="nav-link" href="{{route('instruct')}}">Hướng Dẫn</a></li>
                                                <li class="nav-item "><i class="fa fa-chevron-right"
                                                                         aria-hidden="true"></i><a
                                                        class="nav-link" href="{{route('contact')}}">Liên Hệ</a></li>


                                                <li class="nav-item  has-mega"><i class="fa fa-chevron-right"
                                                                                  aria-hidden="true"></i>
                                                    <a href="/collections/all" class="nav-link">Liên Kết <i
                                                            class="fa fa-angle-down" aria-hidden="true"></i></a>

                                                    <div class="mega-content">
                                                        <div class="level0-wrapper2">
                                                            <div class="nav-block nav-block-center">
                                                                <ul class="level0">
                                                                    @foreach($links as $link)
                                                                        <li class="level1 item">
                                                                            <a href="{{$link->link}}"><span>{{$link->name}}</span></a>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </section>
                            <div class="clearfix"></div>
                            <section class="awe-section-2">
                                <div class="section_banner_home">

                                    <div class="row">
                                        <div class="col-md-9" style="width:100%;">
                                            <div class="boder-wap">
                                                <section class="awe-section-1">

                                                    <div class="home-slider owl-carousel not-dqowl">
                                                        @foreach($giomc as $item)
                                                        <div class="item">
                                                            <h3>{{$item->name}}</h3>
                                                            <a href="#" class="clearfix">
                                                                <picture>
                                                                    <img
                                                                        src="{{$item->image ? (asset('upload/admin/New/image/' . $item->image)) : asset('assets/viewer/style/images/noname.jpg') }}"
                                                                        width="252"
                                                                        height="337" alt=""
                                                                        class="img-responsive center-block"/>
                                                                </picture>
                                                            </a>

                                                        </div>
                                                        @endforeach
{{--                                                        <div class="item">--}}
{{--                                                            <h3>{{$giomc ? $giomc->name : ""}}</h3>--}}
{{--                                                            <a href="#" class="clearfix">--}}
{{--                                                                <picture>--}}
{{--                                                                    <img--}}
{{--                                                                        src="{{$giomc ? (asset('upload/admin/New/image/' . $giomc->image)) : asset('assets/viewer/style/images/giomc.png') }}"--}}
{{--                                                                        width="252"--}}
{{--                                                                        height="337" alt=""--}}
{{--                                                                        class="img-responsive center-block"/>--}}
{{--                                                                </picture>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}

                                                    </div>

                                                </section>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach($homes as $home)
    <section class="awe-section-6">
        <div class="section_product">
            <div class="container padding-top">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-head-1">
                                    <h2>{{$home->name}}</h2>
                                </div>
                            </div>
                            <div class="col-md-12 e-tabs not-dqtab ajax-tab-3" data-section="ajax-tab-3"
                                 data-view="grid_4">
                                <div class="content margin-content">
                                    <div>
                                        <div class="tab-1 tab-content">
                                            <div class="section-tour-owl3 products products-view-grid owl-carousel"
                                                 data-lg-items='5' data-md-items='5' data-sm-items='3' data-xs-items="2"
                                                 data-xss-items="2" data-margin='10' data-nav="true" data-dot="false">
                                                @foreach($home->books as $book)
                                                    <div class="item">
                                                        <div class="ant-product-item">
                                                            <div class="product_row">
                                                                <div class="item">
                                                                    <div class="item-inner">
                                                                        <div class="image-container">
                                                                            <a href="{{route('get-cate', ['cate'=> $book->slug])}}"
                                                                               class="product-item-photo">
                                                                                <img
                                                                                    class="product-image-photo img-responsive center-block"
                                                                                    src="{{ asset('upload/admin/post/image/' . $book->image) }}"
                                                                                    data-lazyload="{{ asset('upload/admin/post/image/' . $book->image) }}"
                                                                                    alt="{{$book->name}}"/>
                                                                            </a>
                                                                        </div>
                                                                        <div class="box-info">
                                                                            <h2 class="product-item-name">
                                                                                <a title="{{$book->name}}"
                                                                                   href="{{route('get-cate', ['cate'=> $book->slug])}}"
                                                                                   class="product-item-link">
                                                                                    {{$book->name}}
                                                                                </a>
                                                                            </h2>
                                                                            <div class="product-reviews-summary">
                                                                                <div class="rating-summary">
                                                                                    <div
                                                                                        class="haravan-product-reviews-badge"
                                                                                        data-id="1017908255"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="item-price-1">
                                                                                <div class="price-box price-final_price">
                                                                                    <span class="special-price">
                                                                                        <span class="price-container">
                                                                                            <span class="price-wrapper-1">
                                                                                                Tác giả: <span class="price">{{$book->author}}</span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    <section class="awe-section-10">
        <section class="section-news margin-0">
            <div class="container">
                <div class="blogs-content">
                    <div class="heading">
				<span class="group-icon">
					<i class="fa fa-newspaper-o" aria-hidden="true"></i>
				</span>
                        <h2 class="title-head">
                            Tin tức
                        </h2>
                        <a href="{{route('get-all-new')}}" class="news-more" title="Xem thêm">Xem thêm</a>
                    </div>
                    <div class="list-blogs-link">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-news-owl owl-carousel not-dqowl">
                                    @foreach($news as $new)
                                        <div class="item-inner">
                                            <div class="blog-image">
                                                <a href="{{route('get-new', ['slug'=> $new->slug])}}">

                                                    <img
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-lazyload="{{asset('upload/admin/New/image/' . $new->image)}}"
                                                        alt="{{$new->name}}"
                                                        class="img-responsive center-block"/>

                                                </a>
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-content-inner">
                                                    <h3 class="blog-title">
                                                        <a href="{{route('get-new', ['slug'=> $new->slug])}}"
                                                           title="{{$new->name}}">{{$new->name}}</a>
                                                    </h3>


                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="awe-section-12">
        <section class="section-news">
            <div class="container">
                <div class="blogs-content">
                    <div class="heading">
				<span class="group-icon">
					<i class="fa fa-video-camera" aria-hidden="true"></i>
				</span>
                        <h2 class="title-head">
                            Video
                        </h2>
                        <a href="{{route('get-all-video')}}" class="news-more" title="Xem thêm">Xem thêm</a>
                    </div>
                    <div class="list-blogs-link">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-news-owl owl-carousel not-dqowl">
                                    @foreach($videos as $key=>$video)
                                        <div class="item-inner">
                                        <div class="blog-image">
                                            <a href="{{route('get-video', ['slug'=> $video->slug])}}">

                                                <img
                                                    data-lazyload="{{asset('upload/admin/New/image/' . $video->image)}}"
                                                    alt="{{$video->name}}"
                                                    class="img-responsive center-block"/>

                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-content-inner">
                                                <h3 class="blog-title">
                                                    <a href="{{route('get-video', ['slug'=> $video->slug])}}"
                                                       title="{{$video->name}}">{{$video->name}}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
