@extends('master.admin_master')
@section( 'title_admin')
    Admin Xuất kho
@endsection
@section('admin-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Xuất kho</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Xuất kho</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if(Session::has('Update-Images-Product-ff'))
        <div class="alert alert-danger">{{Session::get('Update-Images-Product-ff')}}</div>
    @endif
    @if(Session::has('Update-Images-Product-ss'))
        <div class="alert alert-success">{{Session::get('Update-Images-Product-ss')}}</div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dữ liệu xuất kho</h3><br>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng xuất</th>
                                        <th>Ngày xuất</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($billDetail as $detail)
                                    @if($detail->Bill->status == 4)
                                    <tr id="tb-product{{ $detail->id }}">
                                        <td>{{ $detail->id_product }}</td>
                                        <td>{{ $detail->Product->name }}</td>
                                        <td> <img src="assets/images/{{ $detail->Product->images }}" height="50px" width="50px" alt=""></td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ $detail->Bill->order_date }}</td>
                                    </tr>
                                    @endif
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

@endsection
