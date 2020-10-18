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
    <style>
        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid rgb(167, 161, 161);
        }

        th {
            background-color: black;
            color: whitesmoke;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chi tiết đơn hàng</h3><br>
                            <form action="{{ route('print-bills',$bills->id ) }}" method="GET">
                                <button type="submit" class="btn btn-success" data-toggle="modal"  data-target="#modal-default"> <i class="fas fa-print"></i> In hóa đơn</button>
                            </form>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <label for="">Mã hóa đơn:</label> {{ $billDetail->first()->Bill->id }} <br>
                            <label for="">Tên khách hàng: </label> {{ $billDetail->first()->Bill->Customer->name }}<br>
                            <label for="">Email:</label> {{ $billDetail->first()->Bill->Customer->email }}<br>
                            <label for="">Số điện thoại:</label> {{ $billDetail->first()->Bill->Customer->phone_number }}<br>
                            <label for="">Phương thức thanh toán:</label> COD<br>
                            <label for="">Ngày thanh toán:</label> {{ date('m/d/Y', strtotime($billDetail->first()->Bill->order_date)) }} <br>
                            <label for="">Giờ thanh toán:</label>  {{ date('H:m:s A',strtotime($billDetail->first()->Bill->order_date)) }}<br>
                            <table style="text-align: center;">
                                <tr>
                                    <th style="padding: 10px;">Tên sản phẩm</th>
                                    <th style="padding: 10px;">Số lượng</th>
                                    <th style="padding: 10px;">Đơn giá</th>
                                    <th style="padding: 10px;">Thành tiền</th>
                                </tr>
                                @foreach ($billDetail as $detail)
                                    <tr>
                                        <td style="padding: 10px;">{{ $detail->Product->name }}</td>
                                        <td style="padding: 10px;">{{ $detail->quantity}}</td>
                                        <td style="padding: 10px;">{{ number_format($detail->Product->price) }} VND</td>
                                        <td style="padding: 10px;">{{ number_format($detail->price) }} VND</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="3" style="text-align: right;">Tổng cộng:</td>
                                    <td style="padding: 10px;">{{ number_format($bills->total) }} VND</td>
                                </tr>
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
