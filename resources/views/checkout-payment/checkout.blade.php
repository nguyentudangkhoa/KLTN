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
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Checkout
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <h4>Your shopping cart contains:
                <span>{{ $cart->totalQty }} Products</span>
            </h4>
            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>

                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody><input type="hidden" name="" value="{{ $i=1 }}">
                        @foreach($product_cart as $product)
                        <tr class="rem1">
                            <td class="invert">{{ $i++ }}</td>
                            <td class="invert-image">
                                <a href="single2.html">
                                    <img src="assets/images/{{$product['item']['images']}}" alt=" " class="img-responsive">
                                </a>
                            </td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div class="entry value-minus btn-minus" data-token={{ csrf_token() }} data-id={{  $product['item']['id']  }}>&nbsp;</div>
                                        <div class="entry value" id="quantity{{ $product['item']['id'] }}">
                                            <span >{{$product['qty']}}</span>
                                        </div>
                                        <div class="entry value-plus active btn-">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="invert">{{ $product['item']['name'] }}</td>
                            @if($product['item']['promotion_price'] == null)
                            <td class="invert">{{ number_format($product['item']['price']) }} VND</td>
                            @else
                            <td class="invert">{{ number_format($product['item']['promotion_price']) }} VND</td>
                            @endif
                            <td class="invert">
                                <div class="rem">
                                    <div class="close1"> </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="checkout-left">
            <div class="address_form_agile">
                <h4>Add a new Details</h4>
                <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="controls">
                                    <input class="billing-address-name" type="text" name="name" placeholder="Full Name"
                                        required="">
                                </div>
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left">
                                        <div class="controls">
                                            <input type="text" placeholder="Mobile Number" name="number" required="">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right">
                                        <div class="controls">
                                            <input type="text" placeholder="Landmark" name="landmark" required="">
                                        </div>
                                    </div>
                                    <div class="clear"> </div>
                                </div>
                                <div class="controls">
                                    <input type="text" placeholder="Town/City" name="city" required="">
                                </div>
                                <div class="controls">
                                    <select class="option-w3ls">
                                        <option>Select Address type</option>
                                        <option>Office</option>
                                        <option>Home</option>
                                        <option>Commercial</option>

                                    </select>
                                </div>
                            </div>
                            <button class="submit check_out">Delivery to this Address</button>
                        </div>
                    </div>
                </form>
                <div class="checkout-right-basket">
                    <a href="payment.html">Make a Payment
                        <span class="fa fa-hand-o-right" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //checkout page -->
@endsection
