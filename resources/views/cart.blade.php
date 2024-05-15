<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Violet | Template</title>

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
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                <img src="/bootstrapred/img/jarlogo.png" alt="" width="160" height="50">
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
      <!-- Page Add Section Begin -->
      <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Cart<span>.</span></h2>
                        <a href="{{route('index')}}">Home</a>
                        <a href="{{route('cart.view')}}">Cart</a>
               
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->
    <!-- Header End -->

 <!-- Page Add Section Begin -->
 <div class="cart-page">
    <div class="container">
        <div class="cart-table">
            <table>
                <thead>
                    @if($cart_items instanceof Countable && count($cart_items) > 0)
                    <tr>
                        <th class="product-h">Product</th>
                        <th>Price</th>
                        <th class="quan">Quantity</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="cart-tbody">
                    @foreach($cart_items as $item)
                    <tr class="cart-item" data-item-id="{{ $item->id }}">
                        <td class="product-col">
                            <img src="{{ $item->product->imageUrl }}" alt="">
                            <div class="p-title">
                                <h5>{{ $item->product->product_name }}</h5>
                            </div>
                        </td>
                        <td class="price-col">{{ $item->price }}</td>
                        <td class="quantity-col">
                            {{ $item->product->quantity }}
                        </td>
                        <td class="product-close"><span class="remove-item">x</span></td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                <p>Your cart is empty.</p>
                @endif
            </table>
        </div>
        <div class="cart-btn">
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                    <div class="site-btn clear-btn">Clear Cart</div>
                    <div class="site-btn update-btn"> Checkout</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add event listener to quantity input and buttons
document.querySelectorAll('.quantity-input, .qtybtn').forEach(element => {
    element.addEventListener('click', function() {
        const quantityInput = this.closest('.pro-qty').querySelector('.quantity-input');
        let quantity = parseInt(quantityInput.value);
        const itemId = this.closest('.cart-item').dataset.itemId;

        // Update the quantity input value
        if (this.classList.contains('inc')) {
            quantity = quantity + 1;
            quantityInput.value = quantity;
            updateCartItem(itemId, quantity);
        } else if (this.classList.contains('dec')) {
            quantity = quantity - 1;
            if (quantity < 1) {
                // Remove the item from the cart
                removeCartItem(itemId);
                return;
            }
            quantityInput.value = quantity;
            updateCartItem(itemId, quantity);
        }
    });
});

// Function to update the cart item
function updateCartItem(itemId, quantity) {
    // Make an AJAX request to update the item quantity on the server
    fetch(`/cart/update/${itemId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        console.log(`Updating item with ID ${itemId} to quantity ${quantity}.`);
        updateCartTotal();
    })
    .catch(error => {
        console.error('Error updating cart item:', error);
    });
}

// Function to remove an item from the cart
function removeCartItem(itemId) {
    // Make an AJAX request to remove the item from the cart on the server
    fetch(`/cart/remove/${itemId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(`Removing item with ID ${itemId} from the cart.`);

        // Remove the corresponding table row
        const cartItem = document.querySelector(`.cart-item[data-item-id="${itemId}"]`);
        cartItem.remove();

        updateCartTotal();
    })
    .catch(error => {
        console.error('Error removing cart item:', error);
    });
}

// Function to update the cart total
function updateCartTotal() {
    // Your implementation to update the cart total
    console.log('Updating the cart total.');
}
</script>
<!-- Cart Page Section End -->

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