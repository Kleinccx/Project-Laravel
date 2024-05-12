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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

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
</head>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
   <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Header Section Begin -->
     <!-- Header Section Begin -->
     <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                <img src="/bootstrapred/img/jarlogo.png" alt="" width="150" height="50">
                </div>
                <div class="header-right">
                    <img src="/bootstrapred/img/icons/search.png" alt="" class="search-trigger">
                    <img src="/bootstrapred/img/icons/man.png" alt="">
                    <a href="#">
                        <img src="img/icons/bag.png" alt="">
                        <span>2</span>
                    </a>
                </div>
                <div class="user-access">
                <a href="{{ route('register') }}">Register /</a>
                          <a href="{{ route('login') }}">Login</a>
             
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                    <li> <a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('category') }}">Shop</a>
                            <ul class="sub-menu">
                            <li><a href="{{ route('shop') }}">Product Page</a></li>
                                <li><a href="{{ route('cart.view') }}">Shopping Cart</a></li>
                                <li><a href="check-out.html">Check out</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="./check-out.html">Blog</a></li>
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
                        <p>Free shipping, Order Now!</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="/bootstrapred/img/icons/voucher.png" alt="">
                        <p>20% Student Discount</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                    <img src="/bootstrapred/img/icons/sales.png" alt="">
                    <p>25% Off on Polo Shirts</p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Info End -->
    <!-- Header End -->

    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2 style="display: inline-block;">Embrace</h2></div>
                    <h3 style="display: inline-block;">Fashion Diversity</h3></div>
                      <!--  <a href="{{ route('index') }}">Home</a> -->
                      <style>
    h2 {
      text-align: center;
      font-size: 24px;
      color: #333;
      background-color: #f9f9f9;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
  </style>
                    </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Categories Page Section Begin -->
    <section class="categories-page spad">
    <div class="container">
        <div class="categories-controls">
            <div class="row">
                <div class="col-lg-12">
                    <div class="categories-filter">
                        <div class="cf-left">
                            <form>
                                <select id="categoryFilter">
                                    <option value="">Sort by</option>
                                    <option value="1">Pants</option>
                                    <option value="2">Shirts</option>
                                    <option value="3">Longsleeves</option>
                                    <option value="4">Poloshirts</option>
                                </select>
                            </form>
                        </div>
                        <div class="cf-right">
                            <span id="productCount"></span>
                            <a href="#"></a>
                            <a href="#" class="active"></a>
                            <a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="productList">
            @foreach($products as $product)
                <div class="col-lg-6 col-md-6 product-item" data-category-id="{{ $product->category_id }}">
                    <div class="single-product-item">
                      <figure>
                        <a href="{{ $product->imageUrl }}" data-lightbox="product-images" data-title="{{ $product->product_name }}">
                            <div class="p-status">{{$product->product_status}}</div>
                            <img src="{{ $product->imageUrl }}" alt="">
                        </a>
                            <div class="hover-icon">
                                <!-- Hover icon content goes here -->
                            </div>
                        </figure>
                        <div class="product-text">
                           <strong><h6>{{ $product->product_name }}</h6></strong> 
                            <h6>{{ $product->description }}</h6>
                            <p>${{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Other head elements -->
<script src="https://cdn.jsdelivr.net/npm/zoomooz/dist/zoomooz.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    lightbox.option({
      'resizeDuration': 200,
      'fadeDuration': 300,
      'wrapAround': true
    });
  });
</script>

<script>
    // Get the category filter select element
    const categoryFilter = document.getElementById('categoryFilter');

    // Get the product list container element
    const productList = document.getElementById('productList');

    // Get the product count element
    const productCount = document.getElementById('productCount');

    // Add event listener for category filter change
    categoryFilter.addEventListener('change', function() {
        // Get the selected category ID
        const selectedCategoryId = categoryFilter.value;

        // Filter and display products based on the selected category ID
        filterProducts(selectedCategoryId);
    });

    // Function to filter and display products based on the category ID
    function filterProducts(categoryId) {
        // Get all product items
        const productItems = productList.getElementsByClassName('product-item');

        // Initialize a counter for the matching products
        let matchingProductCount = 0;

        // Loop through each product item
        for (let i = 0; i < productItems.length; i++) {
            const productItem = productItems[i];

            // Get the category ID of the product item
            const itemCategoryId = productItem.getAttribute('data-category-id');

            // Show/hide the product item based on the category ID
            if (categoryId === '' || itemCategoryId === categoryId) {
                productItem.style.display = 'block';
                matchingProductCount++;
            } else {
                productItem.style.display = 'none';
            }
        }

        // Update the product count
        productCount.textContent = matchingProductCount + ' Product' + (matchingProductCount !== 1 ? 's' : '');
    }
</script>
    <!-- Categories Page Section End -->

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