<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
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
                            <li class="breadcrumb-item active"></li>
                        </ol>

<!-- Add Product -->
<!-- Add Product -->
<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card mt-0">
                    <div class="card-title text-center mt-3">
                        <h3>Add Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group mb-4">
                            <label for="productname"><i class="fas fa-shopping-bag"></i> Product Name:</label>
                                <input type="text" class="form-control" id="productname" placeholder="Enter Product Name" required>
                                <div class="invalid-feedback">Product Name Can't Be Empty</div>
                            </div>
                            <div class="form-group mb-4">
                            <label for="description"><i class="fas fa-clipboard-list"></i> Description:</label>
                                <textarea class="form-control" id="description" placeholder="Enter Product Description" required></textarea>
                                <div class="invalid-feedback">Description Can't Be Empty</div>
                            </div>
                            <div class="form-group mb-4">
                            <label for="price"><i class="fas fa-dollar-sign"></i> Product Price:</label>
                                <input type="number" class="form-control" id="price" placeholder="Enter Product Price" required>
                                <div class="invalid-feedback">Product Price Can't Be Empty</div>
                            </div>
                            <div class="form-group mb-4">
                            <label for="quantity"><i class="fas fa-layer-group"></i> Quantity:</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity" required>
                                <div class="invalid-feedback">Quantity Can't Be Empty</div>
                            </div>
                            <div class="form-group mb-4">
                            <label for="imageUrl"><i class="fas fa-image"></i> Product Image:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imageUrl" required>
                                    <label class="custom-file-label" for="imageUrl"></label>
                                    <div class="invalid-feedback">File Format Not Supported</div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                            <label for="productStatus"><i class="fas fa-info-circle"></i> Product Status:</label>
                                <select class="form-control" id="productStatus" required>
                                    <option value="">Select Status</option>
                                    <option value="Available">Available</option>
                                    <option value="Out of Stock">Out of Stock</option>
                                </select>
                                <div class="invalid-feedback">Please select a product status</div>
                            </div>
                            <div class="form-group mb-4">
                            <label for="category_id"><i class="fas fa-cubes"></i> Category:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                     
                                    </div>
                                    <select class="form-control" id="category_id" required>
                                    <option value="">Select Category</option> <option value="1">&#128086; Pants</option> <option value="2">&#128085; Shirts</option> <option value="3">&#128441; Longsleeve</option> <option value="4">&#128084; Polo Shirt</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">Please select a category</div>
                            </div>
                            <button class="btn btn-dark mt-5 mx-auto d-block" type="submit">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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