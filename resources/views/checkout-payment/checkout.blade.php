@extends('master.master')
@section('title')
Xác nhận thanh toán
@endsection
@section('content')
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.html">Home</a>
                    <i>|</i>
                </li>
                <li>Giỏ hàng</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- checkout page -->
@if(Session::has('cart'))
<div class="privacy">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Giỏ hàng
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <h4>Giỏ hàng của bạn đang có:
                <span><label id="lbl-quantity-info"> {{ $cart->totalQty }} </label> sản phẩm</span>
            </h4>
            <div class="table-responsive" id="tb_cart">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>

                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th>Xóa sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody><input type="hidden" name="" value="{{ $i=1 }}">
                        @foreach($product_cart as $product)
                        <tr class="rem{{ $product['item']['id'] }}">
                            <td class="invert">{{ $i++ }}</td>
                            <td class="invert-image">
                                <a href="single2.html">
                                    <img src="assets/images/{{$product['item']['images']}}" alt=" "
                                        class="img-responsive">
                                </a>
                            </td>
                            <td class="invert">{{ $product['item']['name'] }}</td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div class="entry value-minus btn-minus" data-token="{{ csrf_token() }}"
                                            data-id={{  $product['item']['id']  }}>&nbsp;</div>
                                        <input type="text" name="" class="entry value txt_quantity" id="quantity{{ $product['item']['id'] }}" data-id="{{ $product['item']['id'] }}" data-token="{{ csrf_token() }}" value="{{$product['qty']}}">
                                        {{--  <div class="entry value" id="quantity{{ $product['item']['id'] }}">
                                            <span>{{$product['qty']}}</span>
                                        </div>  --}}
                                        <div class="entry value-plus active btn-plus" data-token="{{ csrf_token() }}"
                                            data-id={{  $product['item']['id']  }}>&nbsp;</div>
                                    </div>
                                    @if($product['item']['id_unit']==2)
                                    <p>x 100G </p>
                                    @else
                                    <p>x {{ $product['item']->Unit->name }}</p>
                                    @endif
                                </div>
                            </td>
                            @if($product['item']['promotion_price'] != null && strtotime($product['item']['end_at']) >
                            strtotime(date("Y-m-d")))
                            <td class="invert">{{ number_format($product['item']['promotion_price']) }} VND</td>

                            @else
                            <td class="invert">{{ number_format($product['item']['price'])}} VND </td>
                            @endif
                            <td class="invert">
                                <p id="price_product_all_{{  $product['item']['id']  }}">{{ number_format($product['price']) }} VND</p>
                            </td>
                            <td class="invert">
                                <div class="rem">
                                    <div class="close1" data-toggle="modal" data-target="#confirm-cart-delete"
                                        data-name="{{ $product['item']['name'] }}"
                                        data-id="{{ $product['item']['id'] }}"> </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <td class="invert" colspan="7" style="text-align: right; border:none"><strong>Tổng tiền: </strong><label style="font-weight:normal" id="total_price">{{ number_format($cart->totalPrice) }} VND</label></td>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="checkout-left" id="cart_bottom">
            <div class="address_form_agile">
                <h4>Nhập thông tin địa chỉ giao hàng</h4>
                @if (Auth::check())
                <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="controls">
                                    <input class="billing-address-name" type="text" name="name" placeholder="Họ và tên"
                                      value="{{ Auth::user()->name }}" disabled  required="">
                                </div>
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left">
                                        <div class="controls">
                                            <input type="text" placeholder="Số điện thoại" name="number" value="{{ Auth::user()->phone }}"  required="">
                                        </div>
                                    </div>
                                    <div class="controls">
                                        <input type="text" placeholder="Email" name="city" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right">
                                        <div class="controls">
                                            <input type="text" placeholder="Số nhà, tên đường, tỉnh/thành phố" name="landmark" required="">
                                        </div>
                                    </div>
                                    <div class="clear"> </div>
                                </div>

                            </div>
                            <button class="submit check_out">Delivery to this Address</button>
                        </div>
                    </div>
                </form>
                @else
                <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="controls">
                                    <input class="billing-address-name" type="text" name="name" placeholder="Họ và tên"
                                        required="">
                                </div>
                                <div class="controls">
                                    <input type="text" placeholder="Email" name="city">
                                </div>
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left">
                                        <div class="controls">
                                            <input type="text" placeholder="Số điện thoại" name="number" required="">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right">
                                        <div class="controls">
                                            <input type="text" placeholder="Số nhà, tên đường, tỉnh/thành phố" name="landmark" required="">
                                        </div>
                                    </div>
                                    <div class="clear"> </div>
                                </div>

                            </div>
                            <button class="submit check_out">Giao hàng đến địa chỉ này</button>
                        </div>
                    </div>
                </form>
                @endif

                <div class="checkout-right-basket">
                    <a href="payment.html">Thanh toán online
                        <span class="fa fa-hand-o-right" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //checkout page -->
@else
<div class="privacy">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Giỏ hàng
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <div class="checkout-right">
            <h4>Giỏ hàng của bạn đang có:
                <span><label id="lbl-quantity-info"> 0 </label> sản phẩm</span>
            </h4>
        </div>
    </div>
    @endif
    @endsection
