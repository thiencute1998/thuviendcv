@extends('admin.layouts.master')

@section('admin-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                                <form id="product-form" name="product-form" action="{{ route('admin-post-store') }}" enctype="multipart/form-data" method="POST">
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
                                    <h4 class="header-title product-add-title">Thêm bài viết</h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{route('admin-post')}}">
                                                <i class="ti-list"></i><span>Danh sách</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Tên(*)</label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên bài viết" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Hinh anh</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Danh mục</label>
                                            <select id="category-link" class="category-link form-control" name="category_id" multiple>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control" name="status">
                                                <option value="1" selected>Hoạt động</option>
                                                <option value="2">Nổi bật</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
{{--                                    <div class="row form-group">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <label for="product-content" class="col-form-label">Giới thiệu sách</label>--}}
{{--                                            <textarea class="form-control" name="content" type="text" id="content" rows="6"> {{$dfpost['content']}}</textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Phụ đề</label>
                                            <input type="text" name="book_subtitle" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Tác giả</label>
                                            <input type="text" name="author" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Ký hiệu tác giả</label>
                                            <input type="text" name="book_authorsymbol" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">DDC</label>
                                            <input type="text" name="category_name" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Ngôn ngữ</label>
                                            <input type="text" name="book_language" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Tập - Số</label>
                                            <input type="text" name="book_episode" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Số cuốn</label>
                                            <input type="number" name="book_number" value="{{$dfpost['book_number']}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="product-content" class="col-form-label">Hiện trạng các bản sách</label>
                                            <div>
                                                <div class="row form-group">
                                                    <div class="col-md-2">Mã số</div>
                                                    <div class="col-md-2">Nhà xuất bản</div>
                                                    <div class="col-md-2">Năm xuất bản</div>
                                                    <div class="col-md-1">Khổ sách</div>
                                                    <div class="col-md-1">Số trang</div>
                                                    <div class="col-md-2">Kho sách</div>
                                                    <div class="col-md-1">Tình trạng</div>
                                                    <div class="col-md-1">Xóa</div>
                                                </div>
                                                <div id="p_scents">
                                                <div class="row form-group rTableRow">
                                                    <div class="col-md-2">
                                                        <input type="hidden" class="form-control" name="book_code[]" value="10">
                                                        <input type="text" class="form-control" name="book_hidden[]" value="10" disabled>
                                                    </div>
                                                    <div class="col-md-2"><input type="text" class="form-control" name="book_publisher[]"></div>
                                                    <div class="col-md-2"><input type="number" class="form-control" name="book_yearpublication[]"></div>
                                                    <div class="col-md-1"><input type="number" class="form-control" name="book_size[]"></div>
                                                    <div class="col-md-1"><input type="number" class="form-control" name="book_numberpages[]"></div>
                                                    <div class="col-md-2"><input type="text" class="form-control" name="book_warehouse[]"></div>
                                                    <div class="col-md-1">{{--<input type="text" class="form-control" name="book_status[]">--}}
                                                        <select class="form-control" name="book_status[]">
                                                            <option value="1" selected>Hiện có</option>
                                                            <option value="0">Đã hết</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1" style="vertical-align: middle"><a href="javascript:;" class="remScnt" style="padding:0 3px; display: block;"><i class="ti-trash"></i></a></div>
                                                </div>
                                                </div>
                                                <div style="border-top:none;" id="p_scents1"></div>
                                                <h3 id="addScnt" style="font-size:13px; font-weight:bold; margin:8px 0;"> <a href="javascript:;" ><i class="ti-plus"></i> Thêm dòng</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="product-content" class="col-form-label">Mục lục</label>
                                            <textarea class="form-control" name="bookcontents" type="text" id="bookcontents" rows="6"> </textarea>
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
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="keywords" placeholder="Nhập keywords" ></textarea>
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
{{--    <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
{{--    <script type="text/javascript" src="{{ asset('plugins/ckeditor5-build-classic/ckeditor.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('plugins/ckfinder/ckfinder.js') }}"></script>--}}
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
{{--    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />--}}
{{--    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>--}}
{{--    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>--}}
    <script src="{{ asset('assets/admin/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript">
        // var editor = new RichTextEditor("#content");
        {{--ClassicEditor--}}
        {{--    .create( document.querySelector( '#content' ), {--}}
        {{--        ckfinder: {--}}
        {{--            uploadUrl: "{{route('admin-post-ckeditor-upload', ['_token' => csrf_token() ])}}"--}}
        {{--        },--}}
        {{--    } )--}}
        {{--    .then( editor => {--}}
        {{--        editor.ui.view.editable.element.style.height = '250px';--}}
        {{--    } )--}}
        {{--    .catch( error => {--}}
        {{--        console.error( error );--}}
        {{--    } );--}}

        ClassicEditor
            .create( document.querySelector( '#bookcontents' ), {
                ckfinder: {
                    uploadUrl: "{{route('admin-post-ckeditor-upload', ['_token' => csrf_token() ])}}"
                },
            } )
            .then( editor => {
                editor.ui.view.editable.element.style.height = '250px';
            } )
            .catch( error => {
                console.error( error );
            } );

        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();
            $("input[name='name']").keypress(function(evt) {
                var name = $("input[name='name']").val();
                $("input[name='title']").val(name);
            });
            $('#category-link').select2({
                multiple: false,
                allowClear: true,
                placeholder: "Chọn danh muc",
                ajax: {
                    url: "{{route('admin-category-get-parent')}}",
                    type: 'post',
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            name: params.term,
                            "_token":"{{csrf_token()}}"
                        }
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        }
                    }
                }
            });

            $('#tag-link').select2({
                multiple: true,
                allowClear: true,
                placeholder: "Chọn tag",
                ajax: {
                    url: "{{route('admin-tag-get-all')}}",
                    type: 'post',
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            name: params.term,
                            "_token":"{{csrf_token()}}"
                        }
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        }
                    }
                }
            });
        });

        $(function() {
            var scntDiv = $('#p_scents1');
            var i = $('#p_scents .rTableRow').size() + 1;
            $('#addScnt').on('click', function() {
                var addhtml =$('#p_scents').html();
                $(addhtml).appendTo(scntDiv);
                i++;
                var j= i +8;
                $("#p_scents1 .rTableRow:last-child div:first-child input").attr("value",j);
                return false;
            });

            $(this).on('click', '.remScnt', function() {
                if( i > 2 ) {
                    $(this).parents('div.rTableRow').remove();
                    i--;
                }
                return false;
            });

        });
    </script>
    <style type="text/css">
        .ck-editor__editable {
            min-height: 210px !important;
        }
    </style>
@endsection


