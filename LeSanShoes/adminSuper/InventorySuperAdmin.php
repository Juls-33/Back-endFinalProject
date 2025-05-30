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
     <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
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
                    <a href="ordersSuperAdmin.php" class="sidebar-link">
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
                    <a href="#" class="sidebar-link active-nav">
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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Inventory</li>
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
                <h1>Inventory</h1>
                <p>Manage and view remaining stocks and daily inventory</p>
            </div>
            
            
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-colorway-size-tab" data-bs-toggle="tab" data-bs-target="#nav-colorway-size" type="button" role="tab" aria-controls="nav-colorway-size" aria-selected="true">Manage Stocks</button>
                    <button class="nav-link" id="nav-shoes-tab" data-bs-toggle="tab" data-bs-target="#nav-Shoes" type="button" role="tab" aria-controls="nav-Shoes" aria-selected="false">Manage Shoes</button> 
                    <button class="nav-link" id="nav-colorway-tab" data-bs-toggle="tab" data-bs-target="#nav-Colorway" type="button" role="tab" aria-controls="nav-Colorway" aria-selected="false">Manage Colorways</button>
                </div>
            </nav>  
            <div class="tab-content" id="nav-tabContent">
                <br>
                <!-- new size tab -->
                <div class="tab-pane fade show active" id="nav-colorway-size" role="tabpanel" aria-labelledby="nav-colorway-size-tab">
                    <div class="d-flex justify-content-end gap-3">
                        <!-- Add new Size -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#colorwaySizeModal">Add New Sizes</button>     
                        <div class="modal fade" id="colorwaySizeModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="newModalLabel">Add New Size</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="closeModal()"></button>
                                </div>
                                
                                <div class="modal-body">
                                    
                                    <!-- FORM -->
                                    <form id="addColorwaySizeForm" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label>Colorway</label>
                                            <div class="form-floating">
                                                <select class="form-select" name="colorway_id" id="colorwaySelect" required>
                                                    <option value="" disabled selected>Open this select menu</option>
                                                    <?= getOptions($conn, 'colorway_tbl', 'colorway_id', 'colorway_name'); ?>
                                                </select>
                                                <label for="colorwaySelect">Select a Colorway</label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Size</label>
                                            <div class="form-floating">
                                                <select class="form-select" name="size_id" id="sizeSelect" required>
                                                    <option value="" disabled selected>Open this select menu</option>
                                                    <?= getOptions($conn, 'size_tbl', 'size_id', 'size_name'); ?>
                                                </select>
                                                <label for="sizeSelect">Select a Size</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" class="form-control" name="stock" id="stock" required min="0">
                                        </div>
                                    </form>
                                    <p class="text-warning-emphasis">Missing colorway or size? Go to Manage Colorway or <a href="ManageDBSuperAdmin.php">Manage Database</a> to add shoe colorway.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="addNewStock()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <table id="colorwaySizeTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Colorway Size ID</th>
                                    <th>Colorway</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th>Last modified by</th>
                                    <th>Edit/Delete</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Shoes" role="tabpanel" aria-labelledby="nav-shoes-tab">
                    <div class="d-flex justify-content-between gap-6">
                        <!-- Add new shoe model -->
                        <p class="text-danger">Warning: Deleting a shoe model will also delete all associated colorways.</p>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#newAdminModal">Add New Shoe Model</button>
                        <div class="modal fade" id="newAdminModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="newModalLabel">Add Shoe Model</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="closeModal()"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- FORM -->
                                    <form id="addShoeForm">
                                        <div class="form-group mb-3">
                                            <label for="model_name">Model Name:</label>
                                            <input type="text" id="model_name" name="model_name" class="form-control" maxlength="50" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Brand</label>
                                                <div class="form-floating">
                                                <select class="form-select" id="brandSelect" name="brand_id" aria-label="Select Brand" required>
                                                    <option value="" disabled selected>Open this select menu</option>
                                                    <?= getOptions($conn, 'brand_tbl', 'brand_id', 'brand_name'); ?>
                                                </select>
                                                <label for="brandSelect">Select a Brand</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label >Category</label>
                                            <div class="form-floating">
                                                <select class="form-select" id="categorySelect" name="category_id" aria-label="Select Category" required>
                                                    <option value="" disabled selected>Open this select menu</option>
                                                    <?= getOptions($conn, 'category_tbl', 'category_id', 'category_name'); ?>
                                                </select>
                                                <label for="categorySelect">Select a Category</label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label >Material</label>
                                            <div class="form-floating">
                                                <select class="form-select" id="materialSelect" name="material_id" aria-label="Select Material" required>
                                                    <option value="" disabled selected>Open this select menu</option>
                                                    <?= getOptions($conn, 'material_tbl', 'material_id', 'material_name'); ?>
                                                </select>
                                                <label for="materialSelect">Select a Material</label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label >Traction</label>
                                            <div class="form-floating">
                                                <select class="form-select" id="tractionSelect" name="traction_id" aria-label="Select Traction" required>
                                                    <option value="" disabled selected>Open this select menu</option>
                                                    <?= getOptions($conn, 'traction_tbl', 'traction_id', 'traction_name'); ?>
                                                </select>
                                                <label for="tractionSelect">Select a Traction</label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group mb-3">
                                            <label >Support</label>
                                            <div class="form-floating">
                                                <select class="form-select" id="supportSelect" name="support_id" aria-label="Select Support" required>
                                                    <option value="" disabled selected>Open this select menu</option>
                                                    <?= getOptions($conn, 'support_tbl', 'support_id', 'support_name'); ?>
                                                </select>
                                                <label for="supportSelect">Select a Support</label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group mb-3">
                                            <label >Technology</label>
                                            <div class="form-floating">
                                                <select class="form-select" id="technologySelect" name="technology_id" aria-label="Select Technology" required>
                                                    <option value="" disabled selected>Open this select menu</option>
                                                    <?= getOptions($conn, 'technology_tbl', 'technology_id', 'technology_name'); ?>
                                                </select>
                                                <label for="technologySelect">Select a Technology</label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="description">Shoe Description</label>
                                            <textarea name="description" id="description" name="description" class="form-control" rows="5" cols="40" maxlength="500" required></textarea><br>
                                        </div> 
                                        <p class="text-warning-emphasis">Missing options? Go to <a href="ManageDBSuperAdmin.php">Manage Database</a> to add missing options.</p>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="newShoeModel()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- <div class="tab-pane fade show active" id="nav-Shoes" role="tabpanel" aria-labelledby="nav-shoes-tab"> -->
                        <div class="container">
                            <div style="overflow-x: auto;">
                                <table id="shoesTable" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Shoe Model ID</th>
                                            <th>Model Name</th>
                                            <th >Description</th>
                                            <th>Brand</th>
                                            <th>Category</th>
                                            <th>Material</th>
                                            <th>Traction</th>
                                            <th>Support</th>
                                            <th>Technology</th>
                                            <th>Date created</th>
                                            <th>Date updated</th>
                                            <th>Lastt modified by</th>
                                            <th>Edit/Delete</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <div class="tab-pane fade" id="nav-Colorway" role="tabpanel" aria-labelledby="nav-colorway-tab">
                    <div class="d-flex justify-content-between gap-3">
                        <!-- Add new Colorway -->
                        <p class="text-danger">Warning: Deleting a colorway will also delete all associated sizes.</p>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#colorwayModal">Add New Colorway</button>
                        <div class="modal fade" id="colorwayModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="newModalLabel">Add New Colorway</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="closeModal()"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- FORM -->
                                    <form id="addColorwayForm" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label>Shoe Model</label>
                                            <div class="form-floating">
                                                <select class="form-select" id="shoeModelSelect" name="shoe_model_id" id="shoe_model_id" aria-label="Select a shoe model" required>
                                                    <option value="" disabled selected>Open this select menu</option>
                                                    <?= getOptions($conn, 'shoe_model_tbl', 'shoe_model_id', 'model_name'); ?>
                                                </select>
                                                <label for="shoeModelSelect">Select a a shoe model</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="colorway_name">Colorway Name:</label>
                                            <input type="text" id="colorway_name" name="colorway_name" class="form-control" maxlength="100" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="price">Price</label>
                                            <input type="number" id="price" name="price" class="form-control" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==9) return false;" required>
                                        </div>
                                        
                                        <!-- Image inputs and previews -->
                                        <div class="form-group col-md-12">
                                            <label>Upload Images</label>
                                            <div class="row g-2">
                                                <!-- Repeat for image1 to image4 -->
                                                <div class="col-md-6">
                                                    <input type="file" name="image1" id="image1" class="form-control" accept="image/*" onchange="previewImage(this, 'imgPreview1')" required>
                                                    <img id="imgPreview1" class="img-fluid mt-2 border" style="width: 100%; height: 200px; object-fit: cover;" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="file" name="image2" id="image2" class="form-control" accept="image/*" onchange="previewImage(this, 'imgPreview2')" required>
                                                    <img id="imgPreview2" class="img-fluid mt-2 border" style="width: 100%; height: 200px; object-fit: cover;" />
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col-md-6">
                                                    <input type="file" name="image3" id="image3" class="form-control" accept="image/*" onchange="previewImage(this, 'imgPreview3')" required>
                                                    <img id="imgPreview3" class="img-fluid mt-2 border" style="width: 100%; height: 200px; object-fit: cover;" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="file" name="image4" id="image4" class="form-control" accept="image/*" onchange="previewImage(this, 'imgPreview4')" required>
                                                    <img id="imgPreview4" class="img-fluid mt-2 border" style="width: 100%; height: 200px; object-fit: cover;" />
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                    <p class="text-warning-emphasis">Missing options? Go to <a href="ManageDBSuperAdmin.php">Manage Database</a> to add missing options.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="addColorway()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <input type="text" id="colorwaySearch" class="form-control mb-3" placeholder="Search colorways...">
                    <!-- card container -->
                    <div class="container mt-4">
                        <div id="colorwayCardContainer" class="row gy-4"></div>
                    </div>
                </div>
                
            
                <!-- MODALS -->
                 <!-- Delete Shoe Confirmation Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Shoe Model</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete <strong id="deleteModelName">this shoe</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Colorway Confirmation Modal -->
                <div class="modal fade" id="deleteColorwayModal" tabindex="-1" aria-labelledby="deleteColorwayLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="deleteColorwayLabel">Delete Colorway</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete <strong id="deleteColorwayName">this colorway</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteColorway">Delete</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Delete colorway size Confirmation Modal -->
                <div class="modal fade" id="deleteColorwaySizeModal" tabindex="-1" aria-labelledby="deleteColorwaySizeLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="deleteColorwaySizeLabel">Delete Colorway Size</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete <strong id="deleteColorwaySizeName">this colorway size?</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteColorwaySize">Delete</button>
                        </div>
                        </div>
                    </div>
                </div>

            
                 <!-- Edit Shoe Model Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form id="editShoeForm">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="editModalLabel">Edit Shoe Model</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModal()"></button>
                                </div>
                                <!-- nandito yung id -->
                                <div class="modal-body row g-3">
                                    <input type="hidden" id="edit_model_id" name="shoe_model_id">
                                <div class="form-group mb-3">
                                    <label for="model_name">Model Name:</label>
                                    <input type="text" id="edit_model_name" name="model_name" class="form-control" maxlength="50" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Brand</label>
                                        <div class="form-floating">
                                        <select class="form-select" id="brandSelect" name="brand_id" aria-label="Select Brand" required>
                                            <option value="" disabled selected>Open this select menu</option>
                                            <?= getOptions($conn, 'brand_tbl', 'brand_id', 'brand_name'); ?>
                                        </select>
                                        <label for="brandSelect">Select a Brand</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label >Category</label>
                                    <div class="form-floating">
                                        <select class="form-select" id="categorySelect" name="category_id" aria-label="Select Category" required>
                                            <option value="" disabled selected>Open this select menu</option>
                                            <?= getOptions($conn, 'category_tbl', 'category_id', 'category_name'); ?>
                                        </select>
                                        <label for="categorySelect">Select a Category</label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label >Material</label>
                                    <div class="form-floating">
                                        <select class="form-select" id="materialSelect" name="material_id" aria-label="Select Material" required>
                                            <option value="" disabled selected>Open this select menu</option>
                                            <?= getOptions($conn, 'material_tbl', 'material_id', 'material_name'); ?>
                                        </select>
                                        <label for="materialSelect">Select a Material</label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label >Traction</label>
                                    <div class="form-floating">
                                        <select class="form-select" id="tractionSelect" name="traction_id" aria-label="Select Traction" required>
                                            <option value="" disabled selected>Open this select menu</option>
                                            <?= getOptions($conn, 'traction_tbl', 'traction_id', 'traction_name'); ?>
                                        </select>
                                        <label for="tractionSelect">Select a Traction</label>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label >Support</label>
                                    <div class="form-floating">
                                        <select class="form-select" id="supportSelect" name="support_id" aria-label="Select Support" required>
                                            <option value="" disabled selected>Open this select menu</option>
                                            <?= getOptions($conn, 'support_tbl', 'support_id', 'support_name'); ?>
                                        </select>
                                        <label for="supportSelect">Select a Support</label>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label >Technology</label>
                                    <div class="form-floating">
                                        <select class="form-select" id="technologySelect" name="technology_id" aria-label="Select Technology" required>
                                            <option value="" disabled selected>Open this select menu</option>
                                            <?= getOptions($conn, 'technology_tbl', 'technology_id', 'technology_name'); ?>
                                        </select>
                                        <label for="technologySelect">Select a Technology</label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description">Shoe Description</label>
                                    <textarea name="description" id="edit_description" name="description" class="form-control" rows="5" cols="40" maxlength="500" required></textarea><br>
                                </div>
                                <p class="text-warning-emphasis">Missing options? Go to <a href="ManageDBSuperAdmin.php">Manage Database</a> to add missing options.</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-success" onclick="editShoeModel()">Save Changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Cancel</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                <!-- EDIT COLORWAY -->
                <div class="modal fade" id="editColorwayModal" tabindex="-1" aria-labelledby="editColorwayModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <form id="editColorwayForm" enctype="multipart/form-data">
                            <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Edit Colorway</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" name="colorway_id" id="edit_colorway_id">

                            <div class="form-group mb-3">
                                <label>Shoe Model</label>
                                <div class="form-floating">
                                    <select class="form-select"  name="shoe_model_id" id="shoe_model_id" aria-label="Select a shoe model" required>
                                        <option value="" disabled selected>Open this select menu</option>
                                        <?= getOptions($conn, 'shoe_model_tbl', 'shoe_model_id', 'model_name'); ?>
                                    </select>
                                    <label for="shoe_model_id">Select a a shoe model</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="edit_colorway_name" class="form-label">Colorway Name</label>
                                <input type="text" class="form-control" id="edit_colorway_name" name="edit_colorway_name" maxlength="100" required>
                            </div>

                            <div class="mb-3">
                                <label for="edit_price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="edit_price" name="edit_price" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==9) return false;" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Upload Images</label>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <input type="file" name="image1" id="edit_image1" class="form-control" accept="image/*" onchange="previewImage(this, 'editPreview1')">
                                        <img id="editPreview1" class="img-fluid mt-2 border" style="width: 100%; height: 200px; object-fit: cover;" />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="image2" id="edit_image2" class="form-control" accept="image/*" onchange="previewImage(this, 'editPreview2')">
                                        <img id="editPreview2" class="img-fluid mt-2 border" style="width: 100%; height: 200px; object-fit: cover;" />
                                    </div>
                                </div>
                                <div class="row g-2 mt-2">
                                    <div class="col-md-6">
                                        <input type="file" name="image3" id="edit_image3" class="form-control" accept="image/*" onchange="previewImage(this, 'editPreview3')">
                                        <img id="editPreview3" class="img-fluid mt-2 border" style="width: 100%; height: 200px; object-fit: cover;" />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="image4" id="edit_image4" class="form-control" accept="image/*" onchange="previewImage(this, 'editPreview4')">
                                        <img id="editPreview4" class="img-fluid mt-2 border" style="width: 100%; height: 200px; object-fit: cover;" />
                                    </div>
                                </div>
                            </div>
                            <p class="text-warning-emphasis">Missing options? Go to <a href="ManageDBSuperAdmin.php">Manage Database</a> to add missing options.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                                <button type="button" class="btn btn-success" onclick="updateColorway()">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                 <!-- Edit Colorway Size Modal -->
                 <div class="modal fade" id="editColorwaySizeModal" tabindex="-1" aria-labelledby="editColorwatSizeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form id="editColorwaySizeForm">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="editColorwatSizeModalLabel">Edit Shoe Model</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModal()"></button>
                                </div>
                                <!-- nandito yung id -->
                                <div class="modal-body row g-3">
                                    <input type="hidden" id="colorway_size_id" name="colorway_size_id">
                                    <div class="form-group mb-3">
                                        <label>Colorway</label>
                                        <div class="form-floating">
                                            <select class="form-select" name="edit_colorway_id" id="colorwaySelect" required>
                                                <option value="" disabled selected>Open this select menu</option>
                                                <?= getOptions($conn, 'colorway_tbl', 'colorway_id', 'colorway_name'); ?>
                                            </select>
                                            <label for="colorwaySelect">Select a Colorway</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Size</label>
                                        <div class="form-floating">
                                            <select class="form-select" name="edit_size_id" id="sizeSelect" required>
                                                <option value="" disabled selected>Open this select menu</option>
                                                <?= getOptions($conn, 'size_tbl', 'size_id', 'size_name'); ?>
                                            </select>
                                            <label for="sizeSelect">Select a Size</label>
                                        </div>
                                    </div>
                                    <p class="text-warning-emphasis">Missing colorway or size? Go to Manage Colorway or <a href="ManageDBSuperAdmin.php">Manage Database</a> to add shoe colorway.</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-success" onclick="editColorwaySize()">Save Changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Cancel</button>
                                </div>
                            </form>
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
    <script src="../includes/logic/inventoryMiddleware.js"></script>
    <script src="../includes/logic/inventorySearch.js"></script>

    </body>

</html>