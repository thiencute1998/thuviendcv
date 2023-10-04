<header class="header">
    <div class="header-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-100-h">
                    <button type="button" class="navbar-toggle collapsed visible-sm visible-xs" id="trigger-mobile">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="{{ asset('upload/admin/banner/image/' . (isset($bannerApp->image) ? $bannerApp->image : "")) }}" height="349" title="Banner" alt="Banner">
                </div>

            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="menu-bt">
                    <div class="col-md-3 padding-b hidden-sm hidden-xs">
                        <div class="css-home"><a href="{{route('index')}}"><i class="fa fa-home" aria-hidden="true"></i></a> Danh mục sách</div>
                    </div>
                    <div class="col-md-6 padding-b">
                        <form class="input-group search-bar search_form" action="/search" method="get" role="search" id="voice-search">
                            <div class="input-box">
                                <div class="block-search-1">
                                    <select name="typesearch">
                                        <option value="">Tiêu chí tìm kiếm</option>
                                        <option value="tacpham">Tên tác phẩm</option>
                                        <option value="matacpham">Mã tác phẩm</option>
                                        <option value="tacgia">Tác giả</option>
                                        <option value="dichgia">Dịch giả</option>
                                        <option value="ddc">Số phân loại DDC</option>
                                        <option value="nguyentac">Nguyên tác</option>
                                        <option value="nhaxb">Nhà xuất bản</option>
                                        <option value="mucluc">Mục lục</option>
                                        <option value="sachbo">Sách bộ</option>
                                        <option value="namxb">Năm xuất bản</option>
                                        <option value="ngonngu">Ngôn ngữ</option>
                                    </select>
                                </div>
                                <div class="block block-search">
                                    <input id="search" type="search" name="q" value="" class="input-text required-entry" maxlength="128" placeholder="Từ khóa cần tìm" autocomplete="off">
                                    <span class="input-group-btn">
								<button class="btn icon-fallback-text">
									<i class="fa fa-search"></i>
								</button>
							</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <div class="pk-tk row">
                            <div class="col-md-6">
                                <button class="btn icon-fallback-text">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                    Phiếu khách
                                </button>
                            </div>
                            <div class="customer-welcome col-md-6">
                                <button class="btn icon-fallback-text">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Tài khoản
                                </button>
                                <div class="customer-menu">
                                    <ul class="header links">

                                        <li><a href="/account/login">Thông tin</a></li>
                                        <li><a href="/account/register">Sách yêu thích</a></li>
                                        <li><a href="{{route('get-register-user')}}">Đăng ký</a></li>
                                        <li><a href="{{route('get-login-user')}}">Đăng nhập</a></li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
