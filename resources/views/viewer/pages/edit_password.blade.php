@extends('viewer.layouts.master')
@section('main-content')
    <style type="text/css">
        .msg-password {
            display: none;
        }
    </style>
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
                    {{--                    <div class="page-title">--}}
                    {{--                        <h1>Tạo tài khoản</h1>--}}
                    {{--                    </div>--}}
                    <form action="{{route('update-password-user')}}" method="post"
                          id="form-update-password">
                        @csrf
                        <div class="fieldset">
                            <div class="alert alert-success msg-password msg-password-success">Thay đổi password thành công</div>
                            <div class="alert alert-danger msg-password msg-password-error"></div>
                            <h2 class="legend">Thay đổi mật khẩu</h2>
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
                                        <label for="password" class="required"><em>*</em>Mật khẩu cũ</label>
                                        <div class="input-box">
                                            <input type="password" name="new_password" id="new_password" title="Mật khẩu"
                                                   class="input-text required-entry validate-password" required>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="confirmation" class="required"><em>*</em>Xác nhận lại mật khẩu</label>
                                        <div class="input-box">
                                            <input type="password" name="password_confirm" title="Xác nhận lại mật khẩu"
                                                   id="confirmation" class="input-text required-entry validate-cpassword" required>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>

                        <div class="buttons-set">
                            <!-- <p class="required"></p>-->
                            {{--                            <p class="back-link"><a href="https://.../account/login/"--}}
                            {{--                                                    class="back-link"><small>« </small>Quay lại</a></p>--}}
                            <button type="submit" title="Gửi thông tin" class="button">
                                <span><span>Cập nhật</span></span></button>
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#form-update-password').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{route('update-password-user')}}',
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function() {
                        $('.msg-password-success').css('display', 'block');
                        $('.msg-password-error').css('display', 'none');
                    },
                    error: function(error) {
                        let errorMessage = "";
                        if (error.status === 422) {
                            if (error.responseJSON.error) {
                                let errors = error.responseJSON.error;
                                for(let key in errors) {
                                    errorMessage = errors[key];
                                }
                            }
                        } else {
                            errorMessage = "Error!!!"
                        }
                        $('.msg-password-success').css('display', 'none');
                        $('.msg-password-error').css('display', 'block');
                        $('.msg-password-error').text(errorMessage);
                    }
                })
            })
        })
    </script>
@endsection
