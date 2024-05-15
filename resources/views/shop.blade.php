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
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                <a href="./index.html">
                    <img src="/bootstrapred/img/jarlogo.png" alt="" width="150" height="50">
                    </a>
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
                    <a href="#">Register</a>
                    <a href="#" class="in">Sign in</a>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                    <li> <a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('shop') }}">Shop</a>
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
                        <p>Free shipping on orders over $30 in USA</p>
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
                    <p>30% off on dresses. Use code: 30OFF</p>
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
                        <h2>Enjoy Shopping<span>.</span></h2>
                        <a href="{{route('index')}}">Home</a>
                        <a href="{{route('category')}}">Categories</a>
                        <a class="active" href="{{route('about')}}">About</a>
                    </div>
                </div>
                <div class="col-lg-8">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Product Page Section Beign -->
   
    <!-- Product Page Section End -->

    <!-- Related Product Section Begin -->
   <!-- Related Product Section Begin -->
<section class="related-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>All Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-sm-6">
                <div class="single-product-item">
                    <figure>
                        <form action="{{ route('addToCart', ['id' => $product->id]) }}" method="POST" class="add-to-cart-form">
                            @csrf
                            <button type="submit" class="add-to-cart-btn" data-product-id="{{ $product->id }}">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </form>
                        <img src="{{ $product->imageUrl }}" alt="">
                        <div class="p-status">{{ $product->product_status }}</div>
                    </figure>
                    <div class="product-text">
                        <h6>{{ $product->product_name }}</h6>
                        <p>${{ $product->price }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->

<script>
 addToCartForms.forEach(form => {
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the default form submission
        console.log('Form submitted');

        const productId = event.target.querySelector('.add-to-cart-btn').dataset.productId;
        console.log('Product ID:', productId);

        // Make a POST request to the cart/add/{id} route
        fetch(`/cart/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            console.log(data);
            if (data.success) {
                // Display the success modal
                const modal = document.createElement('div');
                modal.classList.add('modal', 'fade');
                modal.setAttribute('id', 'successModal');
                modal.setAttribute('tabindex', '-1');
                modal.setAttribute('role', 'dialog');
                modal.setAttribute('aria-labelledby', 'successModalLabel');
                modal.setAttribute('aria-hidden', 'true');

                const modalDialog = document.createElement('div');
                modalDialog.classList.add('modal-dialog', 'modal-dialog-centered');

                const modalContent = document.createElement('div');
                modalContent.classList.add('modal-content');

                const modalHeader = document.createElement('div');
                modalHeader.classList.add('modal-header');

                const modalTitle = document.createElement('h5');
                modalTitle.classList.add('modal-title');
                modalTitle.setAttribute('id', 'successModalLabel');
                modalTitle.textContent = 'Success!';

                const closeButton = document.createElement('button');
                closeButton.classList.add('close');
                closeButton.setAttribute('type', 'button');
                closeButton.setAttribute('data-dismiss', 'modal');
                closeButton.setAttribute('aria-label', 'Close');
                closeButton.innerHTML = '<span aria-hidden="true">&times;</span>';

                const modalBody = document.createElement('div');
                modalBody.classList.add('modal-body');
                modalBody.textContent = 'Product added to cart successfully!';

                modalHeader.appendChild(modalTitle);
                modalHeader.appendChild(closeButton);
                modalContent.appendChild(modalHeader);
                modalContent.appendChild(modalBody);
                modalDialog.appendChild(modalContent);
                modal.appendChild(modalDialog);

                document.body.appendChild(modal);

                // Show the modal
                $('#successModal').modal('show');
            }
        })
        .catch(error => {
            // Handle any errors
            console.error(error);
        });
    });
});
</script>

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


    <!-- CCS -->
    <style>
        .single-product-item {
            position: relative;
        }

        .add-to-cart-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            font-size: 14px;
            color: #333;
            text-decoration: none;
        }

        .add-to-cart-btn i {
            margin-right: 5px;
        }
    </style>

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