<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Jarred's Style Admin</title>
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('AdminBootstrap/dist/css/styles.css') }}" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3">Admin Dashboard</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                             Dashboard
                            </a>
                            <a class="nav-link collapsed" href="{{ route('admin.inventory') }}" aria-expanded="false">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Inventory Control
                    </a>
                            </div>        
                            </a>
                            
                           
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                </nav>
                            </div>
                            <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"></li></ol>
@section('content')
<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card mt-0">
                    <div class="card-title text-center mt-3">
                        <h3>{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($product) ? route('admin.updateProduct', $product->id) : route('admin.addProductPost') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            @if(isset($product))
                                @method('POST')
                            @endif
                            <div class="form-group mb-4">
                                <label for="productname"><i class="fas fa-shopping-bag"></i> Product Name:</label>
                                <input type="text" class="form-control" name="product_name" id="productname" placeholder="Enter Product Name" value="{{ isset($product) ? $product->product_name : '' }}" required>
                                <div class="invalid-feedback">Product Name Can't Be Empty</div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="description"><i class="fas fa-clipboard-list"></i> Description:</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Product Description" required>{{ isset($product) ? $product->description : '' }}</textarea>
                                <div class="invalid-feedback">Description Can't Be Empty</div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="price"><i class="fas fa-dollar-sign"></i> Product Price:</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Enter Product Price" value="{{ isset($product) ? $product->price : '' }}" required>
                                <div class="invalid-feedback">Product Price Can't Be Empty</div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="quantity"><i class="fas fa-layer-group"></i> Quantity:</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity" value="{{ isset($product) ? $product->quantity : '' }}" required>
                                <div class="invalid-feedback">Quantity Can't Be Empty</div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="image"><i class="fas fa-image"></i> Product Image:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imageUrl" id="image">
                                    <label class="custom-file-label" for="imageUrl"></label>
                                    <div class="invalid-feedback">File Format Not Supported</div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                        <label for="productStatus"><i class="fas fa-info-circle"></i> Product Status:</label>
                        <select class="form-control" name="product_status" id="productStatus" required>
                            <option value="Available" {{ isset($product) && $product->product_status === 'Available' ? 'selected' : '' }}>Available</option>
                            <option value="Out of Stock" {{ isset($product) && $product->product_status === 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                        </select>
                        <div class="invalid-feedback">Please select a product status</div>
                    </div>
                            <div class="form-group mb-4">
                                <label for="category_id"><i class="fas fa-cubes"></i> Category:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        <option value="">Select Category</option>
                                        <option value="1" {{ isset($product) && $product->category_id == 1 ? 'selected' : '' }}>&#128086; Pants</option>
                                        <option value="2" {{ isset($product) && $product->category_id == 2 ? 'selected' : '' }}>&#128085; Shirts</option>
                                        <option value="3" {{ isset($product) && $product->category_id == 3 ? 'selected' : '' }}>&#128441; Longsleeve</option>
                                        <option value="4" {{ isset($product) && $product->category_id == 4 ? 'selected' : '' }}>&#128084; Polo Shirt</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">Please  select a category</div>
                                </div>
                                <div class="d-flex justify-content-center mt-5">
    <a href="{{ route('admin.inventory') }}" class="btn btn-dark mx-2">Go Back</a>
    <button class="btn btn-dark mx-2" type="submit">{{ isset($product) ? 'Update Product' : 'Add Product' }}</button>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
      </section>

      
        <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(176, 188, 194, 0.4);
            background-color: #fff;
            }

            .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            }

            .card-title .fas {
            margin-right: 0.5rem;
            font-size: 1.2em;
            }

            .form-group {
            position: relative;
            }

            .form-group label {
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
            }

            .form-group .fas {
            position: absolute;
            top: 50%;
            left: 0.75rem;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 1.2em;
            }

            .form-control {
            padding-left: 2.5rem;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #f8f8f8;
            }

            .form-control:focus {
            border-color: #B0BCC2;
            box-shadow: 0 0 0 0.2rem rgba(176, 188, 194, 0.5);
            }

            .invalid-feedback {
            display: none;
            font-size: 0.875rem;
            color: #dc3545;
            }

            .form-control.is-invalid {
            border-color: #dc3545;
            }

            .form-control.is-invalid + .invalid-feedback {
            display: block;
            }

            .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
            }

            .btn-dark:hover {
            background-color: #23272b;
            border-color: #1d2124;
            }
      </style>
      
         <!-- Include FontAwesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        </script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/AdminBootstrap/dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <!-- Scripts -->
        <script src="/assets/js/bootstrap.min.js"></script>
        </body>
        </html>
