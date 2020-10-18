<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill</title>
</head>
<body>
    <div class="card-body">
        <label for="">Mã hóa đơn:</label> {{ $bill->id }} <br>
        <label for="">Tên khách hàng: </label> {{ $bill->Customer->name }}<br>
        <label for="">Email:</label> {{ $bill->Customer->email }}<br>
        <label for="">Số điện thoại:</label> {{ $bill->Customer->phone_number }}<br>
        <label for="">Phương thức thanh toán:</label> COD<br>
        <label for="">Ngày thanh toán:</label> {{ date('m/d/Y', strtotime($bill->order_date)) }} <br>
        <label for="">Giờ thanh toán:</label>  {{ date('H:m:s A',strtotime($bill->order_date)) }}<br>
        <table style="text-align: center;">
            <tr>
                <th style="padding: 10px;">Tên sản phẩm</th>
                <th style="padding: 10px;">Số lượng</th>
                <th style="padding: 10px;">Đơn giá</th>
                <th style="padding: 10px;">Thành tiền</th>
            </tr>
            @foreach ($bill->Bill_Detail as $detail)
                <tr>
                    <td style="padding: 10px;">{{ $detail->Product->name }}</td>
                    <td style="padding: 10px;">{{ $detail->quantity}}</td>
                    <td style="padding: 10px;">{{ number_format($detail->Product->price) }} VND</td>
                    <td style="padding: 10px;">{{ number_format($detail->price) }} VND</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="3" style="text-align: right;">Tổng cộng:</td>
                <td style="padding: 10px;">{{ number_format($bill->total) }} VND</td>
            </tr>
        </table>
    </div>
</body>
</html>
