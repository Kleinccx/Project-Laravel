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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

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
                    <li><a href="{{ route('contact') }}">Contact</a></li>
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
      <!-- Page Add Section Begin -->
      <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Checkout<span>.</span></h2>
                        <a href="{{route('index')}}">Home</a>
                        <a href="{{route('checkout')}}">Checkout</a>
                        
               
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
 <!-- Page Cart Section Begin -->
 <div class="cart-page">
    <div class="container">
        <div class="cart-table">
            <table>
                <thead>
               
                    <tr>
                        <th class="product-h">Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="cart-tbody">
        @foreach ($cartItems as $item)
        <tr class="cart-item" data-item-id="{{ $item->id }}">
            <td class="product-col">
                <img src="{{ $item->product->imageUrl }}" alt="">
                <div class="p-title">
                    <h5>{{ $item->product->product_name }}</h5>
                </div>
            </td>
            <td class="price-col">{{ $item->product->price }}</td>
            <td class="quantity-col">
                <span>{{$item->quantity}}</span>
            </td>
            <td>{{ $item->quantity * $item->product->price }}</td>
        </tr>
    @endforeach
</tbody>
<tfoot>
    <tr>
        <td colspan="3" class="text-right">Total Payment:&nbsp;</td>
        <td class="text-gray"><strong>{{ number_format($cartItems->sum(function($item) {
            return $item->quantity * $item->product->price;
        }), 2, '.', ',') }}</strong></td>
    </tr>
</tfoot>

<style>
.text-gray {
    color: #888888;
}
</style>
        </table>
        </div>
        <div class="card p-3 py-3 mt-3 card-1 text-center">
    <h4>Delivery Address</h4>
    <div class="p-3 card-2">
        <div class="p-3 card-child" style="border: 2px solid #B0BCC2; font-weight: bold;">
            <div class="d-flex flex-row align-items-center">
                <span class="circle">
                    <i class="fa fa-home"></i>
                </span>
                <div class="d-flex flex-column ms-3">
                    <h6 class="fw-bold">Home</h6>
                    <span>2112, cottonwoon lane, <br>Ground Floor, NY ,20021</span>
                </div>
            </div>
        </div>
    </div>
</div>

      <!-- Payment Method Begin -->
      <div class="container-fluid px-0" id="bg-div">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-12">
                <div class="card card0">
                    <div class="d-flex" id="wrapper">
                        <!-- Sidebar -->
                        <div class="bg-light border-right" id="sidebar-wrapper">
                            <div class="sidebar-heading pt-5 pb-4"><strong>Payment Method</strong></div>
                            <div class="list-group list-group-flush">
                                <a data-toggle="tab" href="#menu1" id="tab1" class="tabs list-group-item bg-light">
                                    <div class="list-div my-2">
                                        <div class="fa fa-home"></div> &nbsp;&nbsp; Bank
                                    </div>
                                </a>
                                <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item active1"></a>
                            </div>
                        </div>
                        <!-- Page Content -->
                        <div id="page-content-wrapper">
                            <div class="row pt-3" id="border-btm">
                                <div class="col-4">
                                    <button class="btn btn-success mt-4 ml-3 mb-3" id="menu-toggle">
                                        <div class="bar4"></div>
                                        <div class="bar4"></div>
                                        <div class="bar4"></div>
                                    </button>
                                </div>
                                <div class="col-8">
                                    <div class="row justify-content-right">
                                        <div class="col-12">
                                            <p class="mb-0 mr-4 mt-4 text-right">{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-right">
                                        <div class="col-12">
                                            <p class="mb-0 mr-4 text-right">Pay <span class="top-highlight">{{ number_format($cartItems->sum(function($item) {
                                                return $item->quantity * $item->product->price;
                                            }), 2, '.', ',') }}</span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="text-center" id="test">Pay</div>
                            </div>
                            <div class="tab-content">
                                <div id="menu1" class="tab-pane">
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <div class="form-card">
                                                <h3 class="mt-0 mb-4 text-center">Enter bank details to pay</h3>
                                                <form id="bank-payment-form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group">
                                                                <input type="text" name="bank_name" id="bk_nm" placeholder="BBB Bank" required>
                                                                <label>BANK NAME</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group">
                                                                <input type="text" name="beneficiary_name" id="ben-nm" placeholder="John Smith" required>
                                                                <label>BENEFICIARY NAME</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="input-group">
                                                                <input type="text" name="swift_code" placeholder="ABCDAB1S" class="placeicon" minlength="8" maxlength="11" required>
                                                                <label>SWIFT CODE</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Include hidden input for cart items -->
                                                   <!-- Include hidden inputs for each cart item -->
                                                    @foreach ($cartItems as $index => $item)
                                                        <input type="hidden" name="cartItems[{{ $index }}][product_id]" value="{{ $item->product_id }}">
                                                        <input type="hidden" name="cartItems[{{ $index }}][quantity]" value="{{ $item->quantity }}">
                                                    @endforeach
                                                    <input type="hidden" name="payment_method" value="bank">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" value="Pay" class="btn btn-success placeicon">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    // Set CSRF token in the AJAX request header
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#bank-payment-form').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Gather form data
        var formData = $(this).serializeArray();

        // Convert form data to object
        var data = {};
        $.each(formData, function(_, field) {
            if (field.name.includes('cartItems')) {
                // Handle nested cartItems array
                let match = field.name.match(/cartItems\[(\d+)\]\[(\w+)\]/);
                if (match) {
                    let index = match[1];
                    let key = match[2];
                    if (!data.cartItems) {
                        data.cartItems = [];
                    }
                    if (!data.cartItems[index]) {
                        data.cartItems[index] = {};
                    }
                    data.cartItems[index][key] = field.value;
                }
            } else {
                data[field.name] = field.value;
            }
        });

        // Check if there are items in the cart
        if (!data.cartItems || data.cartItems.length === 0) {
            Swal.fire(
                'No Items in Cart',
                'Please add items to the cart before proceeding to payment.',
                'error'
            );
            return;
        }
        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Confirm Payment',
            text: "Are you sure you want to proceed with the payment?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, pay now!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request if user confirms
                $.ajax({
                    type: 'POST',
                    url: '/checkout', // Use the /checkout route which corresponds to the store method in CheckoutController
                    data: data,
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        Swal.fire(
                            'Payment Successful!',
                            'Your payment has been processed.',
                            'success'
                        ).then(() => {
                            // Reload the page to reset form and UI
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                        Swal.fire(
                            'Payment Failed',
                            'There was an error processing your payment: ' + xhr.responseText,
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>




     <!-- Payment Method End -->
<style>
*{margin: 0;padding: 0}body{overflow-x: hidden;background: #000000}#bg-div{margin: 0;margin-top:100px;margin-bottom:100px}#border-btm{padding-bottom: 20px;margin-bottom: 0px;box-shadow: 0px 35px 2px -35px lightgray}#test{margin-top: 0px;margin-bottom: 40px;border: 1px solid #FFE082;border-radius: 0.25rem;width: 60px;height: 30px;background-color: #FFECB3}.active1{color: #00C853 !important;font-weight: bold}.bar4{width: 35px;height: 5px;background-color: #ffffff;margin: 6px 0}.list-group .tabs{color: #000000}#menu-toggle{height: 50px}#new-label{padding: 2px;font-size: 10px;font-weight: bold;background-color: red;color: #ffffff;border-radius: 5px;margin-left: 5px}#sidebar-wrapper{min-height: 100vh;margin-left: -15rem;-webkit-transition: margin .25s ease-out;-moz-transition: margin .25s ease-out;-o-transition: margin .25s ease-out;transition: margin .25s ease-out}#sidebar-wrapper .sidebar-heading{padding: 0.875rem 1.25rem;font-size: 1.2rem}#sidebar-wrapper .list-group{width: 15rem}#page-content-wrapper{min-width: 100vw;padding-left: 20px;padding-right: 20px}#wrapper.toggled #sidebar-wrapper{margin-left: 0}.list-group-item.active{z-index: 2;color: #fff;background-color: #fff !important;border-color: #fff !important}@media (min-width: 768px){#sidebar-wrapper{margin-left: 0}#page-content-wrapper{min-width: 0;width: 100%}#wrapper.toggled #sidebar-wrapper{margin-left: -15rem;display: none}}.card0{margin-top: 10px;margin-bottom: 10px}.top-highlight{color: #00C853;font-weight: bold;font-size: 20px}.form-card input, .form-card textarea{padding: 10px 15px 5px 15px;border: none;border: 1px solid lightgrey;border-radius: 6px;margin-bottom: 25px;margin-top: 2px;width: 100%;box-sizing: border-box;font-family: arial;color: #2C3E50;font-size: 14px;letter-spacing: 1px}.form-card input:focus, .form-card textarea:focus{-moz-box-shadow: 0px 0px 0px 1.5px skyblue !important;-webkit-box-shadow: 0px 0px 0px 1.5px skyblue !important;box-shadow: 0px 0px 0px 1.5px skyblue !important;font-weight: bold;border: 1px solid skyblue;outline-width: 0}input.btn-success{height: 50px;color: #ffffff;opacity: 0.9}#below-btn a{font-weight: bold;color: #000000}.input-group{position:relative;width:100%;overflow:hidden}.input-group input{position:relative;height:90px;margin-left: 1px;margin-right: 1px;border-radius:6px;padding-top: 30px;padding-left: 25px}.input-group label{position:absolute;height: 24px;background: none;border-radius: 6px;line-height: 48px;font-size: 15px;color: gray;width:100%;font-weight:100;padding-left: 25px}input:focus + label{color: #1E88E5}#qr{margin-bottom: 150px;margin-top: 50px}
</style>
<script>
$(document).ready(function(){
    //Menu Toggle Script
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // For highlighting activated tabs
    $("#tab1").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light"); 
        $("#tab1").addClass("active1");
        $("#tab1").removeClass("bg-light");
    });
    $("#tab2").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab2").addClass("active1");
        $("#tab2").removeClass("bg-light");
    });
    $("#tab3").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab3").addClass("active1");
        $("#tab3").removeClass("bg-light");
    });
})

</script>
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
             
                </div>
            </div>
        </div>
    </div>
</div>
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

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif
        }

        .container {
            margin: 30px auto;
        }

        .container .card {
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            background: #fff;
            border-radius: 0px;
        }

        body {
            background: #eee
        }



        .btn.btn-primary {
            background-color: #ddd;
            color: black;
            box-shadow: none;
            border: none;
            font-size: 20px;
            width: 100%;
            height: 100%;
        }

        .btn.btn-primary:focus {
            box-shadow: none;
        }

        .container .card .img-box {
            width: 80px;
            height: 50px;
        }

        .container .card img {
            width: 100%;
            object-fit: fill;
        }

        .container .card .number {
            font-size: 24px;
        }

        .container .card-body .btn.btn-primary .fab.fa-cc-paypal {
            font-size: 32px;
            color: #3333f7;
        }

        .fab.fa-cc-amex {
            color: #1c6acf;
            font-size: 32px;
        }

        .fab.fa-cc-mastercard {
            font-size: 32px;
            color: red;
        }

        .fab.fa-cc-discover {
            font-size: 32px;
            color: orange;
        }

        .c-green {
            color: green;
        }

        .box {
            height: 40px;
            width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ddd;
        }

        .btn.btn-primary.payment {
            background-color: #1c6acf;
            color: white;
            border-radius: 0px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 24px;
        }


        .form__div {
            height: 50px;
            position: relative;
            margin-bottom: 24px;
        }

        .form-control {
            width: 100%;
            height: 45px;
            font-size: 14px;
            border: 1px solid #DADCE0;
            border-radius: 0;
            outline: none;
            padding: 2px;
            background: none;
            z-index: 1;
            box-shadow: none;
        }

        .form__label {
            position: absolute;
            left: 16px;
            top: 10px;
            background-color: #fff;
            color: #80868B;
            font-size: 16px;
            transition: .3s;
            text-transform: uppercase;
        }

        .form-control:focus+.form__label {
            top: -8px;
            left: 12px;
            color: #1A73E8;
            font-size: 12px;
            font-weight: 500;
            z-index: 10;
        }

        .form-control:not(:placeholder-shown).form-control:not(:focus)+.form__label {
            top: -8px;
            left: 12px;
            font-size: 12px;
            font-weight: 500;
            z-index: 10;
        }

        .form-control:focus {
            border: 1.5px solid #1A73E8;
            box-shadow: none;
        }
    </style>

  <!-- Delivery Address CCS -->
    <style>
     
.card-1{
width:400px;
border-radius:18px;
border:none;
}
.card-2{
    border-radius:20px;
}


.card-child{
    
    border:3px solid blue;
    border-radius:16px;
    
}

.circle{
    
    background-color:#ebdffb;
    height:50px;
    width:50px;
    border-radius:50%;
    display:flex;
    color:#9553ea;
    justify-content:center;
    align-items:center;
    font-size:20px;
        
}


.circle-2{
    
    background-color:#fbebdf;
    height:50px;
    width:50px;
    border-radius:50%;
    display:flex;
    color:#ea9253;
    justify-content:center;
    align-items:center;
    font-size:20px;
        
}


.circle-3{
    
    background-color:blue;
    height:50px;
    width:50px;
    border-radius:50%;
    display:flex;
    color:#fff;
    justify-content:center;
    align-items:center;
    font-size:20px;
        
}
    </style>
</body>

</html>