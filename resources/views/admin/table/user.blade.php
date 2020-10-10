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
                    <h1>Người dùng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Người dùng</li>
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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã người dùng</th>
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Hình đại diện</th>
                                        <th>Quyền</th>
                                        <th>Tình trạng</th>
                                        <th>Số điện thoại</th>
                                        <th>Tổng số lần mua</th>
                                        <th>Thời gian đăng nhập</th>
                                        <th>Thời gian đăng xuất</th>
                                        <th>Thời gian tạo tài khoản</th>
                                        <th>Thời gian cập nhật</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @if ($user->image == null)
                                        <td><img class="profile-user-img img-fluid img-circle"
                                            src="assets/AdminLTE/dist/img/user4-128x128.jpg" alt="User profile picture"></td>
                                        @else
                                        <td><img class="profile-user-img img-fluid img-circle"
                                            src="assets/AdminLTE/dist/img/{{ $user->image }}"
                                            alt="User profile picture"></td>
                                        @endif
                                        <td>{{ $user->Roles->name }}</td>
                                        @if ($user->status == 1)
                                            <td> kích hoạt </td>
                                        @else
                                            <td>Vô hiệu hóa</td>
                                        @endif
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->total_buy }}</td>
                                        <td>{{ $user->login_time }}</td>
                                        <td>{{ $user->logout_time }}</td>



                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" data-id = "{{ $user->id }}" class="btn-update btn btn-info">Cập nhật</button>
                                                <button type="button" data-id = "{{ $user->id }}" class="btn btn-warning">Vô hiệu</button>
                                                <button type="button" data-id = "{{ $user->id }}" class="btn btn-info">Xóa</button>
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
