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

                        <li><strong itemprop="title">Liên hệ</strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        <div class="row">
            <section class="mn-content col-md-12 list-blog-page">
                <div class="main">
                    <div class="col-main">
                        <div class="std">
                            <div class="frm-lienhe">
                                @if (session('contact-success'))
                                    <div class="alert alert-success">
                                        <p>Thông tin liên hệ đã được gửi thành công.</p>
                                        <p>Chúng tôi sẽ liên hệ cho bạn trong thời gian sớm nhất.</p>
                                        <p>Xin chân thành cảm ơn!</p>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                @endif
{{--                                <div class="page-title">--}}
{{--                                    <h1>Liên hệ với chúng tôi</h1>--}}
{{--                                </div>--}}
                                <form action="{{route('post-contact')}}" method="POST" class="scaffold-form">
                                    @csrf
                                    <div class="fieldset">
                                        <h2 class="legend">Thông tin liên hệ</h2>
                                        <ul class="form-list">
                                            <li class="fields">
                                                <div class="field">
                                                    <label for="hoten" class="required">Họ và tên</label>
                                                    <div class="input-box">
                                                        <input name="name" id="hoten" title="Họ và tên" value=""
                                                               class="input-text required-entry" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="field">
                                                    <label for="email" class="required">Email</label>
                                                    <div class="input-box">
                                                        <input name="email" id="email" title="Email"
                                                               value="" class="input-text required-entry validate-email"
                                                               type="email" autocapitalize="off" autocorrect="off" spellcheck="false" required>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <label for="dienthoai">Điện thoại</label>
                                                <div class="input-box">
                                                    <input name="phone" id="telephone" title="Điện thoại"
                                                           value="" class="input-text required-entry" type="tel" required>
                                                </div>
                                            </li>
                                            <li class="wide">
                                                <label for="noidung" class="required">Nội dung</label>
                                                <div class="input-box">
                                                    <textarea name="content" id="comment" maxlength="500"
                                                              title="Nội dung cần liên hệ" class="required-entry input-text" cols="40" rows="10"
                                                              required
                                                    ></textarea>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="buttons-set">
                                        <button type="submit" title="Gửi đi" class="button"><span><span>Gửi đi</span></span></button>
                                    </div>
                                </form>
                                <script type="text/javascript">
                                    //<![CDATA[
                                    //]]>
                                </script>
                            </div>
                            <div class="map-lienhe">
                                @if($contactWebsite)
                                    {!! $contactWebsite->bando !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
