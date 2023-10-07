@extends('viewer.layouts.master')
@section('main-content')
    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        <div class="row">
            <section class="mn-content col-md-12 list-blog-page">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="page-title category-title">
                            <h1 class="title-head"><a href="#">Video</a></h1>
                        </div>
                        <div>
                            {{$video->name}}
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
