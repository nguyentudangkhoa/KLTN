@extends('master.master')
@section('title')
Single
@endsection
@section('content')
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="{{ route('index') }}">Home</a>
                    <i>|</i>
                </li>
                <li>
                    {{ $product->Product_Type->Group_Type->name }}
                    <i>|</i>
                </li>
                <li>{{ $product->name }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- Single Page -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Chi tiết sản phẩm
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="col-md-5 single-right-left ">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="assets/images/{{ $product->images }}">
                            <div class="thumb-image">
                                <img src="assets/images/{{ $product->images }}" data-imagezoom="true"
                                    class="img-responsive" alt=""> </div>
                        </li>
                        @foreach($images as $image)
                        <li data-thumb="assets/images/{{ $image->images }}">
                            <div class="thumb-image">
                                <img src="assets/images/{{ $image->images }}" data-imagezoom="true" class="img-responsive" alt="">
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h3>{{ $product->name }}</h3>
            <div class="rating1">
                <span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" checked="">
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>
            </div>
            <p>
                @if($product->promotion_price > 0 && $product->status == 1 && strtotime($product->end_at) > strtotime(date("Y-m-d")))
                <span class="item_price"  id="price{{ $product->id }}">{{ number_format($product->promotion_price) }} VND</span>
                <del>{{ number_format($product->price) }}</del>
                @else
                <span class="item_price"  id="price{{ $product->id }}">{{ number_format($product->price) }}VND</span>
                <del></del>
                @endif
                <label>Free delivery</label>
            </p>
            <p>

            </p>
            <div class="single-infoagile">
                <ul>
                    <li><strong>Số lượng:</strong>
                        @if($product->quantity > 0)
                        {{ $product->quantity." ".$product->Unit->name }}
                        @else
                        <p style="color: #e0243e">Hết hàng</p>
                        @endif
                    </li>
                    <li>
                        Có thể thanh toán khi nhận hàng
                    </li>
                    <li>
                        Thời gian giao hàng nhanh chóng
                    </li>
                    <li>
                        Sản phẩm này được đánh giá (3.6 out of 5 | 8 ratings).
                    </li>
                    @if($product->promotion_price > 0 && $product->status == 1 && strtotime($product->end_at) > strtotime(date("Y-m-d")))
                    <li>
                        Mua trước ngày {{ $product->end_at }} để có giá :
                        <span class="item_price">{{ number_format($product->promotion_price) }} VND</span>
                    </li>
                    @endif

                </ul>
            </div>
            <div class="product-single-w3l">
                <p>
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>Sản phẩm theo mục
                    <label>{{ $product->Product_Type->name }}</label></p>
                <ul>
                    <li>
                        Best for Biryani and Pulao.
                    </li>
                    <li>
                        After cooking, Zeeba Basmati rice grains attain an extra ordinary length of upto 2.4 cm/~1 inch.
                    </li>
                    <li>
                        Zeeba Basmati rice adheres to the highest food afety standards as your health is paramount to
                        us.
                    </li>
                    <li>
                        Contains only the best and purest grade of basmati rice grain of Export quality.
                    </li>
                </ul>
                <p>
                    <i class="fa fa-refresh" aria-hidden="true"></i>Tất cả {{ $product->Product_Type->Group_Type->name }}
                    <label>Có thể đổi trả trong ngày</label>
                </p>
            </div>
            <div class="occasion-cart">
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                    <form data-id="{{ $product->id }}" class="submit_form_product">
                        <input type="submit" name="submit" value="Add to cart" class="button" />
                    </form>
                </div>

            </div>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //Single Page -->
<!-- special offers -->
<div class="featured-section" id="projects">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Sản phẩm cùng loại
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="content-bottom-in">
            <ul id="flexiselDemo1">
                @foreach($same_type_products as $type_product)
                <li>
                    <div class="w3l-specilamk">
                        <div class="speioffer-agile">
                            <a href="{{ route('product_details','product_name='.$type_product->name) }}">
                                <img src="assets/images/{{ $type_product->images }}" style="width:126px;height:150px" alt="">
                            </a>
                        </div>
                        <div class="product-name-w3l">
                            <h4>
                                <a
                                    href="{{ route('product_details','product_name='.$type_product->name) }}">{{ $type_product->name }}</a>
                            </h4>
                            <div class="w3l-pricehkj">
                                @if($type_product->promotion_price > 0 || $type_product->status == 1 || strtotime($type_product->end_at) > strtotime(date("Y-m-d")))
                                <h6 id="price{{ $type_product->id }}">{{ number_format($type_product->promotion_price) }} VND</h6>
                                <p>Save{{ number_format($type_product->price-$type_product->promotion_price) }} VND</p>
                                @else
                                <h6 id="price{{ $type_product->id }}">{{ number_format($type_product->price) }} VND</h6>
                                <p>Save 0 VND</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- //special offers -->
@endsection
