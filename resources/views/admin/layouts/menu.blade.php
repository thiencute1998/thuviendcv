<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <h4><a href="{{route('admin-index')}}" class="text-white">Admin</a></h4>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{Request::path() == 'admin' ? 'active' : ''}}">
                        <a href="{{route('admin-index')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Trang chủ Admin</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/about') ? 'active' : ''}}">
                        <a href="{{route('admin-about')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý giới thiệu</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/banner') ? 'active' : ''}}">
                        <a href="{{route('admin-banner')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý banner</span></a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="{{route('admin-slide')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý slide</span></a>--}}
{{--                    </li>--}}
                    <li class="{{str_contains(Request::path(), 'admin/category') ? 'active' : ''}}">
                        <a href="{{route('admin-category')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý danh mục</span></a>
                    </li>
{{--                    <li class="{{str_contains(Request::path(), 'admin/tabhome') ? 'active' : ''}}">--}}
{{--                        <a href="{{route('admin-tabhome')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý Tab home</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="{{str_contains(Request::path(), 'admin/tag') ? 'active' : ''}}">--}}
{{--                        <a href="{{route('admin-tag')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý tag</span></a>--}}
{{--                    </li>--}}
                    <li class="{{str_contains(Request::path(), 'admin/post') ? 'active' : ''}}">
                        <a href="{{route('admin-post')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý sách</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/new') ? 'active' : ''}}">
                        <a href="{{route('admin-new')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý tin tức, video</span></a>
                    </li>
{{--                    <li class="{{str_contains(Request::path(), 'admin/video') ? 'active' : ''}}">--}}
{{--                        <a href="{{route('admin-video')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý Video</span></a>--}}
{{--                    </li>--}}
                    <li class="{{str_contains(Request::path(), 'admin/link') ? 'active' : ''}}">
                        <a href="{{route('admin-link')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý liên kết website</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/borrowbook') ? 'active' : ''}}">
                        <a href="{{route('admin-borrowbook')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý Mượn sách</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/email') ? 'active' : ''}}">
                        <a href="{{route('admin-email')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý Email đăng ký</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/manage') ? 'active' : ''}}">
                        <a href="admin/banners" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản trị</span></a>
                        <ul class="collapse">
                            <li ><a href="{{route('admin-configs')}}">Cấu hình</a></li>
                            <li class="{{str_contains(Request::path(), 'admin/manage/admins') ? 'active' : ''}}"><a href="{{route('admins')}}">Người dùng(Admin)</a></li>
                            <li class="{{str_contains(Request::path(), 'admin/manage/users') ? 'active' : ''}}"><a href="{{route('users')}}">Người dùng(User)</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<style>
    .metismenu li a{ padding: 10px 15px !important;}
</style>
<!-- sidebar menu area end -->
