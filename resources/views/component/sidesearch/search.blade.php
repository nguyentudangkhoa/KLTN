<div class="search-hotel">
    <h3 class="agileits-sear-head">Tìm kiếm ở đây</h3>
    <form action="{{ route('search-product') }}" method="get">
        <input type="search" placeholder="Tên sản phẩm" name="search" required="">
        <input type="submit" value=" ">
    </form>
</div>
<!-- price range -->
<!-- //price range -->
<!-- food preference -->
<div class="left-side">
    <h3 class="agileits-sear-head">Tìm theo giá</h3>
    <div class="styled-input">
        <ul>
            <li><a href="{{ route('product-price',1) }}">Từ 0 VND đến 10,000 VND</a></li>
            <li><a href="{{ route('product-price',2) }}">Từ 11,000 VND đến 20,000 VND</a></li>
            <li><a href="{{ route('product-price',3) }}">Từ 21,000 VND đến 30,000 VND</a></li>
            <li><a href="{{ route('product-price',4) }}">Từ 31,000 VND đến 50,000 VND</a></li>
            <li><a href="{{ route('product-price',5) }}">Lớn hơn 51,000 VND</a></li>
        </ul>
        <p id="txt_user_cof_gender" style="display:none; color:#FF3333"></p>
    </div>
</div>
<!-- //food preference -->

