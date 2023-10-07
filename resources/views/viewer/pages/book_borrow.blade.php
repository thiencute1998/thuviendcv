@extends('viewer.layouts.master')
@section('main-content')
    <style type="text/css">
        .show-cookie-message {
            display: none;
        }
        .borrow-msg-error {
            display: none;
        }
        .borrow-msg-success {
            display: none;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                            <div class="alert alert-success show-cookie-message"></div>
                            <div class="phieusach" xmlns="http://www.w3.org/1999/html">
                                <div class="title">
                                    Phiếu Mượn Sách       </div>
                                <div class="list-tacpham">
                                    <table width="100%">
                                        <tbody>
                                        <tr class="th-muon-sach">
                                            <th width="5%">STT</th>
                                            <th width="10%"> Mã số</th>
                                            <th width="40%"> Tên tác phẩm</th>
                                            <th width="10%"> Tập số</th>
                                            <th width="15%">DDC</th>
                                            <th width="15%">Tác giả</th>
                                            <th width="5%"> Xóa</th>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <td>1</td>--}}
{{--                                            <td>617BC0003807</td>--}}
{{--                                            <td><a href="https://.../thuvien/catalog_product/view/id/3057/"> <b>Communauté et Mission</b></a></td>--}}
{{--                                            <td></td>--}}
{{--                                            <td>--}}
{{--                                                000                   </td>--}}
{{--                                            <td>--}}
{{--                                                DU-M                   </td>--}}
{{--                                            <td><a href="https://.../thuvien/phieusach/remove/id/617BC0003807/"><img src="https://thuviendcv.gpbuichu.org/skin/frontend/rwd/thuvien/images/delete.png"></a> </td>--}}
{{--                                        </tr>--}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="borrower">
                                <div class="title">
                                    Thông tin người mượn        </div>
                                <div class="notice">
                                    Để có thể mượn sách tại Thư viện, xin độc giả vui lòng lựa chọn <span style="color:red;">một trong hai cách</span> sau: 			<p style="font-style:italic;font-size:1em; color:red; font-weight:normal;padding: 5px 0;">Quý khách mượn sách tại các thư viện liên kết, xin vui lòng thanh toán số tiền phí vận chuyển với đơn vị vận chuyển.</p>
                                </div>

                                <div class="loggin-to-borrow">
                                    <form action="https://.../thuvien/phieusach/xacnhan/" method="post" id="login-form">
                                        <div class="col2-set1">
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
                                    </form>
                                </div>

                                <div class="detail-information">
                                    <form action="https://.../thuvien/phieusach/muon/" method="post" id="phieusach-form">
                                        <div class="col2-set">
                                            <div class="col-2">
                                                <div class="content">
                                                    <div class="alert alert-danger borrow-msg-error">
                                                    </div>
                                                    <div class="alert alert-success borrow-msg-success">
                                                    </div>
                                                    <h2 class="phieu-steps"><span>2</span>Đăng ký mượn</h2>
                                                    <p class="form-alert">Vui lòng nhập đầy đủ các thông tin dưới đây:</p>
                                                    <table class="form-list">
                                                        <tbody><tr>
                                                            <td><label for="email" class="required"><em>*</em>Mã độc giả</label></td>
                                                            <td class="input-box">
                                                                <input type="text" name="madocgia" value="{{$reader ? $reader->code : ""}}" id="madocgia"
                                                                       class="input-text required-entry validation-failed"
                                                                       title="Mã độc giả(nếu có)" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="email" class="required"><em>*</em>Họ và tên</label></td>
                                                            <td class="input-box">
                                                                <input type="text" name="hoten" value="{{$reader ? ($reader->surname . ' ' . $reader->name): ""}}" id="hoten"
                                                                       class="input-text required-entry validation-failed" title="Họ và tên" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label for="email" class="required"><em>*</em>Email</label></td>
                                                            <td class="input-box">
                                                                <input type="text" name="email" value="{{$reader ? $reader->email : ""}}" id="user_email"
                                                                       class="input-text required-entry validate-email validation-failed"
                                                                       title="Địa chỉ email" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="email">Điện thoại</label></td>
                                                            <td class="input-box">
                                                                <input type="text" name="dienthoai" value="{{$reader ? $reader->phone : ""}}" id="dienthoai"
                                                                       class="input-text validation-passed" title="Điện thoại">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="email" class="required"><em>*</em>Địa chỉ<label></label></label></td>
                                                            <td class="input-box">
                                                                <textarea rows="3" name="diachi" value="" id="diachi"
                                                                          class="input-text required-entry validation-failed" title="Địa chỉ"></textarea>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 registered-users">
                                            <div class="buttons-set">
                                                <button type="button" class="button validation-passed btn-send-book" title="Gửi" name="send2" id="send2"><span><span>Gửi</span></span></button>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            //<![CDATA[
                                            //var phieusach = new VarienForm('phieusach-form', true);
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
            const cookieName = 'muonsach';
            function setCookie(name, value)
            {
                let expires;
                let date = new Date();
                date.setTime(date.getTime() + (1000*1000));
                expires = "; expires=" + date.toUTCString();
                document.cookie = name + "=" + value + expires + "; path=/";
            };

            function getCookie(cname) {
                let name = cname + "=";
                let ca = document.cookie.split(';');
                for(let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            let data = getCookie(cookieName);
            let muonsach = Object.assign([], data ? JSON.parse(data) : []);
            let html = "";
            muonsach.forEach((value, key)=> {
                let routeName = "{{route('get-cate', ':cate')}}";
                routeName = routeName.replace(':cate', value.slug);
                html += '<tr class="tr-muon-sach">' +
                '<td>' + Number(key + 1) + '</td>' +
                '<td>' + value.code + '</td>' +
                '<td><a href="' + routeName + '"> <b>' + value.name + '</b></a></td>' +
                '<td> </td>' +
                '<td> </td>' +
                '<td>' + value.author + '</td>' +
                '<td><span style="cursor: pointer">' +
                    '<img data-code="' + value.code +'" class="remove-muon-sach" src="https://thuviendcv.gpbuichu.org/skin/frontend/rwd/thuvien/images/delete.png"></span> </td>' +
                '</tr>'
            })
            $('.th-muon-sach').after(html);


            $(document).on('click', '.remove-muon-sach', function() {
                let code = $(this).data('code');
                $(this).closest('tr').remove();
                $('.show-cookie-message').css('display', 'block');
                $('.show-cookie-message').text("Tác phẩm có mã số " + code + " đã được xóa thành công.")
                muonsach = muonsach.filter(value=> {
                    return value.code != code;
                });
                setCookie(cookieName, JSON.stringify(muonsach));
            })

            $('.btn-send-book').click(function() {
                let messageError = "";
                $('.borrow-msg-error').css("display", "none");
                $('.borrow-msg-error').text();
                let userBorrow = {
                    user_code: $('#madocgia').val(),
                    user_name: $('#hoten').val(),
                    user_email: $('#user_email').val(),
                    user_phone: $('#dienthoai').val(),
                    user_address: $('#diachi').val(),
                }
                if (muonsach.length == 0) {
                    messageError = "Chưa có sách trong phiếu";

                } else if (!userBorrow.user_code) {
                    messageError = "Mã độc giả không được để trống";
                } else if (!userBorrow.user_email) {
                    messageError = "Email không được để trống";
                }

                if (messageError) {
                    $('.borrow-msg-error').text(messageError);
                    $('.borrow-msg-error').css("display", "block");
                    return ;
                }

                let data = {
                    user_borrow: userBorrow,
                    book_borrow: muonsach
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('post-book-borrow')}}",
                    type: 'POST',
                    data: data,
                    beforeSend: function() {
                    },
                    success: function(data) {
                        resetMuonSach();
                        $('.borrow-msg-success').text("Mượn sách thành công");
                        $('.borrow-msg-success').css("display", "block");
                    },
                    error: function(error) {
                        $('.borrow-msg-error').text(error.responseJSON.errors.msg[0]);
                        $('.borrow-msg-error').css("display", "block");
                    }
                })
            });

            function resetMuonSach() {
                $('#madocgia').val("");
                $('#hoten').val("");
                $('#user_email').val("");
                $('#dienthoai').val("");
                $('#diachi').val("");

                $('.tr-muon-sach').remove();
                document.cookie = cookieName +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';

            }
        });
    </script>
@endsection
