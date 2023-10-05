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

                        <li><strong itemprop="title">Sách yêu thích</strong></li>

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
                            <span>Tổng quát</span>
                        </div>
                        <ul class="product-list">
                            @foreach($bookFavorites as $book)
                                <li>
                                    <div>
                                        <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/3057/" class="tacpham-main-img"><img src="https://thuviendcv.gpbuichu.org/skin//frontend/rwd/thuvien/images/demobooks/biamau.png" title="Communauté et Mission">
                                        </a>

                                    </div>
                                    <div class="book-infor">
                                        <div class="prodouct-name">
                                            <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/3057/" title="Communauté et Mission">
                                                Communauté et Mission                                </a>
                                        </div>

                                        <div> Tác giả: <a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/tacgia/listp/id/1969/"><span class="tacgia">  Marcel Dumais </span></a></div>
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
                        <ul class="pagination clearfix">

                            <li class="page-item disabled"><a class="page-link" href="#">«</a></li>





                            <li class="active page-item disabled"><a class="page-link" href="javascript:;">1</a></li>




                            <li class="page-item"><a class="page-link" onclick="doSearch(2)" href="javascript:;">2</a></li>




                            <li class="page-item"><a class="page-link" onclick="doSearch(2)" href="javascript:;">»</a></li>

                        </ul>
                    </nav>

                </div>

            </section>
        </div>
    </div>
@endsection
