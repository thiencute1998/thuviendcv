@extends('admin.layouts.master')
@section('admin-css')
    <style type="text/css">
        .product-remove{
            cursor: pointer;
            color: darkred;
        }
        .td-img{
            max-width: 325px;
            max-height: 158px;
            overflow: hidden;
            margin: auto;
        }
    </style>
@endsection
@section('main-content-inner')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- basic table start -->
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row form-group justify-content-between">
                            <div>
                                @if (session('delete-success'))
                                    <h5 class="work-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                @endif
                                <h4 class="header-title">Danh sách User Mượn sách</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Mã độc giả</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Điện thoại</th>
                                        <th scope="col">Ngày mượn</th>
                                        <th scope="col">Sách mượn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($borrowbooks as $item)
                                        <tr>
                                            <td class="text-left">
                                                {{$item->user_code}}
                                            </td>
                                            <td class="text-left">
                                                {{$item->user_email}}
                                            </td>
                                            <td class="text-left">
                                                {{$item->user_phone}}
                                            </td>
                                            <td>
                                                {{$item->created_at->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                <div>
                                                    @foreach($bookborrowdetails as $item1)
                                                        @if($item1->book_borrow_id == $item->id)
                                                        <p>Tên sách: {{$item1->book_name}} - Mã số: {{$item1->book_code}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="justify-content: flex-end;">
                            {{ $borrowbooks->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- basic table end -->
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.work-message').delay(5000).fadeOut();
        })
    </script>
@endsection
