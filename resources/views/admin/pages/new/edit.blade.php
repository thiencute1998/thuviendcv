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
                                <form id="product-form" name="product-form" action="{{ route('admin-new-update', ['id'=> $new->id]) }}" enctype="multipart/form-data" method="POST">
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
                                            <h4 class="header-title product-add-title">Sửa tin</h4>
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
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên tin" required value="{{$new->name}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Loại tin</label>
                                            <select class="form-control item-new_type" name="new_type" data-value="{{ $new->new_type }}">
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
                                            <select class="form-control item-status" name="status" data-value="{{ $new->status }}">
                                                <option value="1" selected>Hoạt động</option>
                                                <option value="2">Nổi bật</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Thứ tự</label>
                                            <input type="text" name="order" class="form-control" value="{{$new->order}}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="product-content" class="col-form-label">Nội dung</label>
                                            <textarea class="form-control" name="content" type="text" id="content">
                                                {{$new->content}}
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Nhập title"  value="{{$new->title}}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Keywords</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="keywords" placeholder="Nhập keywords"  >{{$new->keywords}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Description</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="description" placeholder="Nhập description"  >{{$new->description}}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Sửa</button>
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
{{--    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />--}}
{{--    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>--}}
{{--    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.2/tinymce.min.js"--}}
{{--            integrity="sha512-AHsE0IVoihNpGako20z2Tsgg77r5h9VS20XIKa+ZZ8WzzXxdbiUszgVUmXqpUE8GVUEQ88BKQqtlB/xKIY3tUg=="--}}
{{--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    <script src="https://cdn.tiny.cloud/1/8p97qgnseizektin8gvxw9l18sqt5yme9hoxdubg897ule69/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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
    </script>
    <script type="text/javascript">
        // var editor = new RichTextEditor("#content");

        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();

            let status = $('.item-status').data('value');
            $('.item-status').val(status);

            let new_type = $('.item-new_type').data('value');
            $('.item-new_type').val(new_type);

            $( "#my-date" ).datepicker({
            });
        });
    </script>
@endsection


