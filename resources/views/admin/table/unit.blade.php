@extends('master.admin_master')
@section( 'title_admin')
    Admin Root Category
@endsection
@section('admin-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đơn vị sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Đơn vị sản phẩm gốc</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dữ liệu đơn vị sản phẩm gốc</h3><br>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Thêm đơn vị sản phẩm</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã đơn vịc</th>
                                        <th>Tên đơn vịc</th>
                                        <th>Thời gian nhập</th>
                                        <th>Thời gian cập nhật</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $unit->id }}</td>
                                        <td>{{ $unit->name }}</td>

                                        <td>{{ $unit->created_at }}</td>
                                        <td>{{ $unit->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" data-id = "{{ $unit->id }}" class="btn-update btn btn-info">Cập nhật</button>
                                                <button type="button" data-id = "{{ $unit->id }}" class="btn btn-warning">Vô hiệu</button>
                                                <button type="button" data-id = "{{ $unit->id }}" class="btn btn-info">Xóa</button>
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
@endsection
