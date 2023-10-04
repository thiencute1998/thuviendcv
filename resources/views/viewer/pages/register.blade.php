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

                        <li><strong itemprop="title">Đăng ký</strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container" itemscope="" itemtype="http://schema.org/Blog">
        <div class="row">
            <section class="mn-content col-md-12 list-blog-page">
                <div class="account-create">
                    <div class="page-title">
                        <h1>Tạo tài khoản</h1>
                    </div>
                    <form action="{{route('post-register-user')}}" method="post"
                          id="form-validate">
                        @csrf
                        <input name="form_key" type="hidden" value="a2dg3IuPp7F1yqXT">
                        <div class="fieldset">
{{--                            <input type="hidden" name="success_url" value="">--}}
{{--                            <input type="hidden" name="error_url" value="">--}}
                            <h2 class="legend">Thông tin cá nhân</h2>
                            @if (session('add-success'))
                                <h5 class="action-message mb-2 text-success">{{ session('add-success') }}</h5>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            <ul class="form-list">
                                <li class="fields">
                                    <div class="customer-name">
                                        <div class="field name-firstname">
                                            <label for="firstname" class="required"><em>*</em>Tên</label>
                                            <div class="input-box">
                                                <input type="text" id="firstname" name="name" value="" title="Tên"
                                                       maxlength="255" class="input-text required-entry" required>
                                            </div>
                                        </div>
                                        <div class="field name-lastname">
                                            <label for="lastname" class="required"><em>*</em>Họ</label>
                                            <div class="input-box">
                                                <input type="text" id="lastname" name="surname" value="" title="Họ"
                                                       maxlength="255" class="input-text required-entry">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label for="email_address" class="required"><em>*</em>Địa chỉ email </label>
                                    <div class="input-box">
                                        <input type="text" name="email" id="email_address" value="" title="Địa chỉ email"
                                               class="input-text validate-email required-entry" required>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="fieldset">
                            <h2 class="legend">Thông tin đăng nhập</h2>
                            <ul class="form-list">
                                <li class="fields">
                                    <div class="field">
                                        <label for="password" class="required"><em>*</em>Mật khẩu</label>
                                        <div class="input-box">
                                            <input type="password" name="password" id="password" title="Mật khẩu"
                                                   class="input-text required-entry validate-password" required>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="confirmation" class="required"><em>*</em>Xác nhận lại mật khẩu</label>
                                        <div class="input-box">
                                            <input type="password" name="password_confirmation" title="Xác nhận lại mật khẩu"
                                                   id="confirmation" class="input-text required-entry validate-cpassword" required>
                                        </div>
                                    </div>
                                </li>

{{--                                <li id="captcha-input-box-user_create">--}}
{{--                                    <label for="captcha_user_create" class="required"><em>*</em>Please type the letters--}}
{{--                                        below</label>--}}
{{--                                    <div class="input-box captcha">--}}
{{--                                        <input name="captcha[user_create]" type="text" class="input-text required-entry"--}}
{{--                                               id="captcha_user_create">--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="captcha-image" id="captcha-image-box-user_create">--}}
{{--                                        <img id="captcha-reload" class="captcha-reload"--}}
{{--                                             src="https://thuviendcv.gpbuichu.org/skin/frontend/base/default/images/reload.png"--}}
{{--                                             alt="Reload captcha" onclick="$('user_create').captcha.refresh(this)">--}}
{{--                                        <img id="user_create" class="captcha-img" height="50"--}}
{{--                                             src="https://thuviendcv.gpbuichu.org/media/captcha/base/f6b6b5135bf41fccb4cd3d81d8969683.png">--}}
{{--                                    </div>--}}
{{--                                    <script type="text/javascript">//<![CDATA[--}}
{{--                                        $('user_create').captcha = new Captcha('https://thuviendcv.gpbuichu.org/index.php/captcha/refresh/', 'user_create');--}}
{{--                                        //]]></script>--}}
{{--                                </li>--}}

                            </ul>

                        </div>

                        <div class="fieldset">
                            <h2 class="legend">Dành riêng cho độc giả tại Thư viện </h2>
                            <div style="float: left;">
                                <ul class="form-list">
                                    <li class="fields">
                                        <div class="field">
                                            <div><h4 class="icon-head head-edit-form fieldset-legend"></h4>
                                                <fieldset id="amcustomerattr50" class="amcustomerattr">
                                    <span class="field-row">
                                    <label for="madocgia">Mã độc giả</label><div style="clear: both;"></div>
                                    <input id="madocgia" name="code" value="" class=" input-text"
                                           type="text">
                                    <div style="padding: 4px;"></div></span>
                                                    <span class="field-row">
                                    <label for="sdt">Số điện thoại</label><div style="clear: both;"></div>
                                    <input id="sdt" name="phone" value="" class=" input-text" type="text">
                                    <div style="padding: 4px;"></div></span>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- CUSTOM IMAGE AT THE RIGHT: <div style="float: right;"><img src="PATH HERE" /></div>-->
                            <div style="clear: both;"></div>
                        </div>


                        <div class="buttons-set">
                            <!-- <p class="required"></p>-->
                            <p class="back-link"><a href="https://thuviendcv.gpbuichu.org/index.php/customer/account/login/"
                                                    class="back-link"><small>« </small>Quay lại</a></p>
                            <button type="submit" title="Gửi thông tin" class="button">
                                <span><span>Gửi thông tin</span></span></button>
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </div>
@endsection
