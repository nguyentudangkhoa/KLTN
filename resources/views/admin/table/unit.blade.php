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
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modal-unit">Thêm đơn vị sản phẩm</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã đơn vị</th>
                                        <th>Tên đơn vị</th>
                                        <th>Thời gian nhập</th>
                                        <th>Thời gian cập nhật</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $unit)
                                    @if($unit->status != 0)
                                    <tr id="tr{{ $unit->id }}">
                                        <td>{{ $unit->id }}</td>
                                        <td>{{ $unit->name }}</td>

                                        <td>{{ $unit->created_at }}</td>
                                        <td>{{ $unit->updated_at }}</td>
                                        <td>
                                            @if($unit->status == 1 && $unit->status != 2)
                                            <div class="btn-group" id="enable{{ $unit->id }}">
                                                <button type="button" data-id="{{ $unit->id }}" data-toggle="modal"
                                                    data-target="#modal-update-unit" data-name="{{ $unit->name }}"
                                                    class="btn-update btn btn-info">Cập nhật</button>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modal-sm-dissall" data-id="{{ $unit->id }}"
                                                    data-name="{{ $unit->name }}" data-table="Unit"
                                                    class="btn btn-un-dis btn-warning">Vô hiệu hóa</button>
                                                <button type="button" data-toggle="modal" data-target="#modal-sm-report"
                                                    data-id="{{ $unit->id }}" data-name="{{ $unit->name }}"
                                                    class="btn btn-delete btn-danger">Xóa</button>
                                            </div>
                                            <div class="btn-group" id="disable{{ $unit->id }}"
                                                style="display: none">
                                                <button type="button" data-toggle="modal" data-target="#modal-un-diss"
                                                    data-id="{{ $unit->id }}"
                                                    data-name="{{ $unit->name }}" data-table="Unit"
                                                    class="btn btn-un-dis btn-danger">Kích hoạt</button>
                                            </div>
                                            @else
                                            <div class="btn-group" id="enable{{ $unit->id }}" style="display: none">
                                                <button type="button" data-id="{{ $unit->id }}" data-toggle="modal"
                                                    data-target="#modal-update-unit" data-name="{{ $unit->name }}"
                                                    class="btn-update btn btn-info">Cập nhật</button>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modal-sm-dissall" data-id="{{ $unit->id }}"
                                                    data-name="{{ $unit->name }}" data-table="Unit"
                                                    class="btn btn-un-dis btn-warning">Vô hiệu hóa</button>
                                                <button type="button" data-toggle="modal" data-target="#modal-sm-report"
                                                    data-id="{{ $unit->id }}" data-name="{{ $unit->name }}"
                                                    class="btn btn-delete btn-danger">Xóa</button>
                                            </div>
                                            <div class="btn-group" id="disable{{ $unit->id }}">
                                                <button type="button" data-toggle="modal" data-target="#modal-un-diss"
                                                    data-id="{{ $unit->id }}"
                                                    data-name="{{ $unit->name }}" data-table="Unit"
                                                    class="btn btn-un-dis btn-danger">Kích hoạt</button>
                                            </div>
                                            @endif
                                        </td>
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
<!--Model-->
@include('component.admin.add_unit')
@include('component.admin.update_unit')
@include('component.admin.un_diss_unit')
@include('component.admin.disable_unit')
@endsection
