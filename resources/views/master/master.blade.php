<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('title')</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <base href="{{asset('')}}">
    <script>
        addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
    </script>
    <!--//tags -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--pop-up-box-->
    <link href="assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!--//pop-up-box-->
    <!-- price range -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui1.css">
    <!-- flexslider -->
    <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />
    <!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
    <!-- top-header -->
    <div class="header-most-top">
        <p>Grocery Offer Zone Top Deals & Discounts</p>
    </div>
    <!-- //top-header -->
    <!-- header-bot-->
    <div class="header-bot">
        <div class="header-bot_inner_wthreeinfo_header_mid">
            <!-- header-bot-->
            <div class="col-md-4 logo_agile">
                <h1>
                    <a href="{{ route('index') }}">
                        <span>G</span>rocery
                        <span>S</span>hoppy
                        <img src="assets/images/logo2.png" alt=" ">
                    </a>
                </h1>
            </div>
            <!-- header-bot -->
            <div class="col-md-8 header">
                <!-- header lists -->
                <ul>
                    <li>
                        <a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
                            <span class="fa fa-map-marker" aria-hidden="true"></span> Vị trí</a>
                    </li>
                    <li>
                            <span class="fa fa-truck" aria-hidden="true"></span>Giao hàng
                    </li>
                    <li>
                        <span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678
                    </li>
                    @if(Auth::check())
                    <li>
                        <a href="#">
                            <span class="fa fa-user" aria-hidden="true"></span> {{ Auth::user()->name }} </a>
                    </li>
                    <li>
                        <a href="{{route('log-out')}}">
                            <span class="fa fa-sign-out " aria-hidden="true"></span> Đăng xuất </a>
                    </li>
                    @else
                    <li>
                        <a id="info_user_login" href="#" data-toggle="modal" data-target="#myModal1">
                            <span class="fa fa-unlock-alt" aria-hidden="true"></span> Đăng nhập </a>
                        <a id="info_user_email" style="display: none; color: #000000; font-size: 13px" href="#">
                            <span class="fa fa-user" aria-hidden="true"></span>
                            <p style="color: #000000; font-size: 13px" id="user_email_show"></p>
                        </a>
                    </li>
                    <li>
                        <a id="info_user_signup" href="#" data-toggle="modal" data-target="#myModal2">
                            <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Đăng ký </a>
                        <a id="info_user_logout" style="display: none" href="{{route('log-out')}}">
                            <span class="fa fa-sign-out " aria-hidden="true"></span> Đăng xuất </a>
                    </li>
                    @endif

                </ul>
                <!-- //header lists -->
                <!-- search -->
                <div class="agileits_search">
                    <form action="#" method="post">
                        <input name="Search" type="search" placeholder="Search here..." required="">
                        <button type="submit" class="btn btn-default" aria-label="Left Align">
                            <span class="fa fa-search" aria-hidden="true"> </span>
                        </button>
                    </form>
                </div>
                <!-- //search -->
                <!-- cart details -->
                <div class="top_nav_right">
                    <div class="wthreecartaits wthreecartaits2 cart cart box_1" style="text-align: center;">
                        <button class="w3view-cart" data-toggle="modal" data-target="#modalCart" value="">
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <!-- //cart details -->
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--Model cart-->

    @include('component.cart.popup-cart')

    <!--End model cart-->
    <!-- shop locator (popup) -->
    <!-- Button trigger modal(shop-locator) -->
    <div id="small-dialog1" class="mfp-hide">
        <div class="select-city">
            <h3>Please Select Your Location</h3>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.365133826862!2d106.69243501462137!3d10.859808160619044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529c17978287d%3A0xec48f5a17b7d5741!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBOZ3V54buFbiBU4bqldCBUaMOgbmggLSBDxqEgc-G7nyBxdeG6rW4gMTI!5e0!3m2!1svi!2s!4v1595953510767!5m2!1svi!2s"
                width="600" height="450" frameborder="2" style="border:solid 1px;" allowfullscreen=""
                aria-hidden="false" tabindex="0"></iframe>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //shop locator (popup) -->
    <!-- signin Model -->
    @include('component.account.signin')
    <!-- //signin Model -->
    <!-- signup Model -->
    @include('component.account.signup')
    <!-- //signup Model -->
    <!-- //header-bot -->
    <!-- navigation -->
    @include('component.hf.header')
    <!-- //navigation -->
    <!-- banner -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Big
                            <span>Save</span>
                        </h3>
                        <p>Get flat
                            <span>10%</span> Cashback</p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
            <div class="item item2">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Healthy
                            <span>Saving</span>
                        </h3>
                        <p>Get Upto
                            <span>30%</span> Off</p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
            <div class="item item3">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Big
                            <span>Deal</span>
                        </h3>
                        <p>Get Best Offer Upto
                            <span>20%</span>
                        </p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
            <div class="item item4">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Today
                            <span>Discount</span>
                        </h3>
                        <p>Get Now
                            <span>40%</span> Discount</p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- //banner -->
    <!-- Content -->
    @yield('content')
    <!-- End content -->
    <!-- newsletter -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="col-xs-8 agile-leftmk">
                <h2>Get your Groceries delivered from local stores</h2>
                <p>Free Delivery on your first order!</p>
                <form action="#" method="post">
                    <input type="email" placeholder="E-mail" name="email" required="">
                    <input type="submit" value="Subscribe">
                </form>
                <div class="newsform-w3l">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
            </div>
            <div class="col-xs-4 w3l-rightmk">
                <img src="assets/images/tab3.png" alt=" ">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //newsletter -->
    <!-- footer -->
    @include('component.hf.footer')
    <!-- //footer -->
    <!-- copyright -->
    <div class="copy-right">
        <div class="container">
            <p>© 2017 Grocery Shoppy. All rights reserved | Design by
                <a href="http://w3layouts.com"> W3layouts.</a>
            </p>
        </div>
    </div>
    <!-- //copyright -->

    <!-- js-files -->
    <!-- jquery -->
    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <!-- //jquery -->

    <!-- popup modal (for signin & signup)-->
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script>
        $(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
    </script>
    <!-- Large modal -->
    <!-- <script>
		$('#').modal('show');
	</script> -->
    <!-- //popup modal (for signin & signup)-->


    <!-- script for tabs -->
    <script>
        $(function () {

			var menu_ul = $('.faq > li > ul'),
				menu_a = $('.faq > li > a');

			menu_ul.hide();

			menu_a.click(function (e) {
				e.preventDefault();
				if (!$(this).hasClass('active')) {
					menu_a.removeClass('active');
					menu_ul.filter(':visible').slideUp('normal');
					$(this).addClass('active').next().stop(true, true).slideDown('normal');
				} else {
					$(this).removeClass('active');
					$(this).next().stop(true, true).slideUp('normal');
				}
			});

		});
    </script>
    <!-- script for tabs -->

    <!-- price range (top products) -->
    <script src="assets/js/jquery-ui.js"></script>
    <script>
        //<![CDATA[
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
    </script>
    <!-- //price range (top products) -->
    <!-- imagezoom -->
    <script src="assets/js/imagezoom.js"></script>
    <!-- //imagezoom -->

    <!-- FlexSlider -->
    <script src="assets/js/jquery.flexslider.js"></script>
    <script>
        // Can also be used with $(document).ready()
	$(window).load(function () {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
    </script>
    <!-- //FlexSlider-->
    <!-- flexisel (for special offers) -->
    <script src="assets/js/jquery.flexisel.js"></script>
    <script>
        $(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
    </script>
    <!-- //flexisel (for special offers) -->
    <!--quantity-->
    <script src="assets/js/quantityCart.js"></script>

    <!--//quantity-->
    <!-- password-script -->
    <script>
        window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
    </script>
    <!-- //password-script -->

    <!-- smoothscroll -->
    <script src="assets/js/SmoothScroll.min.js"></script>
    <!-- //smoothscroll -->

    <!-- start-smooth-scrolling -->
    <script src="assets/js/move-top.js"></script>
    <script src="assets/js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
    </script>
    <!-- //end-smooth-scrolling -->

    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
    </script>
    <!-- //smooth-scrolling-of-move-up -->

    <!-- for bootstrap working -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- //js-files -->
    <!--form submit-->
    <script src="assets/js/component/form.js"></script>
    <!--End Form-->


</body>

</html>
