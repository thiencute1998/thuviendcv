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

                        <li><strong itemprop="title">Thông tin</strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container" itemscope="" itemtype="http://schema.org/Blog">
        <div class="row">
            <section class="mn-content col-md-12 list-blog-page">
                <div class="account-create">
                    <div class="fieldset">
                        <h2 class="legend">Thông tin cá nhân</h2>
                        <ul class="form-list">
                            <li class="fields">
                                <div class="row">
                                    <div class="col-md-4">
                                        Tên: <b>{{$account->name}}</b>
                                    </div>
                                    <div class="col-md-4">
                                        Họ: <b>{{$account->surname}}</b>
                                    </div>
                                    <div class="col-md-4">
                                        Địa chỉ email: <b>{{$account->email}}</b>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="fieldset">
                        <h2 class="legend">Dành riêng cho độc giả tại Thư viện </h2>
                        <div class="row">
                            <div class="col-md-4">
                                    Mã độc giả: <b>{{$account->code}}</b>
                            </div>
                            <div class="col-md-4">
                                    Số điện thoại: <b>{{$account->phone}}</b>
                            </div>
                        </div>
                        <!-- CUSTOM IMAGE AT THE RIGHT: <div style="float: right;"><img src="PATH HERE" /></div>-->
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
