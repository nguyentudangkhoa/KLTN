<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    <p>Dear {{ $details['name'] }}!</p>
    <p>{{ $details['body'] }}</p>
    <table style="text-align: center;">
        <tr>
            <th style="padding: 10px;">Tên sản phẩm</th>
            <th style="padding: 10px;">Số lượng</th>
            <th style="padding: 10px;">Đơn giá</th>
            <th style="padding: 10px;">Thành tiền</th>
        </tr>
        @foreach ($details['cart']->items as $key=>$item)
            <tr>
                <td style="padding: 10px;">{{ $item['item']->name }}</td>
                <td style="padding: 10px;">{{ $item['qty']}}</td>
                @if($item['item']->promotion_price == null)
                <td style="padding: 10px;">{{ number_format($item['item']->price) }} VND</td>
                @else
                <td style="padding: 10px;">{{ number_format($item['item']->promotion_price) }} VND</td>
                @endif
                <td style="padding: 10px;">{{ number_format($item['price']) }} VND</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="3" style="text-align: right;">Tổng cộng:</td>
            <td style="padding: 10px;">{{ number_format($details['cart']->totalPrice) }} VND</td>
        </tr>
    </table>
</body>

</html>
