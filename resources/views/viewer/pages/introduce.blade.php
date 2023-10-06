@extends('viewer.layouts.master')
@section('main-content')
    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        <div class="row">
            <section class="mn-content col-md-12 list-blog-page">

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3  hidden-sm hidden-xs">
                        <div class="mainmenu">
                            <div class="danhmucsach">
                                <ul id="menu">
                                    @foreach($categories as $cate)
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>
                                            <a href="{{route('get-cate', ['cate'=> $cate->slug])}}">{{$cate->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9">
                        <div class="page-title category-title">
                            <h1 class="title-head"><a href="#">Giới thiệu</a></h1>
                        </div>
                        <div class="content-page rte">
                            {!! $config ? $config->gioithieu : "" !!}
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endsection
