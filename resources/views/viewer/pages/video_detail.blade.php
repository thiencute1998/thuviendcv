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

                        <li><strong itemprop="title">Video</strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        <div class="row">
            <section class="mn-content col-md-12 list-blog-page">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
{{--                        <div class="page-title category-title">--}}
{{--                            <h1 class="title-head"><a href="#">Video</a></h1>--}}
{{--                        </div>--}}
                        <div>
                            <h1 class="title-head" style="font-weight: bold">{{$video->name}}</h1>
                        </div>
                        <div class="content-page rte">
                            {!! $video ? $video->content : "" !!}
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endsection
