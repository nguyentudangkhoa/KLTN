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
                    <h1>Hóa đơn</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hóa đơn</li>
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
                            <h3 class="card-title">Dữ liệu hóa đơn</h3><br>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã hóa đơn</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tình trạng đơn hàng</th>
                                        <th>Thời gian tạo</th>
                                        <th>Thời gian cập nhật</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bills as $bill)
                                    @if($bill->status != 5)
                                    <tr id="tb-bill{{ $bill->id }}">
                                        <td>{{ $bill->id }}</td>
                                        <td>{{ $bill->Customer->name }}</td>
                                        <td>{{ $bill->total}}</td>
                                        <td>{{ $bill->Payment->name  }}</td>
                                        <td>{{ $bill->order_date }}</td>
                                        @if($bill->status == 0)
                                        <td>Đơn hàng bị hủy</td>
                                        @elseif($bill->status == 1)
                                        <td>Đơn hàng đang chờ xác nhận</td>
                                        @elseif($bill->status == 2)
                                        <td>Đã xác nhận đơn hàng</td>
                                        @elseif($bill->status == 3)
                                        <td>Đơn hàng đang giao</td>
                                        @elseif($bill->status == 4)
                                        <td>Đơn hàng giao thành công</td>
                                        @endif

                                        <td>{{ $bill->created_at }}</td>
                                        <td>{{ $bill->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button"  data-id = "{{ $bill->id }}" data-route="{{ route('show-bill',$bill->id) }}"  class="redirect-bill btn-update btn btn-info">Xem thông tin</button>
                                                @if($bill->status != 0   || $bill->status != 3)
                                                <button type="button" data-id = "{{ $bill->id }}" data-toggle="modal" data-target="#modal-update-bills"  class="btn btn-bill-status btn-warning">Cập nhật đơn hàng</button>
                                                @endif
                                                <button type="button" data-id = "{{ $bill->id }}" data-name = "Hóa đơn số {{ $bill->id }}" data-toggle="modal" data-target="#modal-sm-delete-bill" class="btn btn-delete btn-info">Xóa</button>
                                              </div>
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
@include('component.admin.delete-bill')
@endsection
