<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>THƯ VIỆN NHÀ ỨNG SINH THÁNH PHÊRÔ NGUYỄN VĂN TỰ </title>
    <!-- ================= Page description ================== -->

    <meta name="description" content="">

    <!-- ================= Meta ================== -->
    <meta name="keywords" content=", "/>
    <link rel="canonical" href="https://thuvienabc.com/"/>
    <meta name='revisit-after' content='1 days'/>
    <meta name="robots" content="noodp,index,follow"/>
    <!-- ================= Favicon ================== -->

    <link rel="icon" href="//theme.hstatic.net/1000343108/1000435493/14/favicon.png?v=230" type="image/x-icon"/>

    <meta property="og:type" content="website">
    <meta property="og:title" content="THƯ VIỆN NHÀ ỨNG SINH THÁNH PHÊRÔ NGUYỄN VĂN TỰ">
    <meta property="og:image" content="http://theme.hstatic.net/1000343108/1000435493/14/logo.png?v=230">
    <meta property="og:image:secure_url" content="https://theme.hstatic.net/1000343108/1000435493/14/logo.png?v=230">

    <meta property="og:description" content="">
    <meta property="og:url" content="https://thuvienabc.com/">
    <meta property="og:site_name" content="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/viewer/style/style.css') }}">
    <link href="{{ asset('assets/viewer/style/plugin.css?v=230') }}" rel='stylesheet' type='text/css' media='all'/>
    <link href="{{ asset('assets/viewer/style/base.css?v=230') }}" rel='stylesheet' type='text/css' media='all'/>
    <link href="{{ asset('assets/viewer/style/ant-furniture.css?v=230') }}" rel='stylesheet' type='text/css'
          media='all'/>
    <script src="{{ asset('assets/viewer/js/jquery-2.2.3.min.js?v=230') }}" type='text/javascript'></script>
    <link href="{{ asset('assets/viewer/style/main.css') }}" rel='stylesheet' type='text/css' media='all'/>
</head>
<body>

<!-- Header here -->
@include('viewer.layouts.header')

<h1 class="hidden"> - </h1>

@yield('main-content')

<!-- Footer here -->
@include('viewer.layouts.footer')

<script src="{{ asset('assets/viewer/js/bootstrap-notify.js?v=230') }}" type='text/javascript'></script>
<script defer src='https://stats.hstatic.net/beacon.min.js' hrv-beacon-t='1000343108'></script>
<style>.grecaptcha-badge {
        visibility: hidden;
    }</style>
<script src="{{ asset('assets/viewer/js/owl.carousel.min.js?v=230') }}" type='text/javascript'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js'
        type='text/javascript'></script>
<script>$.validate({});</script>
<script src="{{ asset('assets/viewer/js/appear.js?v=230') }}" type='text/javascript'></script>
<script src="{{ asset('assets/viewer/js/main.js?v=230') }}" type='text/javascript'></script>

<div class="backdrop__body-backdrop___1rvky"></div>
<div class="mobile-main-menu">
    <div class="drawer-header">
        <a href="account/login">
            <div class="drawer-header--auth">
                <div class="_object">
                    <img src="//theme.hstatic.net/1000343108/1000435493/14/user.svg?v=230" alt=""/>
                </div>

                <div class="_body">
                    ĐĂNG NHẬP
                    <br>
                    Nhận nhiều thông tin hơn
                </div>

            </div>
        </a>
    </div>
    <ul class="ul-first-menu">
        @if($userLogin)
            <li><a href="{{route('edit-password-user')}}"><i class="fa fa-key" aria-hidden="true"></i> Đổi mật khẩu</a></li>
            <li><a href="{{route('get-logout-user')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
        @else
        <li><a href="{{route('get-login-user')}}"><i class="ion ion-ios-log-in"></i> Đăng nhập</a></li>
        <li><a href="{{route('get-register-user')}}"><i class="ion ion-ios-person-add"></i> Đăng ký</a></li>
        @endif
        <li><a href="{{route('get-account-info')}}"><i class="fa fa-user-secret" aria-hidden="true"></i> Thông tin tài khoản</a></li>
        <li><a href="{{route('get-book-borrow')}}"><i class="fa fa-address-card-o" aria-hidden="true"></i> Phiếu khách</a></li>
        <li><a href="{{route('get-book-favorite')}}"><i class="fa fa-id-badge" aria-hidden="true"></i> Sách yêu thích</a></li>

    </ul>
    <div class="la-scroll-fix-infor-user">
        <!--CATEGORY-->
        <div class="la-nav-menu-items">
            <div class="la-title-nav-items"><strong>Danh mục</strong></div>

            <ul class="la-nav-list-items">

                <li class="ng-scope">
                    <a href="{{route('index')}}">Trang chủ</a>
                </li>
                <li class="ng-scope sub-menu">
                    <a href="javascrip:void();">Danh mục sách <i class="fa fa-chevron-down" aria-hidden="true"></i></a>

                    <ul id="menu" class="mb-danhmucsach">
                        @foreach($categoriemn as $category)
                            <li>
                                <a href="{{route('get-cate', ['cate'=> $category->slug])}}">{{$category->name}}</a>
                            </li>
                        @endforeach

                    </ul>

                </li>
                <li class="ng-scope">
                    <a href="{{route('introduce')}}">Giới thiệu</a>
                </li>
                <li class="ng-scope">
                    <a href="{{route('rule')}}">Nội quy</a>
                </li>
                <li class="ng-scope">
                    <a href="{{route('instruct')}}">Hướng dẫn</a>
                </li>

                <li class="ng-scope">
                    <a href="{{route('contact')}}">Liên hệ</a>
                </li>

                <li class="ng-scope">
                    <a href="/pages/lien-he">Liên kết</a>
                    <ul>
                        @foreach($linkmn as $link)
                            <li class="level1 item">
                                <a href="{{$link->link}}"><span>{{$link->name}}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            </ul>

        </div>
    </div>
    <ul class="mobile-support">
        <li>
            <div class="drawer-text-support">HỖ TRỢ</div>
        </li>

        <li><i class="fa fa-phone" aria-hidden="true"></i> HOTLINE: <a href="tel:"></a></li>
        <li><i class="fa fa-envelope" aria-hidden="true"></i> EMAIL: <a href="mailto:"></a></li>

    </ul>
</div>
</body>
</html>
