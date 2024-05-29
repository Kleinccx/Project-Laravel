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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/bootstrapred/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/bootstrapred/css/style.css" type="text/css">
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
                        <p>₱{{ $product->price }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->
<script>
       document.addEventListener('DOMContentLoaded', function() {
       var addToCartForms = document.querySelectorAll('.add-to-cart-form');

            addToCartForms.forEach(function(form) {
                form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = new FormData(this);
                var productId = this.querySelector('.add-to-cart-btn').dataset.productId;

                fetch('{{ route("addToCart", ["id" => ":id"]) }}'.replace(':id', productId), {
                    method: 'POST',
                    body: formData,
                    headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(function(response) {
                    if (response.ok) {
                    showSuccessAnimation('Product added to cart successfully!');
                    } else {
                    showErrorAnimation('There was an error adding the product to the cart.');
                    }
                })
                .catch(function(error) {
                    showErrorAnimation('An error occurred. Please try again later.');
                });
                });
            });

            function showSuccessAnimation(message) {
                var successContainer = document.createElement('div');
                successContainer.classList.add('success-animation-container');

                var checkmarkContainer = document.createElement('div');
                checkmarkContainer.classList.add('checkmark-container');

                var checkmark = document.createElement('div');
                checkmark.classList.add('checkmark');

                var messageElement = document.createElement('p');
                messageElement.textContent = message;

                checkmarkContainer.appendChild(checkmark);
                successContainer.appendChild(checkmarkContainer);
                successContainer.appendChild(messageElement);
                document.body.appendChild(successContainer);

                // Add the 'animate' class after a short delay to start the animation
                setTimeout(function() {
                checkmarkContainer.classList.add('animate');
                }, 100);

                // Remove the success animation container after 3 seconds
                setTimeout(function() {
                document.body.removeChild(successContainer);
                }, 3000);
            }

            function showErrorAnimation(message) {
                // You can implement a similar error animation if needed
            }
            });
            </script>
        <style>
        .success-animation-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffffff;
        color: #4CAF50;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        z-index: 9999;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        }

        .checkmark-container {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: #4CAF50;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
        }

        .checkmark {
        width: 36px;
        height: 36px;
        border-right: 4px solid #ffffff;
        border-bottom: 4px solid #ffffff;
        transform: rotate(45deg);
        opacity: 0;
        }

        .checkmark-container.animate .checkmark {
        animation: checkmarkAnimation 0.5s ease-in-out forwards;
        }

        @keyframes checkmarkAnimation {
        0% {
            opacity: 0;
            transform: rotate(45deg) scale(0.5);
        }
        100% {
            opacity: 1;
            transform: rotate(45deg) scale(1);
        }
        }
            </style>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
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