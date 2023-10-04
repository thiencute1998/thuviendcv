@extends('viewer.layouts.master')
@section('main-content')
    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        <div class="row">
            <section class="mn-content col-md-12 list-blog-page">
                <div class="category-list">
                    <div class="title">
                        000 - {{$parentCate ? $parentCate->name : ""}}
                    </div>

                    <div class="ddc-list-10">
                        @foreach($categories as $category)
                            <div class="ddc-list-item">
                                <a href="{{route('get-cate', ['cate'=> $category->slug])}}">
                                    <p>000 - {{$category->name}} <span class="count-tp-list">({{$category->posts_count}})</span> </p>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
