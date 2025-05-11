<?php
    // session_start();
    include("../includes/logic/inventoryGetOptions.php");

    if (!isset($_SESSION['username'])) {
        // Not logged in — redirect to login
        header("Location: ../users/index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css">
    <link rel="stylesheet" href="../assets/css/AdminPage.css">
    <link rel="stylesheet" href="../assets/css/CustomAdminPage.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-dashboard-square-1"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">LeSanShoes</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="DashboardSuperAdmin.php" class="sidebar-link">
                        <i class="lni lni-dashboard-square-1"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link active-nav">
                        <i class="lni lni-box-closed"></i>
                        <span>Orders</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="InventorySuperAdmin.php" class="sidebar-link">
                        <i class="lni lni-box-archive-1"></i>
                        <span>Inventory</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="ManageDBSuperAdmin.php" class="sidebar-link">
                        <i class="lni lni-layout-9"></i>
                        <span>Manage Database</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="UserMngSuperAdmin.php" class="sidebar-link">
                        <i class="lni lni-user-multiple-4"></i>
                        <span>User Management</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="../userAuth/logoutAdmin.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <!-- main content inside class="main p-3" -->
        <div class="main p-3">
        <nav class="navbar navbar-main navbar-expand-lg px- mx-4 shadow-none border-radius-xl" id="navbarTop">
                <div class="container-fluid py-0 px-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">
                                <a class="opacity-5 text-dark" href="javascript:;">Super Admin</a>
                            </li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Orders</li>
                        </ol>
                        <!-- <h6 class="font-weight-bolder mb-0">Dashboard</h6> -->
                    </nav>
                    <div class="d-flex align-items-center justify-content-end ms-auto">
                        <p class="mb-0 text-sm text-dark">Welcome back,
                            <strong>
                                <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'Not set'; ?>
                            </strong>
                        </p>
                    </div> 
                    
                </div>
            </nav>
            <div class="px-0 mx-4 mt-3">
                <h1>Orders</h1>
                <p>Manage and view pending, completed, and cancelled orders</p>
            </div>
            
            
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-orders-tab" data-bs-toggle="tab" data-bs-target="#nav-Orders" type="button" role="tab" aria-controls="nav-Orders" aria-selected="false">Orders</button> 
                    <button class="nav-link" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-Completed" type="button" role="tab" aria-controls="nav-Completed" aria-selected="false">Completed</button> 
                    <button class="nav-link" id="nav-cancelled-tab" data-bs-toggle="tab" data-bs-target="#nav-Cancelled" type="button" role="tab" aria-controls="nav-Cancelled" aria-selected="false">Cancelled</button> 
                </div>
            </nav>  
            <div class="tab-content" id="nav-tabContent">
                <br>
                
                <div class="tab-pane fade show active" id="nav-Orders" role="tabpanel" aria-labelledby="nav-orders-tab">
                    <br>
                    <!-- <div class="tab-pane fade show active" id="nav-Orders" role="tabpanel" aria-labelledby="nav-orders-tab"> -->
                        <div class="container">
                            <div style="overflow-x: auto;">
                                <table id="ordersTable" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer Name</th>
                                            <th>Total Price</th>
                                            <th>Date purchased</th>
                                            <th>Status</th>
                                            <th>Quantity</th>
                                            <th>Colorway name</th>
                                            <th>Size</th>
                                            <th>Shoe model</th>
                                            <th>Image</th>
                                            <!-- <th>Delete</th> -->
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <!-- Completed -->
                <div class="tab-pane fade" id="nav-Completed" role="tabpanel" aria-labelledby="nav-completed-tab">
                    <br>
                    <!-- <div class="tab-pane fade show active" id="nav-Orders" role="tabpanel" aria-labelledby="nav-orders-tab"> -->
                        <div class="container">
                            <div style="overflow-x: auto;">
                                <table id="completedTable" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer Name</th>
                                            <th>Total Price</th>
                                            <th>Date purchased</th>
                                            <th>Status</th>
                                            <th>Quantity</th>
                                            <th>Colorway name</th>
                                            <th>Size</th>
                                            <th>Shoe model</th>
                                            <th>Image</th>
                                            <!-- <th>Delete</th> -->
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <!-- Cancelled -->
                <div class="tab-pane fade" id="nav-Cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
                    <br>
                    <!-- <div class="tab-pane fade show active" id="nav-Orders" role="tabpanel" aria-labelledby="nav-orders-tab"> -->
                        <div class="container">
                            <div style="overflow-x: auto;">
                                <table id="cancelledTable" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer Name</th>
                                            <th>Total Price</th>
                                            <th>Date purchased</th>
                                            <th>Status</th>
                                            <th>Quantity</th>
                                            <th>Colorway name</th>
                                            <th>Size</th>
                                            <th>Shoe model</th>
                                            <th>Image</th>
                                            <!-- <th>Delete</th> -->
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <!-- MODALS -->
                 <!-- Order Detail Modal -->
                <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <!-- <h5 class="modal-title" id="orderDetailModalLabel">Order Details</h5> -->
                                <h5><strong>Status:</strong> <span id="modalStatus"></span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModal()"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container text-justify">
                                    <div class="row">
                                        <div class="col">
                                            <h6>Ordered Items:</h6>
                                            <p><strong>Order ID:</strong> <span id="modalOrderId"></span></p>
                                            <p><strong>Shoe Model:</strong> <span id="modalModelName"></span></p>
                                            <p><strong>Size:</strong> <span id="modalSizeName"></span></p>
                                            <p><strong>Colorway:</strong> <span id="modalColorwayName"></span></p>
                                            <p><strong>Quantity:</strong> <span id="modalQuantity"></span></p>
                                            <p><strong>Total Price:</strong> ₱<span id="modalTotalPrice"></span></p>
                                            <p><strong>Order Date:</strong> <span id="modalOrderDate"></span></p>
                                        </div>
                                        <div class="col">
                                            <p><strong>Customer Name:</strong> <span id="modalUsername"></span></p>
                                            <p><strong>Address:</strong> <span id="modalAddress"></span></p>
                                        </div>
                                        <div class="col">
                                            <div id="modalItemsContainer"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <select id="orderStatusDropdown" class="form-select">
                                        <?= getOptions($conn, 'status_tbl', 'status_id', 'status_name'); ?>
                                    </select>
                                    <button id="updateOrderStatusBtn" class="btn btn-success">Update Status</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fuse.js@6.6.2"></script>
    <script src="../assets/swal/sweetalert2.min.js"></script>
    <script src="../includes/logic/AdminPage.js"></script>
    <script src="../includes/logic/ordersMiddleware.js"></script>
   

    </body>

</html>