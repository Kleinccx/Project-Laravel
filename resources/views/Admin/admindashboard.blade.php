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
                            <a class="nav-link " href="{{ route('admin.inventory') }}" aria-expanded="false">
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
                    <div class="container-fluid ">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                        <!-- Card for Total Products -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">
                                    <i class="fas fa-box"></i> Total Products
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="small text-white"> {{ $productCount }}</span>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                            </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">
                                    <i class="fas fa-user-check"></i> Activated Users
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="small text-white">{{ $userCount }}</span>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <i class="fas fa-shopping-cart"></i> Total Orders
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            <span class="small text-white"> {{ $orderCount }}</span>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <i class="fas fa-shopping-cart me-2"></i>Total Carts
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="small text-white">{{ $cartCount }}</span>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data of Activated Users
                    </div>
                </head>
                <body>
        <div class="container mt-5">
            <h2>Users</h2>
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Address</th>
                    <th class="text-center">Action</th> <!-- Added class="text-center" here -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->address }}</td>
                <td class="text-center"> <!-- Added class="text-center" here -->
                    
                <!-- Edit and Delete Buttons -->
                <a href="#" onclick="openEditModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->mobile_number }}', '{{ $user->address }}', '{{ $user->status }}')" class="btn btn-primary btn-sm">Edit</a>
                <a href="#" onclick="openDetailsModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->email_verified_at }}', '{{ $user->mobile_number }}', '{{ $user->address }}', '{{ $user->status }}')" class="btn btn-details btn-sm cyan">Details</a>
                <button onclick="openDeleteModal('{{ $user->id }}')" class="btn btn-danger btn-sm">Delete</button>
           
           <style>
                .cyan {
                    background-color: cyan;
                    color: black; /* Set text color to white for better contrast */
                }

                .cyan:hover {
                    background-color: aqua; /* Change color on hover if desired */
                }
            </style>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Edit User Details Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="userId" name="id" value="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                    </div>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="saveChanges()" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- User Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 15px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">
            <div class="modal-header" style="background-color: #343a40; color: white; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <h5 class="modal-title" id="detailsModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body" id="detailsContainer">
                        <!-- User details will be displayed here dynamically -->
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color: #f8f9fa; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #6c757d; color: white;">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this user?</p>
                    <input type="hidden" id="deleteUserId" value=""> <!-- Hidden input for user ID -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="deleteUser()">Delete</button>
                </div>
            </div>
        </div>
    </div>  
        <style>
            .btn-cyan {
        background-color: #00FFFF; 
        color: #000000; 
        border-color: #00FFFF; 
        }

        .btn-cyan:hover {
        background-color: #00CED1; /* Darker shade of cyan on hover */
        color: #000000;
        border-color: #00CED1;
        }
        </style>
      
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
      
        <script>
    
  function openEditModal(id, name, email, mobileNumber, address) {
    $('#userId').val(id);
    $('#name').val(name);
    $('#email').val(email);
    $('#mobile_number').val(mobileNumber);
    $('#address').val(address);
    $('#editModal').modal('show');
}
    function openDetailsModal(id, name, email, emailVerifiedAt, mobileNumber, address, status) {
        var html = '<div class="form-group">';
        html += '<label for="id">ID:</label>';
        html += '<input type="text" id="id" class="form-control" value="' + id + '" readonly>';
        html += '</div>';

        html += '<div class="form-group">';
        html += '<label for="name">Name:</label>';
        html += '<input type="text" id="name" class="form-control" value="' + name + '" readonly>';
        html += '</div>';

        html += '<div class="form-group">';
        html += '<label for="email">Email:</label>';
        html += '<input type="text" id="email" class="form-control" value="' + email + '" readonly>';
        html += '</div>';

        html += '<div class="form-group">';
        html += '<label for="mobileNumber">Mobile Number:</label>';
        html += '<input type="text" id="mobileNumber" class="form-control" value="' + mobileNumber + '" readonly>';
        html += '</div>';

        html += '<div class="form-group">';
        html += '<label for="address">Address:</label>';
        html += '<input type="text" id="address" class="form-control" value="' + address + '" readonly>';
        html += '</div>';

        html += '<div class="form-group">';
        html += '<label for="status">Status:</label>';
        html += '<input type="text" id="status" class="form-control" value="' + (status == 1 ? 'Active' : 'Inactive') + '" readonly>';
        html += '</div>';

        $('#detailsContainer').html(html);
        $('#detailsModal').modal('show');
    }

    function saveChanges() {
    var id = $('#userId').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var mobileNumber = $('#mobile_number').val();
    var address = $('#address').val();
   

    $.ajax({
        url: '/edit',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
            name: name,
            email: email,
            mobile_number: mobileNumber,
            address: address,
        
        },
        success: function(response) {
            if (response.success) {
                $('#editModal').modal('hide');
                location.reload();
            } else {
                alert(response.error || 'Failed to update user details. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            console.error("Update Error: ", xhr, status, error);
            alert('An error occurred while updating user details. Please try again.');
        }
    });
}

        function openDeleteModal(id) {
            $('#deleteUserId').val(id);
            $('#deleteModal').modal('show');
        }
        function deleteUser() {
            var userId = $('#deleteUserId').val();
            console.log("User ID to delete: " + userId);

            if (!userId) {
                alert("User ID is missing.");
                return;
            }

            $.ajax({
                url: '/admin/delete',  // Ensure this matches your route URL
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: userId
                },
                success: function(response) {
                    if (response.success) {
                        $('#deleteModal').modal('hide');
                        location.reload();
                    } else {
                        console.error('Delete Response Error:', response);
                        alert(response.error || 'Failed to delete user. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Delete Error: ", xhr, status, error);
                    alert('An error occurred while deleting user. Please try again.');
                }
            });
        }
</script>
    <script>
        // Include the AJAX setup for CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
        <script>
        $(document).ready(function() {
            $('#datatablesSimple').DataTable();
        });
    </script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/AdminBootstrap/dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
    </body>
</html>
