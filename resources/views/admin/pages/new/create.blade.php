@extends('admin.layouts.master')
@section('admin-css')
    <link href=
              'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
    <style>
        .ui-datepicker {
            width: 20em;
        }
        h1{
            color:green;
        }
    </style>
@endsection
@section('main-content-inner')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <form id="product-form" name="product-form" action="{{ route('admin-new-store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @if (session('add-success'))
                                        <h5 class="action-message mb-2 text-success">{{ session('add-success') }}</h5>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row form-group justify-content-between">
                                        <div>
                                            <h4 class="header-title product-add-title">Thêm tin</h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{route('admin-new')}}">
                                                <i class="ti-list"></i><span>Danh sách</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-8">
                                            <label for="services" class="col-form-label">Tên(*)</label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên tin" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Loại tin</label>
                                            <select class="form-control" name="new_type">
                                                <option value="1" selected>Tin tức</option>
                                                <option value="2">Video</option>
                                                <option value="3">Giờ mở cửa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-8">
                                            <label for="services" class="col-form-label">Hinh ảnh</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control" name="status">
                                                <option value="1" selected>Hoạt động</option>
                                                <option value="2">Nổi bật</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Thứ tự</label>
                                            <input type="text" name="order" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="product-content" class="col-form-label">Nội dung</label>
{{--                                            <textarea class="form-control" name="content" type="text" id="content">--}}
{{--                                        </textarea>--}}
                                            <textarea id="content" name="content" class="form-control my-editor">{!! old('content', '') !!}</textarea>

                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Nhập title" >
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Keywords</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="keywords" placeholder="Nhập keywords"  ></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Description</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="description" placeholder="Nhập description"  ></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Thêm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>--}}
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src=
                "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" defer>
    </script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.2/tinymce.min.js"--}}
{{--            integrity="sha512-AHsE0IVoihNpGako20z2Tsgg77r5h9VS20XIKa+ZZ8WzzXxdbiUszgVUmXqpUE8GVUEQ88BKQqtlB/xKIY3tUg=="--}}
{{--            crossorigin="anonymous" referrerpolicy="no-referrer" ></script>--}}

    <script src="https://cdn.tiny.cloud/1/8p97qgnseizektin8gvxw9l18sqt5yme9hoxdubg897ule69/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    {{--    <script type="text/javascript" src={{ asset('js/ckeditor/ckeditor.js') }}></script>--}}
{{--    <script type="text/javascript" src={{ asset('js/ckfinder/ckfinder.js') }}></script>--}}
    <!-- Place the first <script> tag in your HTML's <head> -->
{{--    <script src="https://cdn.tiny.cloud/1/8p97qgnseizektin8gvxw9l18sqt5yme9hoxdubg897ule69/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>--}}

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss code pageembed preview',
            menubar: 'view',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat | code | pageembed | preview',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            file_picker_callback: function (callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                let type = 'image' === meta.filetype ? 'Images' : 'Files',
                    url  = '/laravel-filemanager?editor=tinymce5&type=' + type;

                tinymce.activeEditor.windowManager.openUrl({
                    url : url,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        });

        {{--<script src="https://cdn.tiny.cloud/1/8p97qgnseizektin8gvxw9l18sqt5yme9hoxdubg897ule69/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>--}}

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    {{--<script>--}}
    {{--    tinymce.init({--}}
    {{--        selector: 'textarea',--}}
    {{--        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',--}}
    {{--        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',--}}
    {{--        tinycomments_mode: 'embedded',--}}
    {{--        tinycomments_author: 'Author name',--}}
    {{--        mergetags_list: [--}}
    {{--            { value: 'First.Name', title: 'First Name' },--}}
    {{--            { value: 'Email', title: 'Email' },--}}
    {{--        ],--}}
    {{--        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),--}}
    {{--    });--}}
    {{--</script>--}}
    </script>

    <script>

        {{--CKEDITOR.replace( 'content', {--}}
        {{--    filebrowserBrowseUrl: '{{route('ckfinder_browser')}}',--}}
        {{--} );--}}
        {{--CKEDITOR.config.extraPlugins = 'embedsemantic'--}}
        {{--CKFinder.config( { connectorPath: '{{route('ckfinder_connector')}}' });--}}
        {{--CKEDITOR.config.embed_provider= '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}&consent=0';--}}

    </script>


    {{--    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />--}}
{{--    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>--}}
{{--    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>--}}
    <script type="text/javascript">
        // var editor = new RichTextEditor("#content");

        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();
            $("input[name='name']").keypress(function(evt) {
                var name = $("input[name='name']").val();
                $("input[name='title']").val(name);
            });
            $( "#my-date" ).datepicker({
            });
        });
    </script>
@endsection


