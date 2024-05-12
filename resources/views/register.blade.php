<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add this in the head section of your HTML file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Create Account</title>
    
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/loginbootstrap/css/style.css">

    
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
                       
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                       
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                  
                </div>
                </div>
            </div>
        </div>
    </div>

    

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section"></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(/loginbootstrap/images/bg-1.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign Up</h3>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('register') }}" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <label class="label" for="name">Username</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Username" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="label" for="email">E-Mail Address</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label class="label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label class="label" for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group actions">
                                <button type="submit">Register</button>
                           
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                        Remember Me
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        <p class="text-center">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="/loginbootstrap/js/jquery.min.js"></script>
  <script src="/loginbootstrap/js/popper.js"></script>
  <script src="/loginbootstrap/js/bootstrap.min.js"></script>
  <script src="/loginbootstrap/js/main.js"></script>
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
