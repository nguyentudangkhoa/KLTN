@extends('master.admin_master')
@section( 'title_admin')
    Admin Product
@endsection
@section('admin-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if(Session::has('report'))
        <div class="alert alert-danger">{{Session::get('report')}}</div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dữ liệu sản phẩm</h3><br>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Thêm sản phẩm</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Giá khuyến mãi</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Đơn vị</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Thời gian nhập</th>
                                        <th>Thời gian cập nhật</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }} VND</td>
                                        @if ($product->Discount_Info->first()&&strtotime($product->Discount_Info->first()->end_at) > strtotime(date("Y-m-d")))
                                        @if ($product->Discount_Info->first()->status == 1)
                                        <td>{{ number_format($product->Discount_Info->first()->promotion_price) }} VND</td>
                                        @else
                                        <td>0 VND</td>
                                        @endif
                                        @else
                                        <td>0 VND</td>
                                        @endif
                                        <td> <img src="assets/images/{{ $product->images }}" height="50px" width="50px" alt=""></td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->Unit->name }}</td>
                                        <td>{{ $product->Product_Type->name }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" data-id = "{{ $product->id }}" class="btn-update btn btn-info">Cập nhật</button>
                                                <button type="button" data-id = "{{ $product->id }}" class="btn btn-warning">Vô hiệu</button>
                                                <button type="button" data-id = "{{ $product->id }}" class="btn btn-info">Xóa</button>
                                              </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Model-->
@include('component.admin.add_product')
@endsection
