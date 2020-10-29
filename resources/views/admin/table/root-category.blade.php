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
                    <h1>Danh mục sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh mục sản phẩm gốc</li>
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
                            <h3 class="card-title">Dữ liệu danh mục sản phẩm gốc</h3><br>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-total-category">Thêm danh mục gốc</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã danh mục gốc</th>
                                        <th>Tên danh mục gốc</th>
                                        <th>Thời gian nhập</th>
                                        <th>Thời gian cập nhật</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rootCategories as $rootCategory)
                                    <tr id="tb-group{{ $rootCategory->id }}">
                                        <td>{{ $rootCategory->id }}</td>
                                        <td>{{ $rootCategory->name }}</td>

                                        <td>{{ $rootCategory->created_at }}</td>
                                        <td>{{ $rootCategory->updated_at }}</td>
                                        <td>
                                            @if ($rootCategory->status == 1)
                                                <div class="btn-group" id="enable{{ $rootCategory->id }}">
                                                <button type="button" data-id = "{{ $rootCategory->id }}" data-name="{{ $rootCategory->name }}" data-toggle="modal" data-target="#modal-update-total-category" class="btn-update btn btn-info">Cập nhật</button>
                                                <button type="button"  data-toggle="modal" data-target="#modal-sm-dissall" data-id = "{{ $rootCategory->id }}" data-name ="{{ $rootCategory->name }}" data-table="Group_type" class="btn btn-un-dis btn-warning">Vô hiệu hóa</button>
                                                <button type="button" data-id = "{{ $rootCategory->id }}" data-name="{{ $rootCategory->name }}" data-toggle="modal" data-target="#modal-dis-group" class="btn btn-disable btn-danger">Xóa</button>
                                              </div>
                                              <div class="btn-group" id="disable{{ $rootCategory->id }}" style="display: none">
                                                <button type="button"  data-toggle="modal" data-target="#modal-un-diss" data-id = "{{ $rootCategory->id }}" data-name ="{{ $rootCategory->name }}" data-table="Product" class="btn btn-un-dis btn-danger">Kích hoạt</button>
                                              </div>
                                            @else
                                            <div class="btn-group" id="enable{{ $rootCategory->id }}" style="display: none">
                                                <button type="button" data-id = "{{ $rootCategory->id }}" data-name="{{ $rootCategory->name }}" data-toggle="modal" data-target="#modal-update-total-category" class="btn-update btn btn-info">Cập nhật</button>
                                                <button type="button"  data-toggle="modal" data-target="#modal-sm-dissall" data-id = "{{ $rootCategory->id }}" data-name ="{{ $rootCategory->name }}" data-table="Group_type" class="btn btn-un-dis btn-warning">Vô hiệu hóa</button>
                                                <button type="button" data-id = "{{ $rootCategory->id }}" data-name="{{ $rootCategory->name }}" data-toggle="modal" data-target="#modal-dis-group" class="btn btn-disable btn-danger">Xóa</button>
                                              </div>
                                              <div class="btn-group" id="disable{{ $rootCategory->id }}" >
                                                <button type="button"  data-toggle="modal" data-target="#modal-un-diss" data-id = "{{ $rootCategory->id }}" data-name ="{{ $rootCategory->name }}" data-table="Product" class="btn btn-un-dis btn-danger">Kích hoạt</button>
                                              </div>
                                            @endif

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
@include('component.admin.add_groupType')
@include('component.admin.update_groupType')
@include('component.admin.disable-group')
@include('component.admin.un_dis_root_cate')
@endsection
