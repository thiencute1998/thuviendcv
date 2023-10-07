<footer class="footer-container">
    <div class="footer-top">
        <div class="container">
            <div class="footer-static bg-bt1">
                <div class="row">
                    <div class="f-col f-col1 col-md-3 col-sm-12 col-xs-12">
                        <div class="footer-1">
                            <div class="footer-title">
                                <h3>Giáo phận bắc ninh</h3>
                            </div>
                            <div class="logo-footer">
                                <a href="{{route('index')}}">
                                    <img src="{{$logoWebsite ? asset("upload/admin/banner/image/" . $logoWebsite->image) : "assets/viewer/style/images/logo.png"}}" alt="" class="img-responsive"/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="f-col f-col2 col-md-4 col-sm-12 col-xs-12">
                        <div class="footer-2">
                            <div class="footer-title">
                                <h3>Thông tin liên hệ</h3>
                            </div>
                            <div class="footer-content">
                                <ul class="menu">

                                    <li><i class="fa fa-users" aria-hidden="true"></i> Thư viện Nhà ứng sinh thánh Phêrô
                                        Nguyễn Văn Tự
                                    </li>

                                    <li><i class="fa fa-home" aria-hidden="true"></i> Nhà Ứng Sinh thánh Phêrô Nguyễn
                                        Văn Tự. Thôn Xuân Hoà, xã Đại Xuân, huyện Quế Võ, tỉnh Bắc Ninh.
                                    </li>

                                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> Email:
                                        nhathanhthu123@gmail.com
                                    </li>

                                    <li><i class="fa fa-phone" aria-hidden="true"></i> Phone: 0977809899</li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="f-col f-col4 col-md-5 col-sm-12 col-xs-12">
                        <div class="footer-3">
                            <div class="footer-title">
                                <h3>Đăng ký nhận tin</h3>
                            </div>
                            <div class="footer-content">Chúng tôi sẽ gửi bài viết mới và lời của Chúa qua email của bạn
                                <div class="block newsletter">
                                    <div class="content">
                                        <form class="form subscribe" action="" method="post"
                                              id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                              target="_blank">
                                            <div class="field newsletter">
                                                <div class="control">
                                                    <input name="email" type="email" id="newsletter" value=""
                                                           placeholder="Nhập địa chỉ Email của bạn" required>
                                                    <div class="regdit-mail">
                                                        <button class="action subscribe primary" name="subscribe"
                                                                title="Đăng ký" type="submit"><i
                                                                class="fa fa-paper-plane" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                    <!--<div class="actions">
                                                        <button class="action subscribe primary" name="subscribe" title="Đăng ký" type="submit">
                                                            <span>Đăng ký</span>
                                                        </button>
                                                    </div>-->
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-copyright bg-bt2">
                        <small class="copyright">
                            <strong style="text-transform:uppercase; font-size:16px; text-align:center; color:#FFF">Thư
                                viện nhà ứng sinh thánh phêrô nguyễn văn tự</strong>

                        </small>
                    </div>
                </div>

            </div>
        </div>

        <div class="back-to-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></div>

    </div>
</footer>
