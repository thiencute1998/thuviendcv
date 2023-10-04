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

                        <li><strong itemprop="title">Phiếu sách</strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container" itemscope="" itemtype="http://schema.org/Blog">

        <div class="row">
            <section class="mn-content col-md-12 list-blog-page">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box-books thuvien-phieusach-index">
                        <div class="col-main">
                            <div class="phieusach" xmlns="http://www.w3.org/1999/html">
                                <div class="title">
                                    Phiếu Mượn Sách       </div>
                                <div class="list-tacpham">
                                    <table width="100%">
                                        <tbody><tr>
                                            <th width="5%">STT</th>
                                            <th width="10%"> Mã số</th>
                                            <th width="40%"> Tên tác phẩm</th>
                                            <th width="5%"> Tập số</th>
                                            <th width="15%">DDC</th>
                                            <th width="15%">Tác giả</th>
                                            <th width="5%"> Xóa</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>617BC0003807</td>
                                            <td><a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/catalog_product/view/id/3057/"> <b>Communauté et Mission</b></a></td>
                                            <td></td>
                                            <td>
                                                000                   </td>
                                            <td>
                                                DU-M                   </td>
                                            <td><a href="https://thuviendcv.gpbuichu.org/index.php/thuvien/phieusach/remove/id/617BC0003807/"><img src="https://thuviendcv.gpbuichu.org/skin/frontend/rwd/thuvien/images/delete.png"></a> </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div>
                            <div class="borrower">
                                <div class="title">
                                    Thông tin người mượn        </div>
                                <div class="notice">
                                    Để có thể mượn sách tại Thư viện, xin độc giả vui lòng lựa chọn <span style="color:red;">một trong hai cách</span> sau: 			<p style="font-style:italic;font-size:1em; color:red; font-weight:normal;padding: 5px 0;">Quý khách mượn sách tại các thư viện liên kết, xin vui lòng thanh toán số tiền phí vận chuyển với đơn vị vận chuyển.</p>
                                </div>

                                <div class="loggin-to-borrow">
                                    <form action="https://thuviendcv.gpbuichu.org/index.php/thuvien/phieusach/xacnhan/" method="post" id="login-form">
                                        <div class="col2-set">
                                            <div class="col-2 registered-users">
                                                <div class="content">
                                                    <h2 class="phieu-steps"><span>1</span>Viết phiếu</h2>
                                                    <p class="quytrinh-sub"> (Dành cho Quý độc giả hiện diện tại Thư viện)</p>
                                                    <p class="quytrinh-notice">Vui lòng thực hiện theo quy trình sau:</p>
                                                    <div class="quytrinh">
                                                        <p>Nhập đầy đủ những thông tin đã có sẵn trên phiếu mượn sách.</p>
                                                    </div>
                                                    <div class="muiten">
                                                        <img src="https://thuviendcv.gpbuichu.org/skin/frontend/rwd/thuvien/images/arrow.png">
                                                    </div>
                                                    <div class="quytrinh">
                                                        <p>Xác nhận thông tin phiếu bằng việc click vào nút <span>'Xác nhận'</span> phía cuối khung này.</p>
                                                    </div>
                                                    <div class="muiten">
                                                        <img src="https://thuviendcv.gpbuichu.org/skin/frontend/rwd/thuvien/images/arrow.png">
                                                    </div>
                                                    <div class="quytrinh">
                                                        <p>Chuyển phiếu mượn sách tới quầy lưu hành để mượn sách.</p>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="xacnhanmuonsach" value="1">
                                            </div>
                                        </div>
                                        <div class="col-2 registered-users">
                                            <div class="buttons-set">
                                                <button type="submit" class="button" title="Đăng nhập" name="send" id="send1"><span><span>Xác nhận</span></span></button>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            //<![CDATA[
                                            var phieusach = new VarienForm('login-form', true);
                                            //]]>
                                        </script>
                                    </form>
                                </div>

                                <div class="detail-information">
                                    <form action="https://thuviendcv.gpbuichu.org/index.php/thuvien/phieusach/muon/" method="post" id="phieusach-form">
                                        <div class="col2-set">
                                            <div class="col-2">
                                                <div class="content">
                                                    <h2 class="phieu-steps"><span>2</span>Đăng ký mượn</h2>
                                                    <p class="form-alert">Vui lòng nhập đầy đủ các thông tin dưới đây:</p>
                                                    <table class="form-list">
                                                        <tbody><tr>
                                                            <td><label for="email" class="required"><em>*</em>Mã độc giả</label></td>
                                                            <td class="input-box">
                                                                <input type="text" name="madocgia" value="" id="madocgia" class="input-text required-entry validation-failed" title="Mã độc giả(nếu có)">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="email" class="required"><em>*</em>Họ và tên</label></td>
                                                            <td class="input-box">
                                                                <input type="text" name="hoten" value="" id="hoten" class="input-text required-entry validation-failed" title="Họ và tên">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label for="email" class="required"><em>*</em>Email</label></td>
                                                            <td class="input-box">
                                                                <input type="text" name="email" value="" id="email" class="input-text required-entry validate-email validation-failed" title="Địa chỉ email">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="email">Điện thoại</label></td>
                                                            <td class="input-box">
                                                                <input type="text" name="dienthoai" value="" id="dienthoai" class="input-text validation-passed" title="Điện thoại">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="email" class="required"><em>*</em>Địa chỉ<label></label></label></td>
                                                            <td class="input-box">
                                                                <textarea rows="3" name="diachi" value="" id="diachi" class="input-text required-entry validation-failed" title="Địa chỉ"></textarea>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 registered-users">
                                            <div class="buttons-set">
                                                <button type="submit" class="button validation-passed" title="Gửi" name="send2" id="send2"><span><span>Gửi</span></span></button>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            //<![CDATA[
                                            var phieusach = new VarienForm('phieusach-form', true);
                                            //]]>
                                        </script>
                                    </form>
                                </div>
                            </div>

                            <div style="clear: both">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
