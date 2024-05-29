  <!--@include('templates.header')

    <x-navbar />

    <h2> All Products </h2>
    <a href ="/add-product" class="btn-btn-primary mb-3"> Add Product </a>
    <x-products :products="$products"/>
    <h2> All Users </h2>z
    <x-users :users="$users"/>

    @include('templates.footer') -->
    <!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jarred's Style Haven</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/bootstrapred/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/style.css" type="text/css">
    <head>
  <!-- Other head elements -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <header class="header-section">
    <div class="container-fluid">
        <div class="inner-header">
            <div class="logo">
                <img src="/bootstrapred/img/jarlogo.png" alt="" width="160" height="50">
            </div>
            <div class="header-right">
                @if (auth()->check())
                <span>{{ auth()->user()->name }}</span>
                    <a href="{{ route('profile') }}">
                        <img src="/bootstrapred/img/icons/man.png" alt="">
                    </a>

                    <a href="{{ route('cart.view') }}">
            <li><i class="fa fa-shopping-bag" style="color: black;"></i></span> </li>
                    </a> 
            <a class="nav-link" href="{{ route('orders') }}">
         <i class="fas fa-receipt" style="color: black;"></i>
            </a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline" id="logoutForm">
    @csrf
    <button type="button" class="btn btn-link p-0" style="color: black;" onclick="logout()">
        <i class="fas fa-sign-out-alt"></i>
    </button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function logout() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out of the application.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log me out!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Destroy the session
                document.getElementById('logoutForm').submit();
            }
        });
    }
</script>
        </button>
                @else
                @guest
                    <div class="user-access">
                        <a href="{{ route('register') }}">Register /</a>
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                    @endguest
                @endif
            </div>
            <nav class="main-menu mobile-menu">
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>
                        <a href="{{ route('category') }}">Shop</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('shop') }}">Product Page</a></li>
                            <li><a href="{{ route('cart.view') }}">Shopping Cart</a></li>
                            <li><a href="{{route('orders') }}">Order History</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="./contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
    <!-- Header Info Begin -->
    <div class="header-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-item">
                        <img src="/bootstrapred/img/icons/delivery.png" alt="">
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="/bootstrapred/img/icons/voucher.png" alt="">
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                    <img src="/bootstrapred/img/icons/sales.png" alt="">
                    <p></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Info End -->
    <!-- Header End -->
    <!-- Hero Slider Begin -->
    <section class="hero-slider">
        <div class="hero-items owl-carousel">
             <div class="single-slider-item set-bg" data-setbg="/bootstrapred/img/slider-1.jpg">
           
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>2024</h1>
                            <h2>Lookbook</h2>
                            <a href="{{route('category')}}" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-item set-bg" data-setbg="/bootstrapred/img/slider-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>2024</h1>
                            <h2>Lookbook</h2>
                            <a href="#" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-item set-bg" data-setbg="/bootstrapred/img/slider-3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>2019</h1>
                            <h2>Lookbook.</h2>
                            <a href="#" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Slider End -->

    <!-- Features Section Begin -->
    <section class="features-section spad">
        <div class="features-ads">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-features-ads first">
                            <img src="/bootstrapred/img/icons/f-delivery.png" alt="">
                            <h4>Free shipping</h4>
                            <p>Free shipping only within the phillipines </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-features-ads second">
                            <img src="/bootstrapred/img/icons/coin.png" alt="">
                            <h4>100% Money back </h4>
                            <p>Receive a refund if the product appears to be damaged.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-features-ads">
                            <img src="/bootstrapred/img/icons/chat.png" alt="">
                            <h4>Online support 24/7</h4>
                            <p>We cater customers and orders anytime</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features Box -->
        <div class="features-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-box-item first-box">
                                    <img src="/bootstrapred/img/f-box-1.jpg" alt="">
                                    <div class="box-text">
                                        <span class="trend-year">2024 Party</span>
                                        <h2>Pants</h2>
                                        <span class="trend-alert">Trend Alert</span>
                                        <a href="#" class="primary-btn">See More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single-box-item second-box">
                                    <img src="/bootstrapred/img/f-box-2.jpg" alt=""> 
                                    <div class="box-text">
                                        <span class="trend-year">2024 Trend</span>
                                        <h2>Footwear</h2>
                                        <span class="trend-alert">Bold & Black</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-box-item large-box">
                            <img src="/bootstrapred/img/f-box-3.jpg" alt="">
                            <div class="box-text">
                                <span class="trend-year">2024 Party</span>
                                <h2>Collection</h2>
                                <div class="trend-alert">Trend Allert</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->
<
    </section>
    <!-- Latest Product End -->

    <!-- Lookbok Section Begin -->
    <section class="lookbok-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 offset-lg-1">
                    <div class="lookbok-left">
                        <div class="section-title">
                            <h2>2024 <br />#lookbook</h2>
                        </div>
                        <p>Welcome to our online shop, where you'll find a wide range of stylish and comfortable apparel to enhance your wardrobe. Explore our collection of t-shirts, polo shirts, long-sleeve tops, and pants, meticulously designed to meet your fashion needs. Whether you're looking for a casual and trendy t-shirt for everyday wear, a versatile polo shirt for a smart-casual look, a cozy long-sleeve top for cooler days, or a pair of fashionable pants to complete your outfit – we have you covered. Our garments are crafted with the utmost care, using high-quality materials to ensure both durability and comfort. With our diverse selection, you can effortlessly express your personal style and create fashionable outfits for any occasion. Shop with confidence, knowing that we prioritize your satisfaction and strive to deliver exceptional products that exceed your expectations. Upgrade your wardrobe today and embrace a new level of style and sophistication with our premium t-shirts, polo shirts, long-sleeve tops, and pants.</p>
                        <a href="{{route" class="primary-btn look-btn">See More</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="lookbok-pic">
                        <img src="/bootstrapred/img/lookbok.jpg" alt="">
                        <div class="pic-text">fashion</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Lookbok Section End -->

    <!-- Logo Section Begin -->
    <div class="logo-section spad">
        <div class="logo-items owl-carousel">
            <div class="logo-item">
                <img src="/bootstrapred/img/logos/logo-1.png" alt="">
            </div>
            <div class="logo-item">
                <img src="/bootstrapred/img/logos/logo-2.png" alt="">
            </div>
            <div class="logo-item">
                <img src="/bootstrapred/img/logos/logo-3.png" alt="">
            </div>
            <div class="logo-item">
                <img src="/bootstrapred/img/logos/logo-4.png" alt="">
            </div>
            <div class="logo-item">
                <img src="/bootstrapred/img/logos/logo-5.png" alt="">
            </div>
        </div>
    </div>
    <!-- Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section spad">
        <div class="container">
            <div class="newslatter-form">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#">
                            <input type="text" placeholder="Your email address">
                            <button type="submit">Subscribe to our newsletter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-widget">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>About us</h4>
                            <ul>
                                <li>About Us</li>
                                <li>Community</li>
                                <li>Jobs</li>
                                <li>Shipping</li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Customer Care</h4>
                            <ul>
                                <li>Search</li>
                                <li>Privacy Policy</li>
                                <li>2019 Lookbook</li>
                                <li>Shipping & Delivery</li>
                                <li>Gallery</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Our Services</h4>
                            <ul>
                                <li>Free Shipping</li>
                                <li>Free Returnes</li>
                                <li>Our Franchising</li>
                                <li>Terms and conditions</li>
                                <li>Privacy Policy</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Information</h4>
                            <ul>
                                <li>Payment methods</li>
                                <li>Times and shipping costs</li>
                                <li>Product Returns</li>
                                <li>Shipping methods</li>
                                <li>Conformity of the products</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>
			</div>

<div class="container text-center pt-5">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>


		</div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    
    <script src="/bootstrapred/js/jquery-3.3.1.min.js"></script>
    <script src="/bootstrapred/js/bootstrap.min.js"></script>
    <script src="/bootstrapred/js/jquery.magnific-popup.min.js"></script>
    <script src="/bootstrapred/js/jquery.slicknav.js"></script>
    <script src="/bootstrapred/js/owl.carousel.min.js"></script>
    <script src="/bootstrapred/js/jquery.nice-select.min.js"></script>
    <script src="/bootstrapred/js/mixitup.min.js"></script>
    <script src="/bootstrapred/js/main.js"></script>
</body>

</html>