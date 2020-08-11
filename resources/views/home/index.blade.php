@extends('master.master')
@section('title')
Grocery Shoppy an Ecommerce Categoryme|Home
@endsection
@section('content')
<!-- top Products -->
<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Sản phẩm bán chạy
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
        <div class="agileinfo-ads-display col-md-9">
            <div class="wrapper">
                <!-- first section (nuts) -->
                <div class="product-sec1">
                    <h3 class="heading-tittle">Các loại hạt</h3>
                    @if ($product_nuts->count() == 0)
                    <div class="col-md-4 product-men">
                        Không có sản phẩm nào
                    </div>
                    @else
                    @foreach($product_nuts as $nut)
                    <div class="col-md-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="assets/images/{{ $nut->images }}" style="width:126px;height:150px" alt="">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{ route('product_details','product_name='.$nut->name) }}"
                                            class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                @if(((strtotime(date("Y-m-d"))-strtotime($nut->created_at))/(60*60*24))<=3) <span
                                    class="product-new-top">New</span>
                                    @endif
                            </div>
                            <div class="item-info-product ">
                                <h4>
                                    <a
                                        href="{{ route('product_details','product_name='.$nut->name) }}">{{ strlen($nut->name) > 18 ? (substr($nut->name, 0, 17) . '...') : $nut->name  }}</a>
                                </h4>
                                <div class="info-product-price">

                                    @if($nut->promotion_price > 0 && $nut->status == 1 &&
                                    strtotime($nut->end_at) > strtotime(date("Y-m-d")))
                                    <span class="item_price"
                                        id="price{{ $nut->id }}">{{number_format($nut->promotion_price)}}
                                        VND</span>
                                    <del id="discount{{ $nut->id }}">{{ number_format($nut->price) }}</del>
                                    @else
                                    <span class="item_price" id="price{{ $nut->id }}">{{ number_format($nut->price) }}
                                        VND</span>
                                    <del id="discount{{ $nut->id }}"></del>
                                    @endif

                                </div>
                                <div
                                    class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form class="submit_form_product" data-id="{{ $nut->id }}">
                                        @csrf
                                        <input type="submit" name="submit" value="Add to cart" class="button" />
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="clearfix"></div>
                </div>
                <!-- //first section (nuts) -->
                <!-- second section (nuts special) -->
                <div class="product-sec1 product-sec2">
                    <div class="col-xs-7 effect-bg">
                        <h3 class="">Pure Energy</h3>
                        <h6>Enjoy our all healthy Products</h6>
                        <p>Get Extra 10% Off</p>
                    </div>
                    <h3 class="w3l-nut-middle">Nuts & Dry Fruits</h3>
                    <div class="col-xs-5 bg-right-nut">
                        <img src="assets/images/nut1.png" alt="">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- //second section (nuts special) -->
                <!-- third section (oils) -->
                <div class="product-sec1">
                    <h3 class="heading-tittle">Dầu ăn</h3>
                    @if ($product_nuts->count() == 0)
                    <div class="col-md-4 product-men">
                        Không có sản phẩm nào
                    </div>
                    @else
                    @foreach($product_oils as $oil)
                    <div class="col-md-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="assets/images/{{ $oil->images }}" style="width:126px;height:150px" alt="">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{ route('product_details','product_name='.$oil->name) }}"
                                            class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                @if(((strtotime(date("Y-m-d"))-strtotime($oil->created_at))/(60*60*24))<=3) <span
                                    class="product-new-top">New</span>
                                    @endif
                            </div>
                            <div class="item-info-product ">
                                <h4>
                                    <a
                                        href="{{ route('product_details','product_name='.$oil->name) }}">{{ strlen($oil->name) > 18 ? (substr($oil->name, 0, 17) . '...') : $oil->name  }}</a>
                                </h4>
                                <div class="info-product-price">
                                    @if($oil->promotion_price > 0 && $oil->status == 1 &&
                                    strtotime($oil->end_at) > strtotime(date("Y-m-d")))
                                    <span class="item_price"
                                        id="price{{ $oil->id }}">{{number_format($oil->promotion_price)}}
                                        VND</span>
                                    <del id="discount{{ $oil->id }}">{{ number_format($oil->price) }}</del>
                                    @else
                                    <span class="item_price" id="price{{ $oil->id }}">{{ number_format($nut->price) }}
                                        VND</span>
                                    <del id="discount{{ $oil->id }}"></del>
                                    @endif

                                </div>
                                <div
                                    class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form data-id="{{ $oil->id }}" class="submit_form_product">
                                        @csrf
                                        <input type="submit" name="submit" value="Add to cart" class="button" />
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="clearfix"></div>
                </div>
                <!-- //third section (oils) -->
                <!-- fourth section (noodles) -->
                <div class="product-sec1">
                    <h3 class="heading-tittle">Mì, Pasta</h3>
                    @if ($product_nuts->count() == 0)
                    <div class="col-md-4 product-men">
                        Không có sản phẩm nào
                    </div>
                    @else
                    @foreach($product_noodles as $noodle)
                    <div class="col-md-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="assets/images/{{ $noodle->images }}" style="width:126px;height:150px" alt="">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{ route('product_details','product_name='.$noodle->name) }}"
                                            class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                @if(((strtotime(date("Y-m-d"))-strtotime($noodle->created_at))/(60*60*24))<=3) <span
                                    class="product-new-top">New</span>
                                    @endif
                            </div>
                            <div class="item-info-product ">
                                <h4>
                                    <a
                                        href="{{ route('product_details','product_name='.$noodle->name) }}">{{strlen($noodle->name) > 18 ? (substr($noodle->name, 0, 17) . '...') : $noodle->name }}</a>
                                </h4>
                                <div class="info-product-price">
                                    @if($noodle->promotion_price > 0 && $noodle->status == 1 &&
                                    strtotime($noodle->end_at) > strtotime(date("Y-m-d")))
                                    <span class="item_price"
                                        id="price{{ $noodle->id }}">{{number_format($noodle->promotion_price)}}
                                        VND</span>
                                    <del id="discount{{ $noodle->id }}">{{ number_format($noodle->price) }}</del>
                                    @else
                                    <span class="item_price"
                                        id="price{{ $noodle->id }}">{{ number_format($noodle->price) }} VND</span>
                                    <del id="discount{{ $noodle->id }}"></del>
                                    @endif

                                </div>
                                <div
                                    class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form data-id="{{ $noodle->id }}" class="submit_form_product">
                                        @csrf
                                        <input type="submit" name="submit" value="Add to cart" class="button" />
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="clearfix"></div>
                </div>
                <!-- //fourth section (noodles) -->
            </div>
        </div>
        <!-- //product right -->
    </div>
</div>
<!-- //top products -->
<!-- special offers -->
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
                @foreach($product_discounts as $discount)
                @if($discount->promotion_price > 0 && $discount->status == 1 &&
                strtotime($discount->end_at) > strtotime(date("Y-m-d"))))
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
                                <span class="item_price"
                                    id="price{{ $discount->id }}">{{number_format($discount->promotion_price)}}
                                    VND</span>
                                <p> Save {{ number_format($discount->Product->price - $discount->promotion_price)}} VND
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- //special offers -->

@endsection
