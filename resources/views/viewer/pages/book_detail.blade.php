@extends('viewer.layouts.master')
@section('meta')
    <title>{{$bookDetail->title ? $bookDetail->title : $config->name}} </title>
    <meta name="keywords" content="{{$bookDetail->keywords ? $bookDetail->keywords : $config->keyword}}"/>
    <meta name="description" content="{{$bookDetail->description ? $bookDetail->description : $config->description}}">
    <meta property="og:title" content="{{$bookDetail->title ? $bookDetail->title : $config->name}}"/>
    <meta property="og:keyword" content="{{$bookDetail->keywords ? $bookDetail->keywords : $config->keyword}}"/>
    <meta property="og:description" content="{{$bookDetail->description ? $bookDetail->description : $config->description}}"/>
    <meta property="og:url" content="{{route('get-cate', ['cate'=> $bookDetail->slug])}}"/>
    <meta property="og:site_name" content="{{$bookDetail->name}}"/>
@endsection
@section('main-content')
    <style type="text/css">
        .show-cookie-message {
            display: none;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <section class="bread-crumb margin-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <li class="home">
                            <a itemprop="url" href="/" title="Trang chủ"><span itemprop="title">Trang chủ</span></a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>

                        <li><strong itemprop="title">{{$bookDetail->category_name}}</strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container" itemscope="" itemtype="http://schema.org/Blog">
        <div class="alert alert-success show-cookie-message"></div>

        <div class="row">
            <section class="products-view products-view-grid">
                <div class="image-main-info">
                    <div class="hatp">
                        <img src="{{asset('upload/admin/post/image/' . $bookDetail->image)}}"
                             width="100%"/>
                    </div>
                    <div class="main-info">
                        <table class="tbl-book-info">
                            <tr>
                                <td class="tentp" colspan="2" data-value="{{$bookDetail->name}}" data-slug="{{$bookDetail->slug}}">{{$bookDetail->name}}</td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td class="reg-content">Nguyên tác:</td>--}}
{{--                                <td>                                                            --}}
{{--                                </td>--}}
{{--                            </tr>--}}
                            <tr>
                                <td class="tentg" data-value="{{$bookDetail->author}}">Tác giả:</td>
                                <td>{{$bookDetail->author}}</td>
                            </tr>
                            <tr>
                                <td class="reg-content">Ký hiệu tác giả:</td>
                                <td>{{$bookDetail->book_authorsymbol}}<br/></td>
                            </tr>
                            <tr class="ddc" data-value="1">
                                <td>DDC:</td>
                                <td class="ddc-name" data-value="{{$bookDetail->category_name}}">{{$bookDetail->category_name}}</td>
                            </tr>
                            <tr class="reg-content">
                                <td>Ngôn ngữ:</td>
                                <td>{{$bookDetail->book_language}}</td>
                            </tr>
                            <tr class="reg-content">
                                <td>Tập - số:</td>
                                <td class="episode" data-value="{{$bookDetail->book_episode}}">{{$bookDetail->book_episode}}</td>
                            </tr>
                            <tr class="reg-content">
                                <td>Số cuốn:</td>
                                <td>{{$bookDetail->book_number}}</td>
                            </tr>
                        </table>
                        <p class="banso-title">Hiện trạng các bản sách</p>
                        <table class="banso">
                            <tr class="reg-content">
                                @foreach($bookDetail->bookVersion as $version)
                                    <td class="each-tppop">
                                        <table>
                                            <tr class="maso">
                                                <td>Mã số:</td>
                                                <td><b>{{$version->book_code}}</b></td>

                                            </tr>
                                            <tr class="reg-content">
                                                <td>Nhà xuất bản:</td>
                                                <td>{{$version->book_publisher}}</td>
                                            </tr>
                                            <tr class="reg-content">
                                                <td>Năm xuất bản:</td>
                                                <td>{{$version->book_yearpublication}}</td>
                                            </tr>
                                            <tr class="reg-content">
                                                <td>Khổ sách:</td>
                                                <td>
                                                    {{$version->book_size}}
                                                </td>
                                            </tr>
                                            <tr class="reg-content">
                                                <td>Số trang:</td>
                                                <td>
                                                    {{$version->book_numberpages}}
                                                </td>
                                            </tr>
                                            <tr class="reg-content">
                                                <td>Kho sách:</td>
                                                <td>{{$version->book_warehouse}}</td>
                                            </tr>
                                            <tr class="reg-content">
                                                <td>Tình trạng:</td>
                                                <td class="tinhtrang ">
                                                    <span
                                                        class="avaiable">{{$version->book_status ? 'Hiện có' : 'Đã hết'}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <button type="submit" value="Mược sách" class="btn-muonsach" data-value="{{$version->book_code}}">
                                                        Mượn sách
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div id="add-to-wishlist"><span id="add-to-wishlist-btn" data-id="{{$bookDetail->id}}">» Thêm vào danh sách tác phẩm yêu thích</span>
                </div>
                <div id="wl-message"></div>
                <div class="mucluc" style="clear: both; margin-top: 20px">
                    <div id="tabs-container">
                        <ul class="tabs-menu">
                            <li class="current"><a href="#tab-1" class="a-muc-luc">Mục lục</a></li>
                        </ul>
                        <div class="tab">
                            <div id="tab-1" class="tab-content-1">
                                {!! $bookDetail->bookcontents !!}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="related-product">
                    <div class="title">
                        <span>Các tác phẩm cùng thể loại</span>
                    </div>
                    <ul class="product-list">
                        @foreach($bookCategories as $bookCate)
                            <li>
                                <div>
                                    <a href="{{route('get-cate', ['cate'=> $bookCate->slug])}}"
                                       class="tacpham-main-img">
                                        <img
                                            src="{{asset('upload/admin/post/image/' . $bookCate->image)}}"
                                            title="{{$bookCate->name}}">
                                    </a>

                                </div>
                                <div class="book-infor">
                                    <div class="prodouct-name">
                                        <a href="{{route('get-cate', ['cate'=> $bookCate->slug])}}"
                                           title="{{$bookCate->name}}">
                                            {{$bookCate->name}}</a>
                                    </div>
                                    <div> Tác giả: <a
                                            href="#"><span
                                                class="tacgia">  {{$bookCate->author}} </span></a></div>
                                </div>
                            </li>
                        @endforeach


                    </ul>
                </div>

            </section>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            // Tang view count book
            plusCountViewBook();


            const cookieName = 'muonsach';
            function setCookie(name, value)
            {
                let expires;
                let date = new Date();
                date.setTime(date.getTime() + (10000*1000));
                expires = "; expires=" + date.toUTCString();
                document.cookie = name + "=" + value + expires + "; path=/";
            };

            function getCookie(cname) {
                let name = cname + "=";
                let ca = document.cookie.split(';');
                for(let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            $('.btn-muonsach').on('click', function() {
                let data = getCookie(cookieName);
                let muonsach = Object.assign([], data ? JSON.parse(data) : []);
                let code = $(this).data('value');
                let checkCode = muonsach.some(value=> {
                    return value.code == code;
                })

                $('.show-cookie-message').css('display', 'block');
                if (checkCode) {
                    $('.show-cookie-message').text("Đã tồn tại tác phẩm trong phiếu sách của bạn.")
                } else {
                    let obj = {
                        code: code,
                        name: $('.tentp').data('value'),
                        slug: $('.tentp').data('slug'),
                        author: $('.tentg').data('value'),
                        episode: $('.episode').data('value'),
                        ddc:  $('.ddc-name').data('value')
                    }
                    muonsach.push(obj)
                    setCookie(cookieName, JSON.stringify(muonsach));
                    $('.show-cookie-message').text("Bạn đã thêm tác phẩm vào phiếu sách thành công.")
                }
            })

            // them vao sach yeu thich
            $('#add-to-wishlist-btn').on('click', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('add-book-favorite')}}",
                    type: 'POST',
                    data: {book_id: $(this).data('id')},
                    success: function(data) {
                        alert("Thêm vào sách yêu thích của bạn thành công!")
                    },
                    error: function(error) {
                        alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để thêm sách vào danh mục sách yêu thích của bạn!")
                    }
                })
            });

            function plusCountViewBook() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Tang view book
                $.ajax({
                    url: "{{route('plus-count-book')}}",
                    type: 'POST',
                    data: {book_id: $('#add-to-wishlist-btn').data('id')},
                    success: function(data) {
                    },
                    error: function(error) {
                    }
                })
            }
        });
    </script>
@endsection
