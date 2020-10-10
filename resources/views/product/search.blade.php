@extends('master.master')
@section('title')
Product
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
                <li>Kết quả tìm kiếm</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- top Products -->
<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Kết quả tìm kiếm
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <!-- product left -->
        <div class="side-bar col-md-3">
            @include('component.sidesearch.search')

        </div>
        <!-- //product left -->
        <!-- product right -->
        <div class="agileinfo-ads-display col-md-9 w3l-rightpro">
            <div class="wrapper">
                <!-- first section -->
                <div class="product-sec1">
                    @if($product_arrays->count()==0)
                    <h1>Chưa có sản phẩm thuộc loại này </h1>
                    @else
                    @foreach($product_arrays as $product)
                    <div class="col-xs-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem" style="margin-bottom:30px">
                            <div class="men-thumb-item">
                                <img src="assets/images/{{ $product->images }}" style="width:126px;height:150px" alt="">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{ route('product_details','product_name='.$product->name) }}"
                                            class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                @if(((strtotime(date("Y-m-d"))-strtotime($product->created_at))/(60*60*24))<=3) <span
                                    class="product-new-top">New</span>
                                    @endif
                            </div>
                            <div class="item-info-product ">
                                <h4>
                                    <a
                                        href="{{ route('product_details','product_name='.$product->name) }}">{{strlen( $product->name) > 20 ? (substr( $product->name, 0, 18) . '...') :  $product->name }}</a>
                                </h4>
                                <div class="info-product-price">
                                    @if($product->promotion_price > 0 && $product->status == 1 &&
                                    strtotime($product->end_at) > strtotime(date("Y-m-d")))
                                    <span class="item_price"
                                        id="price{{ $product->id }}">{{number_format($product->promotion_price)}}
                                        VND</span>
                                    <del id="discount{{ $product->id }}">{{ number_format($product->price) }}</del>
                                    @else
                                    <span class="item_price"
                                        id="price{{ $product->id }}">{{ number_format($product->price) }} VND</span>
                                    <del id="discount{{ $product->id }}"></del>
                                    @endif
                                </div>
                                <div
                                    class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form data-id="{{ $product->id }}" class="submit_form_product">
                                        @csrf
                                        <input type="submit" name="submit" value="Thêm vào giỏ hàng"
                                            class="btn_product_cart button" />
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="row">{{$product_arrays->links()}}</div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- //product right -->
    </div>
</div>
<!-- //top products -->
<!-- special offers -->
@foreach($product_discounts as $discount)
@if($discount->promotion_price > 0 && $discount->status == 1 && strtotime($discount->end_at) >
strtotime(date("Y-m-d")))
<div class="featured-section" id="projects">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Sản phẩm giảm giá
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="content-bottom-in">
            <ul id="flexiselDemo1">

                <li>
                    <div class="w3l-specilamk">
                        <div class="speioffer-agile">
                            <a href="{{ route('product_details','product_name='.$discount->Product->name) }}">
                                <img src="assets/images/{{ $discount->Product->images }}"
                                    style="width:126px;height:150px" alt="">
                            </a>
                        </div>
                        <div class="product-name-w3l">
                            <h4>
                                <a href="{{ route('product_details','product_name='.$discount->Product->name) }}">{{strlen($discount->Product->name) > 18 ? (substr($discount->Product->name, 0, 17) . '...') : $discount->Product->name  }}
                                </a>
                            </h4>
                            <div class="w3l-pricehkj">
                                <h6 id="price{{ $discount->Product->id }}">
                                    {{ number_format($discount->promotion_price) }} VND</h6>
                                <p> Save {{ number_format($discount->Product->price - $discount->promotion_price)}} VND
                                </p>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
@endif
@endforeach
<!-- //special offers -->
@endsection
