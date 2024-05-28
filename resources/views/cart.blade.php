<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Violet | Template</title>

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
</head>

<body>
@yield('content')
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
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
        <button type="button" class="btn btn-link p-0" style="color: black;" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt"></i>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                        <th>Action</th>
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
                            <span class="quantity-control quantity-minus">-</span>
                            <span class="quantity-value">{{ $item->quantity }}</span>
                            <span class="quantity-control quantity-plus">+</span>
                            <div class="quantity-error"></div>
                        </td>
                        <td class="product-close">
    <span class="remove-item" onclick="deleteCartItem({{ $item->id }}, this)">Delete</span>
</td>

                        
                        
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
                <div class="col-lg-6"></div>
                <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                    <div class="site-btn clear-btn">Clear Cart</div>
                    <a href="{{ route('checkout') }}" class="site-btn update-btn">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Your HTML structure remains unchanged -->

<style>
.quantity-control {
    display: inline-block;
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
    margin: 0 5px;
    color: #333;
}
.quantity-control:hover {
    color: #000;
}
.quantity-value {
    font-size: 16px;
    margin: 0 10px;
}
.quantity-error {
    color: red;
    display: none;
}
</style>

<script>
function deleteCartItem(id, quantityCol) {
    var confirmation = confirm("Are you sure you want to delete this product?");
    if (confirmation) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: '/cart/deleteItem',
                type: 'POST',
                data: { id: id },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        quantityCol.closest('.cart-item').remove();
                        resolve(true);
                    } else {
                        alert('An error occurred while deleting the item.');
                        reject();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting item:', error);
                    alert('An error occurred while deleting the item.');
                    reject();
                }
            });
        });
    }
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var quantityMinusControls = document.querySelectorAll('.quantity-minus');
    var quantityPlusControls = document.querySelectorAll('.quantity-plus');

    quantityMinusControls.forEach(function(control) {
        control.addEventListener('click', function() {
            updateQuantity(this, -1);
        });
    });

    quantityPlusControls.forEach(function(control) {
        control.addEventListener('click', function() {
            updateQuantity(this, 1);
        });
    });

    function updateQuantity(control, change) {
        var quantityCol = control.closest('.quantity-col');
        var quantityValueElement = quantityCol.querySelector('.quantity-value');
        var quantityValue = parseInt(quantityValueElement.textContent);
        var newQuantity = quantityValue + change;

        // If the new quantity is zero, delete the item
        if (newQuantity <= 0) {
            var id = control.closest('.cart-item').dataset.itemId;
            deleteItem(id, quantityCol);
            return;
        }

        var id = control.closest('.cart-item').dataset.itemId;
        var errorMessageElement = quantityCol.querySelector('.quantity-error');

        // Update the quantity value in the cart item row immediately for better UX
        quantityValueElement.textContent = newQuantity;

        // Update the quantity in the database
        updateQuantityInDatabase(id, newQuantity)
        .then(function(response) {
            if (response.success) {
                errorMessageElement.style.display = 'none';
            } else {
                showError(quantityValue, errorMessageElement, response.message);
            }
        })
        .catch(function(error) {
            console.error('Error updating quantity:', error);
            showError(quantityValue, errorMessageElement, 'An error occurred while updating the quantity.');
        });

        function showError(originalValue, errorElement, message) {
            quantityValueElement.textContent = originalValue;
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }
    }

    function updateQuantityInDatabase(id, quantity) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: '/cart/updateQuantity',
                type: 'POST',
                data: { id: id, quantity: quantity },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    resolve(response);
                },
                error: function(xhr, status, error) {
                    reject(xhr.responseJSON ? xhr.responseJSON : { success: false, message: 'AJAX error: ' + status });
                }
            });
        });
    }

    function deleteItem(id, quantityCol) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: '/cart/deleteItem',
                type: 'POST',
                data: { id: id },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                    if (response.success) {
                        quantityCol.closest('.cart-item').remove();
                    } else {
                        alert('An error occurred while deleting the item.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting item:', error);
                    alert('An error occurred while deleting the item.');
                }
            });
        });
    }
});
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