<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add this in the head section of your HTML file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Create Account</title>
    
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/loginbootstrap/css/style.css">
</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Create Your Account</h2>
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
</body>
</html>
