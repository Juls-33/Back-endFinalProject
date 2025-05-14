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
     <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
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
                <li class="sidebar-item active-nav">
                    <a href="#" class="sidebar-link">
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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">User Management</li>
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
                <h1>User Management</h1>
                <p>Add and delete administrator accounts and manage customer accounts</p>
            </div>
            <div class="d-flex justify-content-end gap-3">
                <!-- Add Super Admin Modal -->
                 <!-- first modal -->
                 <div class="modal fade" id="newSuperAdmin1" aria-hidden="true" aria-labelledby="newSuperAdmin1ToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="newSuperAdmin1ToggleLabel">Add a new super admin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearInput()"></button>
                        </div>
                        <div class="modal-body">
                            Enter an existing admin username
                            <hr>
                            <div class="form-group mb-3">
                                <label>Username</label>
                                <!-- <input type="text" id="newSuperAdmin" name="newSuperAdmin" class="form-control" maxlength="100" required> -->
                                <div class="form-floating">
                                    <select class="form-select dynamic-admin-select" data-role="admin" id="newSuperAdmin" name="newSuperAdmin" aria-label="Select an admin" required>
                                        <option value="" disabled selected>Open this select menu</option>
                                        
                                    </select>
                                    <label for="newSuperAdmin">Select an admin</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearInput()">Close</button>
                            <button class="btn btn-success"   onclick="newSuperAdmin()">Update Super Admin</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- secondmodal -->
                    <div class="modal fade" id="newSuperAdmin2" aria-hidden="true" aria-labelledby="newSuperAdmin2ToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="newSuperAdmin2ToggleLabel">Delete an administrator</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearInput()"></button>
                        </div>
                        <div class="modal-body">
                            Please enter your password to add a new super admin
                            <hr>
                            <div class="form-group mb-3">
                                <label for="adminPassword">Password</label>
                                <input type="password" id="adminPassword" name="adminPassword" class="form-control" maxlength="100" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#deleteAdmin1" data-bs-toggle="modal">Cancel</button>
                            <button class="btn btn-success" onclick="confirmAddSuperAdmin()">Confirm</button>
                        </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-secondary" data-bs-target="#newSuperAdmin1" data-bs-toggle="modal">Add New Super Admin</button>
                <!-- end of new super admin modal -->
                <!-- Delete a Super Admin Modal -->
                 <!-- first modal -->
                 <div class="modal fade" id="deleteSuperAdmin1" aria-hidden="true" aria-labelledby="deleteSuperAdmin1ToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteSuperAdmin1ToggleLabel">Remove a super admin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearInput()"></button>
                        </div>
                        <div class="modal-body">
                            Enter the username to remove
                            <hr>
                            <div class="form-group mb-3">
                                <label for="deleteSuperAdmin">Username</label>
                                <!-- <input type="text" id="deleteSuperAdmin" name="deleteSuperAdmin" class="form-control" maxlength="100" required> -->
                                <div class="form-floating">
                                    <select class="form-select dynamic-admin-select" data-role="superadmin" id="deleteSuperAdmin" name="deleteSuperAdmin" aria-label="Select an admin" required>
                                        <option value="" disabled selected>Open this select menu</option>
                                        
                                    </select>
                                    <label for="deleteSuperAdmin">Select an admin</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearInput()">Close</button>
                            <button class="btn btn-danger"   onclick="deleteSuperAdmin()">Remove Super Admin</button>
                            <!-- data-bs-target="#deleteAdmin2" data-bs-toggle="modal"-->
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- secondmodal -->
                    <div class="modal fade" id="deleteSuperAdmin2" aria-hidden="true" aria-labelledby="deleteSuperAdmin2ToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteSuperAdmin2ToggleLabel">Remove a super admin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearInput()"></button>
                        </div>
                        <div class="modal-body">
                            Please enter your password to remove a super admin
                            <hr>
                            <div class="form-group mb-3">
                                <label for="delSuperAdminPass">Password</label>
                                <input type="password" id="delSuperAdminPass" name="delSuperAdminPass" class="form-control" maxlength="100" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#deleteAdmin1" data-bs-toggle="modal">Cancel</button>
                            <button class="btn btn-danger" onclick="confirmDeleteSuperAdmin()">Confirm</button>
                        </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger" data-bs-target="#deleteSuperAdmin1" data-bs-toggle="modal">Remove a Super Admin</button>
                <!-- end of delete modal -->
                <!-- start of edit modal -->
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editAdminModal">Edit Admin Details</button>
                <div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="editModalLabel">Edit Admin Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form>
                            <h2 class="text-center mb-3">Edit details</h2>
                            <hr>
                            <div class="form-group mb-3">
                                <label for="usernameEdit">Username</label>
                                <!-- <input type="text" id="usernameEdit" name="usernameEdit" class="form-control" maxlength="100" required> -->
                                <div class="form-floating">
                                    <select class="form-select dynamic-admin-select" data-role="all" id="usernameEdit" name="usernameEdit" aria-label="Select an admin" required>
                                        <option value="" disabled selected>Open this select menu</option>
                                        
                                    </select>
                                    <label for="usernameEdit">Select an admin</label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="updateUsername">Update username</label>
                                <input type="text" id="updateUsername" name="updateUsername" class="form-control" maxlength="100" required>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="fnameEdit">First name</label>
                                    <input type="text" id="fnameEdit" name="fnameEdit" placeholder="Enter your firstname" class="form-control" required>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="lnameEdit">Last name</label>
                                    <input type="text" id="lnameEdit" name="lnameEdit" placeholder="Enter your lastname" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="emailEdit">Email Address</label>
                                <input type="email" id="emailEdit" name="emailEdit" class="form-control" maxlength="100" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="passwordEdit">Edit new password</label>
                                <input type="password" id="passwordEdit" name="passwordEdit" class="form-control"  maxlength="100" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="passwordConfEdit">Confirm new password</label>
                                <input type="password" id="passwordConfEdit" name="passwordConfEdit" class="form-control"   maxlength="100" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="contactEdit">Contact Number</label>
                                <input type="number" id="contactEdit" name="contactEdit" class="form-control" min="0" pattern="\d{11}" maxlength="11" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==11) return false;" required>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="editAdmin()">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- New Admin Modal -->
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#newAdminModal">Add New Admin</button>
                <div class="modal fade" id="newAdminModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="newModalLabel">Create new admin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form id="newAdminForm">
                            <h2 class="text-center mb-3">New Admin</h2>
                            <hr>
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control" maxlength="100" required>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="fname">First name</label>
                                    <input type="text" id="fname" name="fname" placeholder="Enter your firstname" class="form-control" maxlength="100" required>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="lname">Last name</label>
                                    <input type="text" id="lname" name="lname" placeholder="Enter your lastname" class="form-control" maxlength="100" required>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" maxlength="100" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" minlength="8" maxlength="100" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="passwordConf">Password confirmation</label>
                                <input type="password" id="passwordConf" name="passwordConf" class="form-control" minlength="8" maxlength="100" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="contact">Contact Number</label>
                                <input type="number" id="contact" name="contact" class="form-control" min="0"  maxlength="11" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==11) return false;" required>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="signUp()">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Delete Admin Modal -->
                 <!-- first modal -->
                <div class="modal fade" id="deleteAdmin1" aria-hidden="true" aria-labelledby="deleteAdmin1ToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteAdmin1ToggleLabel">Delete an administrator</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearInput()"></button>
                        </div>
                        <div class="modal-body">
                            Select the admin to delete
                            <p class="text-danger">Before deleting a super admin, they must first be demoted to an admin.</p>
                            <hr>
                            <div class="form-group mb-3">
                                <label for="deleteUsername">Username</label>
                                <div class="form-floating">
                                    <select class="form-select dynamic-admin-select" id="deleteUsername" data-role="admin" name="deleteUsername" aria-label="Select an admin to delete" required>
                                        <option value="" disabled selected>Open this select menu</option>
                                        
                                    </select>
                                    <label for="deleteUsername">Select an admin to delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearInput()">Close</button>
                            <button class="btn btn-danger"   onclick="deleteAdmin()">Delete Administrator</button>
                            <!-- data-bs-target="#deleteAdmin2" data-bs-toggle="modal"-->
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- secondmodal -->
                    <div class="modal fade" id="deleteAdmin2" aria-hidden="true" aria-labelledby="deleteAdmin2ToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteAdmin2ToggleLabel">Delete an administrator</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearInput()"></button>
                        </div>
                        <div class="modal-body">
                            Please enter your password to delete the administrator
                            <hr>
                            <div class="form-group mb-3">
                                <label for="delAdminPassword">Password</label>
                                <input type="password" id="delAdminPassword" name="delAdminPassword" class="form-control" maxlength="100" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#deleteAdmin1" data-bs-toggle="modal">Cancel</button>
                            <button class="btn btn-danger" onclick="confirmDelete()">Confirm</button>
                        </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger" data-bs-target="#deleteAdmin1" data-bs-toggle="modal">Delete Admin</button>
                <!-- end of delete modal -->
            </div>
            
            <!-- Navbar table -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Admin Accounts</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">User Accounts</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="container">
                        <table id="adminTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Full name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Contact</th>
                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th>Last Login</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <!-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> -->
                        <div class="container">
                            <table id="usersTable" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Birthday</th>
                                        <th>User address</th>
                                        <th>Contact</th>
                                        <th>Date Created</th>
                                        <th>Date Updated</th>
                                        <th>Last Login</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="../assets/swal/sweetalert2.min.js"></script>
    <script src="../includes/logic/AdminPage.js"></script>
    <script src="../includes/logic/newAdminMiddleware.js"></script>
</body>

</html>