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

                        <li><strong itemprop="title">Sách văn học</strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        <div class="row">
            <section class="products-view products-view-grid">
                <div class="image-main-info">
                    <div class="hatp">
                        <img src="https://thuviendcv.gpbuichu.org/media/tacpham/hinhanh/1679889391_15151bc.jpg"
                             width="100%"/>
                    </div>
                    <div class="main-info">
                        <table class="tbl-book-info">
                            <tr>
                                <td class="tentp" colspan="2">{{$bookDetail->name}}</td>
                            </tr>
                            <tr>
                                <td class="reg-content">Nguyên tác:</td>
                                <td>Bản tin hiệp thông của Hội Đồng Giám Mục Việt Nam Số 134 (tháng 3 và 4 năm 2023)
                                </td>
                            </tr>
                            <tr>
                                <td class="reg-content">Tác giả:</td>
                                <td>{{$bookDetail->author}}</td>
                            </tr>
                            <tr>
                                <td class="reg-content">Ký hiệu tác giả:</td>
                                <td>
                                    NHI<br/></td>
                            </tr>
                            <tr class="reg-content">
                                <td>DDC:</td>
                                <td>253.05 - Ấn phẩm định kỳ về mục vụ Kitô giáo</td>
                            </tr>
                            <tr class="reg-content">
                                <td>Ngôn ngữ:</td>
                                <td>Việt</td>
                            </tr>
                            <tr class="reg-content">
                                <td>Tập - số:</td>
                                <td>S134</td>
                            </tr>
                            <tr class="reg-content">
                                <td>Số cuốn:</td>
                                <td>3</td>
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
                                                    <form
                                                        action="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/muonsach/id/617BC0015151/">
                                                        <button type="submit" value="Mược sách" class="btn-muonsach">
                                                            Mượn sách
                                                        </button>
                                                    </form>
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
                <div id="add-to-wishlist"><span id="add-to-wishlist-btn">» Thêm vào danh sách tác phẩm yêu thích</span>
                </div>
                <div id="wl-message"></div>
                <div class="mucluc" style="clear: both; margin-top: 20px">
                    <div id="tabs-container">
                        <ul class="tabs-menu">
                            <li class="current"><a href="#tab-1" class="a-muc-luc">Mục lục</a></li>
                        </ul>
                        <div class="tab">
                            <div id="tab-1" class="tab-content-1">

                                Nội dung mục lục
                            </div>

                        </div>
                    </div>
                </div>
                <div class="related-product">
                    <div class="title">
                        <span>Các tác phẩm cùng thể loại</span>
                    </div>
                    <ul class="product-list">

                        <li>
                            <div>
                                <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/1709/"
                                   class="tacpham-main-img">
                                    <img
                                        src="https://thuviendcv.gpbuichu.org/media/tacpham/hinhanh/1683278853_15338bc.jpg"
                                        title="Bản tin hiệp thông: Bốn trăm năm dòng Tên tại Việt Nam">
                                </a>

                            </div>
                            <div class="book-infor">
                                <div class="prodouct-name">
                                    <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/1709/"
                                       title="Bản tin hiệp thông: Bốn trăm năm dòng Tên tại Việt Nam">
                                        Bản tin hiệp thông: Bốn trăm năm dòng Tên tại Việt Nam </a>
                                </div>
                                <div> Tác giả: <a
                                        href="https://thuviendcv.gpbuichu.org/index.php/thuvien/tacgia/listp/id/162/"><span
                                            class="tacgia">  Nhiều tác giả </span></a></div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/2837/"
                                   class="tacpham-main-img">
                                    <img src="https://thuviendcv.gpbuichu.org/media/tacpham/hinhanh/3586.jpg"
                                         title="Bản tin hiệp thông">
                                </a>

                            </div>
                            <div class="book-infor">
                                <div class="prodouct-name">
                                    <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/2837/"
                                       title="Bản tin hiệp thông">
                                        Bản tin hiệp thông </a>
                                </div>


                                <div> Tác giả: <a
                                        href="https://thuviendcv.gpbuichu.org/index.php/thuvien/tacgia/listp/id/162/"><span
                                            class="tacgia">  Nhiều tác giả, Rev. G.A. Elrington </span></a></div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/2839/"
                                   class="tacpham-main-img">
                                    <img src="https://thuviendcv.gpbuichu.org/media/tacpham/hinhanh/3588.jpg"
                                         title="Bản tin hiệp thông: Sứ mạng và lịch sử truyền giáo">
                                </a>

                            </div>
                            <div class="book-infor">
                                <div class="prodouct-name">
                                    <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/2839/"
                                       title="Bản tin hiệp thông: Sứ mạng và lịch sử truyền giáo">
                                        Bản tin hiệp thông: Sứ mạng và lịch sử truyền giáo </a>
                                </div>


                                <div> Tác giả: <a
                                        href="https://thuviendcv.gpbuichu.org/index.php/thuvien/tacgia/listp/id/162/"><span
                                            class="tacgia">  Nhiều tác giả </span></a></div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/2842/"
                                   class="tacpham-main-img">
                                    <img src="https://thuviendcv.gpbuichu.org/media/tacpham/hinhanh/3591.jpg"
                                         title="Bản tin hiệp thông: Hội nghị thường niên của Hồi đồng Giám mục Việt Nam lần thứ XXVI">
                                </a>

                            </div>
                            <div class="book-infor">
                                <div class="prodouct-name">
                                    <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/2842/"
                                       title="Bản tin hiệp thông: Hội nghị thường niên của Hồi đồng Giám mục Việt Nam lần thứ XXVI">
                                        Bản tin hiệp thông: Hội nghị thường niên của Hồi đồng Giám mục Việt Nam lần thứ
                                        XXVI </a>
                                </div>


                                <div> Tác giả: <a
                                        href="https://thuviendcv.gpbuichu.org/index.php/thuvien/tacgia/listp/id/162/"><span
                                            class="tacgia">  Nhiều tác giả </span></a></div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/2854/"
                                   class="tacpham-main-img">
                                    <img src="https://thuviendcv.gpbuichu.org/media/tacpham/hinhanh/3602.jpg"
                                         title="Bản tin hiệp thông: Phương pháp truyền giáo">
                                </a>

                            </div>
                            <div class="book-infor">
                                <div class="prodouct-name">
                                    <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/2854/"
                                       title="Bản tin hiệp thông: Phương pháp truyền giáo">
                                        Bản tin hiệp thông: Phương pháp truyền giáo </a>
                                </div>


                                <div> Tác giả: <a
                                        href="https://thuviendcv.gpbuichu.org/index.php/thuvien/tacgia/listp/id/162/"><span
                                            class="tacgia">  Nhiều tác giả </span></a></div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/2854/"
                                   class="tacpham-main-img">
                                    <img src="https://thuviendcv.gpbuichu.org/media/tacpham/hinhanh/3602.jpg"
                                         title="Bản tin hiệp thông: Phương pháp truyền giáo">
                                </a>

                            </div>
                            <div class="book-infor">
                                <div class="prodouct-name">
                                    <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/2854/"
                                       title="Bản tin hiệp thông: Phương pháp truyền giáo">
                                        Bản tin hiệp thông: Phương pháp truyền giáo </a>
                                </div>


                                <div> Tác giả: <a
                                        href="https://thuviendcv.gpbuichu.org/index.php/thuvien/tacgia/listp/id/162/"><span
                                            class="tacgia">  Nhiều tác giả </span></a></div>
                            </div>
                        </li>

                    </ul>
                </div>

            </section>
        </div>
    </div>
@endsection
