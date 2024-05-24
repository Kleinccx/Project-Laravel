<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
  <!-- Header Section Begin -->
  <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                <img src="/bootstrapred/img/jarlogo.png" alt="" width="160" height="50">
                </div>
                <div class="header-right">
            <a href="{{ route('profile') }}">
              <img src="/bootstrapred/img/icons/man.png" alt="">
            </a>
            <a href="{{ route('cart.view') }}">
              <img src="/bootstrapred/img/icons/bag.png" alt="">
            </a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-link p-0" style="color: black;">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </form>
         </form>
                </div>
                @guest
          <div class="user-access">
            <a href="{{ route('register') }}">Register /</a>
            <a href="{{ route('login') }}">Login</a>
          </div>
          @endguest
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
                    <h3 class="mb-4">Sign In</h3>
                  </div>
                  <div class="w-100">
                    <p class="social-media d-flex justify-content-end">
                      <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                    </p>
                  </div>
                </div>
                <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group">
            <input id="password" type="password" name="password" required class="form-control">
            <div class="input-group-append">
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
        </div>
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
                  <div class="form-group actions">
                  </div>
                  <div class="form-group d-md-flex">
                    <div class="w-50 text-left">
                      <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                        <input type="checkbox" checked>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="w-50 text-md-right">
                      <a href="#">Forgot Password</a>
                    </div>
                  </div>
                </form>
                <p class="text-center">Not a member? <a href="{{ route('register') }}">Sign Up</a></p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');

      togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye-slash');
      });
    </script>
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