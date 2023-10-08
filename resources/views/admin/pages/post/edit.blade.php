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
                                <form id="product-form" name="product-form" action="{{ route('admin-post-update', ['id'=> $post->id]) }}" enctype="multipart/form-data" method="POST">
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
                                            <h4 class="header-title product-add-title">Sửa bài viết</h4>
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
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên bài viết" required value="{{$post->name}}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Hình ảnh</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Danh mục</label>
                                            <select id="category-link" class="category-link form-control" name="category_id" multiple>
                                                @if($post->category)
                                                    <option value="{{$post->category_id}}">{{$post->category->name}}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control item-status" name="status" data-value="{{ $post->status }}">
                                                <option value="1" selected>Hoạt động</option>
                                                <option value="2">Nổi bật</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
{{--                                    <div class="row form-group">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <label for="product-content" class="col-form-label">Giới thiệu sách</label>--}}
{{--                                            <textarea class="form-control" name="content" type="text" id="content">--}}
{{--                                                {{$post->content}}--}}
{{--                                            </textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Phụ đề</label>
                                            <input type="text" name="subtitle" value="{{$post->subtitle}}" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Tác giả</label>
                                            <input type="text" name="author" value="{{$post->author}}" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Ký hiệu tác giả</label>
                                            <input type="text" name="book_authorsymbol" value="{{$post->book_authorsymbol}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">DDC</label>
                                            <input type="text" name="category_name" value="{{$post->category_name}}" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Ngôn ngữ</label>
                                            <input type="text" name="book_language" value="{{$post->book_language}}" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Tập - Số</label>
                                            <input type="text" name="book_episode" value="{{$post->book_episode}}" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Số cuốn</label>
                                            <input type="number" name="book_number" value="{{$post->book_number}}" class="form-control">
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
                                                <div id="p_scentsValue">
                                                @if($post->bookVersion->count())
                                                    @foreach($post->bookVersion as $key=> $books)
                                                <div class="row form-group rTableRow">
                                                    <div class="col-md-2">
                                                        <input type="hidden" class="form-control" name="book_code[]" value="{{ $books->book_code }}">
                                                        <input type="text" class="form-control" name="book_hidden[]" value="{{ $books->book_code }}" disabled>
                                                    </div>
                                                    <div class="col-md-2"><input type="text" class="form-control" name="book_publisher[]" value="{{ $books->book_publisher }}"></div>
                                                    <div class="col-md-2"><input type="number" class="form-control" name="book_yearpublication[]" value="{{ $books->book_yearpublication }}"></div>
                                                    <div class="col-md-1"><input type="number" class="form-control" name="book_size[]" value="{{ $books->book_size }}"></div>
                                                    <div class="col-md-1"><input type="number" class="form-control" name="book_numberpages[]" value="{{ $books->book_numberpages }}"></div>
                                                    <div class="col-md-2"><input type="text" class="form-control" name="book_warehouse[]" value="{{ $books->book_warehouse }}"></div>
                                                    <div class="col-md-1">{{--<input type="text" class="form-control" name="book_status[]">--}}
                                                        <select class="form-control" name="book_status[]">
                                                            <option value="1" selected>Hiện có</option>
                                                            <option value="0">Đã hết</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1" style="vertical-align: middle"><a href="javascript:;" class="remScnt" style="padding:0 3px; display: block;"><i class="ti-trash"></i></a></div>
                                                </div>
                                                    @endforeach
                                                @endif
                                                </div>
                                                <div id="p_scents" @if($post->bookVersion->count())style="display: none"@endif>
                                                    <div class="row form-group rTableRow">
                                                        <div class="col-md-2"><input type="text" class="form-control" name="book_code[]"></div>
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
                                            <textarea class="form-control" name="bookcontents" type="text" id="bookcontents" rows="6"> {{$post->bookcontents}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Nhập title"  value="{{$post->title}}" >
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Keywords</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="keywords" placeholder="Nhập keywords"  > {{$post->keywords}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Description</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="description" placeholder="Nhập description"  > {{$post->description}}</textarea>
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
    {{--    <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
{{--    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />--}}
{{--    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>--}}
{{--    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>--}}
    <script type="text/javascript">
        //var editor = new RichTextEditor("#content");
        {{--ClassicEditor--}}
        {{--    .create( document.querySelector( '#content' ), {--}}
        {{--        ckfinder: {--}}
        {{--            uploadUrl: "{{route('admin-post-ckeditor-upload', ['_token' => csrf_token() ])}}"--}}
        {{--        }--}}
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

            let status = $('.item-status').data('value');
            $('.item-status').val(status);

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
                return false;
            });

            $(this).on('click', '.remScnt', function() {
                if( i > 2 ) {
                    $(this).parents('div.rTableRow').remove();
                    i--;
                }
                return false;
            });
            //Edit !Value
            var j = $('#p_scentsValue .rTableRow').size() + 1;
            $(this).on('click', '.remScnt', function() {
                if( j >= 1 ) {
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


