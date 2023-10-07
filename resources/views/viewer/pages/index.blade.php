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
                                                    <img src="{{asset('upload/admin/post/image/' . $greatBook->image)}}" alt=""
                                                         class="img-responsive center-block" width="278" height="421"/>
                                                </picture>
                                            </a>
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

                                                        <div class="item">
                                                            <h3>GIỜ MỞ CỬA - BAN TRIẾT</h3>
                                                            <a href="#" class="clearfix">
                                                                <picture>
                                                                    <img
                                                                        src="{{ asset('assets/viewer/style/images/giomc.png') }}"
                                                                        width="252"
                                                                        height="337" alt=""
                                                                        class="img-responsive center-block"/>
                                                                </picture>
                                                            </a>

                                                        </div>

                                                        <div class="item">
                                                            <h3>GIỜ MỞ CỬA - BAN A</h3>
                                                            <a href="#" class="clearfix">
                                                                <picture>
                                                                    <img
                                                                        src="{{ asset('assets/viewer/style/images/giomc.png') }}"
                                                                        width="252"
                                                                        height="337" alt=""
                                                                        class="img-responsive center-block"/>
                                                                </picture>
                                                            </a>
                                                        </div>

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

    <section class="awe-section-6">
        <div class="section_product">
            <div class="container padding-top">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-head-1">
                                    <h2>Sách mới nhất</h2>
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

                                                @foreach($newBooks as $newBook)
                                                    <div class="item">
                                                        <div class="ant-product-item">
                                                            <div class="product_row">
                                                                <div class="item">
                                                                    <div class="item-inner">
                                                                        <div class="image-container">


                                                                            <a href="/products/giuong-albany"
                                                                               class="product-item-photo">
                                                                                <img
                                                                                    class="product-image-photo img-responsive center-block"
                                                                                    src="{{ asset('upload/admin/post/image/' . $newBook->image) }}"
                                                                                    data-lazyload="{{ asset('upload/admin/post/image/' . $newBook->image) }}"
                                                                                    alt="{{$newBook->name}}"/>
                                                                            </a>
                                                                        </div>
                                                                        <div class="box-info">
                                                                            <h2 class="product-item-name">
                                                                                <a title="Giường ALBANY"
                                                                                   href="/products/giuong-albany"
                                                                                   class="product-item-link">
                                                                                    {{$newBook->name}}
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
									Tác giả: <span class="price">{{$newBook->author}}</span>
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

    <section class="awe-section-8">
        <div class="section_product">
            <div class="container padding-top">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-head-1">
                                    <h2>Sách hay nhất</h2>
                                </div>
                            </div>
                            <div class="col-md-12 e-tabs not-dqtab ajax-tab-5" data-section="ajax-tab-5"
                                 data-view="grid_4">
                                <div class="content margin-content">
                                    <div>

                                        <div class="tab-1 tab-content">

                                            <div class="section-tour-owl3 products products-view-grid owl-carousel"
                                                 data-lg-items='5' data-md-items='5' data-sm-items='3' data-xs-items="2"
                                                 data-xss-items="2" data-margin='10' data-nav="true" data-dot="false">

                                                @foreach($greatBooks as $greatBook)
                                                    <div class="item">

                                                        <div class="ant-product-item">
                                                            <div class="product_row">
                                                                <div class="item">
                                                                    <div class="item-inner">
                                                                        <div class="image-container">


                                                                            <a href="/products/chao-den-oskar"
                                                                               class="product-item-photo">
                                                                                <img
                                                                                    class="product-image-photo img-responsive center-block"
                                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                                                    data-lazyload="{{asset('upload/admin/post/image/' . $greatBook->image)}}"
                                                                                    alt="Chao đèn OSKAR"/>
                                                                            </a>
                                                                        </div>
                                                                        <div class="box-info">
                                                                            <h2 class="product-item-name">
                                                                                <a title="Chao đèn OSKAR"
                                                                                   href="/products/chao-den-oskar"
                                                                                   class="product-item-link">
                                                                                    {{$greatBook->name}}
                                                                                </a>
                                                                            </h2>
                                                                            <div class="product-reviews-summary">
                                                                                <div class="rating-summary">
                                                                                    <div
                                                                                        class="haravan-product-reviews-badge"
                                                                                        data-id="1017908248"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="item-price-1">
                                                                                <div class="price-box price-final_price">


						<span class="special-price">
							<span class="price-container">
								<span class="price-wrapper-1">
									Tác giả: <span class="price">{{$greatBook->author}}</span>
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
                        <a href="/blogs/news" class="news-more" title="Xem thêm">Xem thêm</a>
                    </div>
                    <div class="list-blogs-link">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-news-owl owl-carousel not-dqowl">
                                    @foreach($news as $new)
                                        <div class="item-inner">
                                            <div class="blog-image">
                                                <a href="/blogs/news/245-trieu-cai-tao-giup-can-ho-ha-noi-75-m2-dep-rong-gap-doi">

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
                                                        <a href="/blogs/news/245-trieu-cai-tao-giup-can-ho-ha-noi-75-m2-dep-rong-gap-doi"
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

    <section class="awe-section-10">
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
                        <a href="/blogs/news" class="news-more" title="Xem thêm">Xem thêm</a>
                    </div>
                    <div class="list-blogs-link">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-news-owl owl-carousel not-dqowl">

                                    <div class="item-inner">
                                        <div class="blog-image">
                                            <a href="/blogs/news/245-trieu-cai-tao-giup-can-ho-ha-noi-75-m2-dep-rong-gap-doi">

                                                <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                    data-lazyload="//file.hstatic.net/1000343108/article/scandinavian-apartment-5_grande.jpg"
                                                    alt="245 triệu cải tạo giúp căn hộ Hà Nội 75 m2 đẹp rộng gấp đôi"
                                                    class="img-responsive center-block"/>

                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-content-inner">
                                                <h3 class="blog-title">
                                                    <a href="/blogs/news/245-trieu-cai-tao-giup-can-ho-ha-noi-75-m2-dep-rong-gap-doi"
                                                       title="245 triệu cải tạo giúp căn hộ Hà Nội 75 m2 đẹp rộng gấp đôi">245
                                                        triệu cải tạo giúp căn hộ Hà Nội 75 m2 đẹp rộng gấp đôi</a>
                                                </h3>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="item-inner">
                                        <div class="blog-image">
                                            <a href="/blogs/news/bo-suu-tap-mau-sac-2019-cho-khong-gian-song">

                                                <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                    data-lazyload="//file.hstatic.net/1000343108/article/white-kitchen-color-schemes-hyper-trend-ideas-1_grande.jpg"
                                                    alt="Bộ sưu tập màu sắc 2019 cho không gian sống"
                                                    class="img-responsive center-block"/>

                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-content-inner">
                                                <h3 class="blog-title">
                                                    <a href="/blogs/news/bo-suu-tap-mau-sac-2019-cho-khong-gian-song"
                                                       title="Bộ sưu tập màu sắc 2019 cho không gian sống">Bộ sưu tập
                                                        màu
                                                        sắc 2019 cho không gian sống</a>
                                                </h3>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="item-inner">
                                        <div class="blog-image">
                                            <a href="/blogs/news/gia-chu-thanh-hoa-mua-6-nha-hang-xom-de-lam-noi-o-dep-nhu-resort">

                                                <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                    data-lazyload="//file.hstatic.net/1000343108/article/123069182_grande.jpg"
                                                    alt="Gia chủ Thanh Hóa mua 6 nhà hàng xóm để làm nơi ở đẹp như resort"
                                                    class="img-responsive center-block"/>

                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-content-inner">
                                                <h3 class="blog-title">
                                                    <a href="/blogs/news/gia-chu-thanh-hoa-mua-6-nha-hang-xom-de-lam-noi-o-dep-nhu-resort"
                                                       title="Gia chủ Thanh Hóa mua 6 nhà hàng xóm để làm nơi ở đẹp như resort">Gia
                                                        chủ Thanh Hóa mua 6 nhà hàng xóm để làm nơi ở đẹp như resort</a>
                                                </h3>


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
    </section>
@endsection
