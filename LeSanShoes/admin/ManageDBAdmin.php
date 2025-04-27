<?php
    session_start();

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
    <title>User Management</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css">
    <!-- <link rel="stylesheet" href="../assets/css/AdminPage.css"> -->
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
                <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user-4"></i>
                        <span>Profile</span>
                    </a>
                </li> -->
                <li class="sidebar-item">
                    <a href="DashboardAdmin.php" class="sidebar-link">
                        <i class="lni lni-dashboard-square-1"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
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
                    <a href="#" class="sidebar-link">
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
                <li class="sidebar-item active-nav">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-layout-9"></i>
                        <span>Manage Database</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="UserMngAdmin.php" class="sidebar-link">
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
                                <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                            </li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Manage Database</li>
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
                <h1>Manage Database</h1>
                <p>Manage other details store in the database</p>
            </div>
            
            
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-brand-tab" data-bs-toggle="tab" data-bs-target="#nav-brand" type="button" role="tab" aria-controls="nav-brand" aria-selected="true">Brand
                    <button class="nav-link" id="nav-category-tab" data-bs-toggle="tab" data-bs-target="#nav-category" type="button" role="tab" aria-controls="nav-category" aria-selected="false">Shoes Category</button>
                    <button class="nav-link" id="nav-shoes-gender-tab" data-bs-toggle="tab" data-bs-target="#nav-shoes-gender" type="button" role="tab" aria-controls="nav-shoes-gender" aria-selected="false">Shoes gender</button>
                    <button class="nav-link" id="nav-status-tab" data-bs-toggle="tab" data-bs-target="#nav-status" type="button" role="tab" aria-controls="nav-status" aria-selected="false">Status</button>
                    <button class="nav-link" id="nav-roles-tab" data-bs-toggle="tab" data-bs-target="#nav-roles" type="button" role="tab" aria-controls="nav-roles" aria-selected="false">User Roles</button>
                </div>
            </nav>  
            
            <div class="tab-content" id="nav-tabContent">
                <!-- brand tab -->
                <div class="tab-pane fade show active" id="nav-brand" role="tabpanel" aria-labelledby="nav-brand-tab">
                    <br>
                    <div class="d-flex justify-content-center gap-3">
                        <!-- edit brand -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editBrandModal">Edit</button>
                        <div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="editBrandLabel">Edit Brand</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Edit brand in the database</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="brandID">Brand ID</label>
                                        <input type="number" id="brandID" name="brandID" class="form-control" maxlength="100" required>
                                        <label for="brandEdit">Brand name</label>
                                        <input type="text" id="brandEdit" name="brandEdit" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="editBrand()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- add brand -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add</button>
                        <div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="addBrandLabel">Add Brand</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Add brand to the datababse</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="brandIDAdd">Brand ID</label>
                                        <input type="number" id="brandIDAdd" name="brandIDAdd" class="form-control" maxlength="100" required>
                                        <label for="brandAdd">Brand name    </label>
                                        <input type="text" id="brandAdd" name="brandAdd" class="form-control" maxlength="100" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="addBrand()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- delete brand -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBrandModal">Delete</button>
                        <div class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="deleteBrandLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="deleteBrandLabel">Delete a Brand</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Delete a brand from the database</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="brandDelete">Brand ID</label>
                                        <input type="number" id="brandDelete" name="brandDelete" class="form-control" maxlength="11" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" name="signup_btn" value="signup_btn" onclick="deleteBrand()">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- show table -->
                    <div class="container">
                        <table id="brandTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Brand ID</th>
                                    <th>Brand</th>
                                    <th>Date created</th>
                                    <th>Date updated</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- category tab -->
                <div class="tab-pane fade" id="nav-category" role="tabpanel" aria-labelledby="nav-category-tab">
                    <br>
                    <div class="d-flex justify-content-center gap-3">
                        <!-- edit category -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editCategoryModal">Edit</button>
                        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="editCategoryLabel">Edit Shoes Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Edit shoes category in the database</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="categoryID">Category ID</label>
                                        <input type="number" id="categoryID" name="categoryID" class="form-control" maxlength="100" required>
                                        <label for="categoryEdit">Category name</label>
                                        <input type="text" id="categoryEdit" name="categoryEdit" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="editCategory()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- add category -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add</button>
                        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="addCategoryLabel">Add Shoes Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Add shoes category to the datababse</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="categoryIDAdd">Category ID</label>
                                        <input type="number" id="categoryIDAdd" name="categoryIDAdd" class="form-control" maxlength="100" required>
                                        <label for="categoryAdd">Category name</label>
                                        <input type="text" id="categoryAdd" name="categoryAdd" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="addCategory()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- delete category -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Delete</button>
                        <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="deleteBrandLabel">Delete a Shoe Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Delete a shoe category from the database</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="categoryDelete">Category ID</label>
                                        <input type="number" id="categoryDelete" name="categoryDelete" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" name="signup_btn" value="signup_btn" onclick="deleteCategory()">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- show table -->
                    <div class="container">
                        <table id="categoryTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category</th>
                                    <th>Date created</th>
                                    <th>Date updated</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- shoes-gender tab -->
                <div class="tab-pane fade" id="nav-shoes-gender" role="tabpanel" aria-labelledby="nav-shoes-gender-tab">
                    <br>
                    <div class="d-flex justify-content-center gap-3">
                        <!-- edit gender -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editGenderModal">Edit</button>
                        <div class="modal fade" id="editGenderModal" tabindex="-1" aria-labelledby="editGenderLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="editGenderLabel">Edit Shoes Gender</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Edit shoes gender in the database</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="shoesGenderID">Shoes gender ID</label>
                                        <input type="number" id="shoesGenderID" name="shoesGenderID" class="form-control" maxlength="100" required>
                                        <label for="shoesGenderEdit">Shoes gender name</label>
                                        <input type="text" id="shoesGenderEdit" name="shoesGenderEdit" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="editShoesGender()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- add gender -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addGenderModal">Add</button>
                        <div class="modal fade" id="addGenderModal" tabindex="-1" aria-labelledby="addGenderLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="addGenderLabel">Add Shoes Gender</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Add shoes gender to the datababse</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="shoesGenderIDAdd">Shoes gender ID</label>
                                        <input type="number" id="shoesGenderIDAdd" name="shoesGenderIDAdd" class="form-control" maxlength="100" required>
                                        <label for="shoesGenderAdd">Shoes gender name    </label>
                                        <input type="text" id="shoesGenderAdd" name="shoesGenderAdd" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="addShoesGender()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- delete gender -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGenderModal">Delete</button>
                        <div class="modal fade" id="deleteGenderModal" tabindex="-1" aria-labelledby="deleteGenderLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="deleteGenderLabel">Delete a Shoes Gender</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Delete a shoes gender from the database</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="shoesGenderDelete">Shoes gender ID</label>
                                        <input type="text" id="shoesGenderDelete" name="shoesGenderDelete" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" name="signup_btn" value="signup_btn" onclick="deleteShoesGender()">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- show table -->
                    <div class="container">
                        <table id="genderTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Shoes gender id</th>
                                    <th>Gender</th>
                                    <th>Date created</th>
                                    <th>Date updated</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- status tab -->
                <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                    <br>
                    <div class="d-flex justify-content-center gap-3">
                        <!-- edit Status -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editStatusModal">Edit</button>
                        <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="editStatusLabel">Edit Status</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Edit status in the database</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="statusID">Status ID</label>
                                        <input type="number" id="statusID" name="statusID" class="form-control" maxlength="100" required>
                                        <label for="statusEdit">Status name</label>
                                        <input type="text" id="statusEdit" name="statusEdit" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="editStatus()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- add Status -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addStatusModal">Add</button>
                        <div class="modal fade" id="addStatusModal" tabindex="-1" aria-labelledby="addStatusLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="addBrandLabel">Add Status</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Add status to the datababse</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="statusIDAdd">Status ID</label>
                                        <input type="number" id="statusIDAdd" name="statusIDAdd" class="form-control" maxlength="100" required>
                                        <label for="statusAdd">Status name    </label>
                                        <input type="text" id="statusAdd" name="statusAdd" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="addStatus()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- delete Status -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStatusModal">Delete</button>
                        <div class="modal fade" id="deleteStatusModal" tabindex="-1" aria-labelledby="deleteStatusLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="deleteStatusLabel">Delete a Status</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Delete a status from the database</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="statusDelete">Status ID</label>
                                        <input type="text" id="statusDelete" name="statusDelete" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" name="signup_btn" value="signup_btn" onclick="deleteStatus()">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- show table -->
                    <div class="container">
                        <table id="statusTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Status id</th>
                                    <th>Status</th>
                                    <th>Date created</th>
                                    <th>Date updated</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- roles tab -->
                <div class="tab-pane fade" id="nav-roles" role="tabpanel" aria-labelledby="nav-roles-tab">
                    <br>
                    <div class="d-flex justify-content-center gap-3">
                        <!-- edit roles -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editRolesModal">Edit</button>
                        <div class="modal fade" id="editRolesModal" tabindex="-1" aria-labelledby="editRolesLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="editRolesLabel">Edit User Roles</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Edit user roles in the database</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="userRolesID">User  Roles ID</label>
                                        <input type="number" id="userRolesID" name="userRolesID" class="form-control" maxlength="100" required>
                                        <label for="userRolesEdit">User Roles name</label>
                                        <input type="text" id="userRolesEdit" name="userRolesEdit" class="form-control" maxlength="100" required>
                                        <label for="userRolesDesc">User roles description    </label>
                                        <input type="text" id="userRolesDesc" name="userRolesDesc" class="form-control" maxlength="250" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="editRoles()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- add Roles -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addRolesModal">Add</button>
                        <div class="modal fade" id="addRolesModal" tabindex="-1" aria-labelledby="addRolesLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="addRolesLabel">Add User Roles</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Add user roles to the datababse</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="userRolesIDAdd">User Roles ID</label>
                                        <input type="number" id="userRolesIDAdd" name="userRolesIDAdd" class="form-control" maxlength="100" required>
                                        <label for="userRolesAdd">User roles name    </label>
                                        <input type="text" id="userRolesAdd" name="userRolesAdd" class="form-control" maxlength="250" required>
                                        <label for="userRolesDescAdd">User roles description    </label>
                                        <input type="text" id="userRolesDescAdd" name="userRolesDescAdd" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="addRoles()">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- delete Roles -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRolesModal">Delete</button>
                        <div class="modal fade" id="deleteRolesModal" tabindex="-1" aria-labelledby="deleteRolesLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="deleteRolesLabel">Delete a User Role</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <h2 class="text-center mb-3">Delete a user role from the database</h2>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label for="userRolesDelete">User Roles ID</label>
                                        <input type="number" id="userRolesDelete" name="userRolesDelete" class="form-control" maxlength="100" required>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" name="signup_btn" value="signup_btn" onclick="deleteRoles()">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- show table -->
                    <div class="container">
                        <table id="rolesTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Roles id</th>
                                    <th>Roles</th>
                                    <th>Description</th>
                                    <th>Date created</th>
                                    <th>Date updated</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- end of tabs -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="../assets/swal/sweetalert2.min.js"></script>
    <script src="AdminPage.js"></script>
    <script src="../includes/logic/manageDBMiddleware.js"></script>
    <script src="../includes/logic/fetchManageDBMiddleware.js"></script>
</body>

</html>