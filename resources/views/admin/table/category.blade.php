@extends('master.admin_master')
@section( 'title_admin')
    Admin Category
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
                        <li class="breadcrumb-item active">Danh mục sản phẩm</li>
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
                            <h3 class="card-title">Dữ liệu danh mục sản phẩm</h3><br>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default-category">Thêm danh mục</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã danh mục</th>
                                        <th>Tên danh mục</th>
                                        <th>Danh mục tổng</th>
                                        <th>Thời gian nhập</th>
                                        <th>Thời gian cập nhật</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr id="tb-cate{{ $category->id }}">
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{$category->Group_Type->name }}</td>

                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            @if ($category->status == 1 )
                                                <div class="btn-group" id="category-enable{{ $category->id }}">
                                                <button type="button" data-id = "{{ $category->id }}" data-name ="{{ $category->name }}" data-toggle="modal" data-target="#modal-update-category" class="btn-update btn btn-info">Cập nhật</button>
                                                <button type="button" data-id = "{{ $category->id }}" data-name ="{{ $category->name }}" class="btn btn-disable btn-danger" data-toggle="modal" data-target="#modal-sm-report">Xóa</button>
                                              </div>
                                              <div class="btn-group" id="category-disable{{ $category->id }}" style="display: none">
                                                <button type="button"  data-toggle="modal" data-target="#modal-un-diss" data-id = "{{ $category->id }}" data-name ="{{ $category->name }}" data-table="Product" class="btn btn-un-dis btn-danger">Kích hoạt</button>
                                              </div>
                                            @else
                                            <div class="btn-group" id="category-enable{{ $category->id }}" style="display: none">
                                                <button type="button" data-id = "{{ $category->id }}" data-name ="{{ $category->name }}" data-toggle="modal" data-target="#modal-update-category" class="btn-update btn btn-info">Cập nhật</button>
                                                <button type="button" data-id = "{{ $category->id }}" data-name ="{{ $category->name }}" class="btn btn-disable btn-danger" data-toggle="modal" data-target="#modal-sm-report">Xóa</button>
                                              </div>
                                              <div class="btn-group" id="category-disable{{ $category->id }}" >
                                                <button type="button"  data-toggle="modal" data-target="#modal-un-diss" data-id = "{{ $category->id }}" data-name ="{{ $category->name }}" data-table="Product" class="btn btn-un-dis btn-danger">Kích hoạt</button>
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
@include('component.admin.add_category')
@include('component.admin.update_category')
@include('component.admin.disable_type')
@include('component.admin.delete')
@include('component.admin.un_dis_cate')
@endsection
