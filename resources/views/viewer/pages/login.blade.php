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
                <div class="main">
                    <div class="col-main">
                        <div class="account-login">
                            <div class="page-title">
                                <h1>Đăng nhập hoặc tạo tài khoản mới</h1>
                            </div>
                            <form action="{{route('post-login-user')}}"
                                  method="post" id="login-form">
                                @csrf
                                <div class="col2-set">
                                    <div class="col-1 registered-users">
                                        <div class="content">
                                            <h2>Độc giả đã có tài khoản</h2>
                                            <p>Nếu bạn đã có tài khoản của độc giả, vui lòng đăng nhập.</p>
                                            @if (session('user-login-fail'))
                                                <div class="alert alert-danger">Sai thông tin tài khoản hoặc mật khẩu</div>
                                            @endif
                                            @if (session('user-not-active'))
                                                <div class="alert alert-danger">Tài khoản chưa được kích hoạt</div>
                                            @endif
                                            @if (session('user-wait-active'))
                                                <div class="alert alert-success">Bạn hãy đợi tài khoản được kích hoạt. Cảm ơn bạn đã đăng ký dịch vụ trên website</div>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $error)
                                                        <div>{{ $error }}</div>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <ul class="form-list">
                                                <li>
                                                    <label for="email" class="required"><em>*</em>Địa chỉ email</label>
                                                    <div class="input-box">
                                                        <input type="text" name="email" value="" id="email"
                                                               class="input-text required-entry validate-email"
                                                               title="Địa chỉ email" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <label for="pass" class="required"><em>*</em>Mật khẩu</label>
                                                    <div class="input-box">
                                                        <input type="password" name="password"
                                                               class="input-text required-entry validate-password" id="pass"
                                                               title="Mật khẩu" required>
                                                    </div>
                                                </li>
                                            </ul>


                                            <p class="required"></p>
                                        </div>
                                    </div>
                                    <div class="col-2 registered-users">
                                        <div class="buttons-set" style="margin-bottom: 20px;">
                                            <a href="{{route('contact')}}"
                                               class="f-left">Bạn bị quên mật khẩu?</a>
                                            <button type="submit" class="button" title="Đăng nhập" name="send" id="send2">
                                                <span><span>Đăng nhập</span></span></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2-set">
                                    <div class="col-1 new-users">
                                        <div class="content">
                                            <h2>Tạo tài khoản</h2>
                                            <p style="display:none;">Với việc tạo tài khoản, bạn có thể đọc trực tiếp các
                                                bản mềm trên website.</p>
                                        </div>
                                        <a href="{{route('get-register-user')}}" type="button" title="Tạo tài khoản" class="btn button" style="width: 168px;">
                                            <span><span>Tạo tài khoản</span></span></a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
