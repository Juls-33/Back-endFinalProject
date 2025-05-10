<?php
    session_start();
    include("sales_perDay.php");

    ob_start();
    include('get_inventoryCount.php');
    $inventoryCount = ob_get_clean();

    ob_start();
    include('get_pendingOrders.php');
    $pendingCount = ob_get_clean();

    ob_start();
    include('get_completedOrders.php');
    $completedCount = ob_get_clean();
    
    $sql = "INSERT INTO sales_tbl (date, amount) VALUES ('2025-06-05', 100.00), ('2025-06-06', 150.00), ('2025-06-07', 200.00)"; 
    if ($conn->query($sql) === TRUE) {
        echo "New Record Created Successfully";
    } else {
        echo "Error: " . $conn->error; 
    }

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
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/AdminPage.css">
    <link rel="stylesheet" href="../assets/css/CustomAdminPage.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
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
                <li class="sidebar-item active-nav">
                    <a href="#" class="sidebar-link">
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
                <li class="sidebar-item">
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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
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
                <h1>Dashboard</h1>
                <p>Quickly view financial metrics, customer insights, product performance, and current orders</p>
            </div>

            <div class="container-fluid pt-3">
                <div class="row removable">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="material-symbols-outlined" style="font-size: 50px; height: 40px; align-items: center">universal_currency_alt</span>
                                    <div class="text-end">
                                      <p class="text-sm mb-0">Total Sales</p>
                                      <h4 class="mb-0">Php 50,000</h4>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="material-symbols-outlined" style="font-size: 50px; height: 40px; align-items: center">check_circle</span>
                                    <div class="text-end">
                                      <p class="text-sm mb-0">Completed Orders</p>
                                      <h4 class="mb-0"><?php echo htmlspecialchars($completedCount); ?> Orders</h4>
                                    </div>
                                </div>     
                            </div>
                        </div>  
                    </div>
                    
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="material-symbols-outlined" style="font-size: 50px; height: 40px; align-items: center">pending_actions</span>
                                    <div class="text-end">
                                      <p class="text-sm mb-0">Pending Orders</p>
                                      <h4 class="mb-0"><?php echo htmlspecialchars($pendingCount); ?> Orders</h4>
                                    </div>
                                </div>     
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="material-symbols-outlined" style="font-size: 50px; height: 40px; align-items: center">inventory</span>
                                    <div class="text-end">
                                      <p class="text-sm mb-0">Inventory</p>
                                      <h4 class="mb-0"><?php echo htmlspecialchars($inventoryCount); ?> Items</h4>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            
            <div class="container-fluid pt-3">
                <div class="row removable">
                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0">Sales Per Day</p>
                                    <!-- <a href="#" class="text-decoration-none small">View the Number of Sales Per Day</a> -->
                                </div>
                            </div>
                            <div class="chart-container">
                                <canvas id="salesPerDayChart"></canvas>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0">Sales Per Month</p>
                                    <!-- <a href="#" class="text-decoration-none small">View the Number of Sales Per Month</a> -->
                                </div>
                            </div>
                            <div class="chart-container">
                                <canvas id="salesPerMonthChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="container-fluid pt-3"> 
                <div class="row removable">
                    <div class="col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0">Sales Per Quarter</p>
                                    <!-- <a href="#" class="text-decoration-none small">View the Number of Sales Per Month</a> -->
                                </div>
                            </div>
                            <div class="card-body pb-0 p-3 mt-1">
                                <div class="chart-container">
                                    <canvas id="salesPerQuarterChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0">Sales Per Year</p>
                                    <!-- <a href="#" class="text-decoration-none small">View the Number of Sales Per Month</a> -->
                                </div>
                            </div>
                            <div class="card-body pb-0 p-3 mt-1">
                                <div class="chart-container">
                                    <canvas id="salesPerYearChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-3">
                <div class="row removable">
                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0">Today's Online Users And Admins</p>
                                </div>
                            </div>
                            <div class="card-body pb-0 p-3 mt-1">
                                <div class="row"> 
                                    <p class="text-sm mb-4">Registered Users</p>
                                    <p class="display-4 fw-bold" id="todayUsers">0</p>
                                </div>
                                <br>
                                <hr class="dark horizontal my-0">
                            </div>
                            <div class="card-body pb-0 p-3 mt-1">
                                <div class="row"> 
                                    <p class="text-sm mb-4">Registered Admins</p>
                                    <p class="display-4 fw-bold" id="todayAdmins">0</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="text-end pt-1">
                                    <h5 class="text-sm mb-4">Top Selling Products Per Day</h5>
                                </div>
                            </div>
                            <div class="card-body pb-4 p-3 mt-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">An item</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                    <li class="list-group-item">A third item</li>
                                  </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-3">
                <div class="row removable">
                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="text-end pt-1">
                                    <h5 class="text-sm mb-4">Top Selling Products Per Month</h5>
                                </div>
                            </div>
                            <div class="card-body pb-4 p-3 mt-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">An item</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                    <li class="list-group-item">A third item</li>
                                  </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 pt-2">
                                <div class="text-end pt-1">
                                    <h5 class="text-sm mb-4">Top Selling Products Per Year</h5>
                                </div>
                            </div>
                            <div class="card-body pb-4 p-3 mt-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">An item</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                    <li class="list-group-item">A third item</li>
                                  </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Orders Overview</span>
                            <a href="#" class="text-decoration-none small">View the Unfulfilled Orders</a>
                        </div>

                        <div class="card-body pt-3">
                            <div class="d-flex overflow-auto px-3" style="gap: 1.5rem;">
                                <!-- Mini Card -->
                                <div class="card text-center flex-shrink-0" style="width: 140px; height: 140px;">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                                        <h6 class="mb-1">Pending</h6>
                                    <p class="mb-0 text-muted">3 Orders</p>
                                </div>
                            </div>

                            <!-- Mini Card -->
                            <div class="card text-center flex-shrink-0" style="width: 140px; height: 140px;">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                                    <h6 class="mb-1">Canceled</h6>
                                    <p class="mb-0 text-muted">2 Orders</p>
                                </div>
                            </div>

                            <!-- Mini Card -->
                            <div class="card text-center flex-shrink-0" style="width: 140px; height: 140px;">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                                    <h6 class="mb-1">Processing</h6>
                                    <p class="mb-0 text-muted">5 Orders</p>
                                </div>
                            </div>

                            <!-- Mini Card -->
                            <div class="card text-center flex-shrink-0" style="width: 140px; height: 140px;">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                                    <h6 class="mb-1">Completed</h6>
                                    <p class="mb-0 text-muted">10 Orders</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>   
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    fetch('sales_perDay.php')
        .then(response => response.json())
        .then(json => {
            const actions = document.getElementById('salesPerDayChart').getContext('2d');
            const salesPerDayChart = new Chart(actions, {
                type: 'line',
                data: {
                    labels: json.labels,
                    datasets: [{
                        label: 'Sales Per Day',
                        data: json.data,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.4,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, 
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            }); 
        }); 
        </script>

    <script>
        // Fetch pending orders
        fetch('pending_orders.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('pendingCount').textContent = data;
        });

        // Fetch completed orders
        fetch('completed_orders.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('completedCount').textContent = data;
        });
  </script>

    <script>
        fetch('roles.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('todayAdmins').textContent = data['Admin'] || 0;
                document.getElementById('todayUsers').textContent = data['User'] || 0;
            });
    </script>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <script src="../includes/logic/AdminPage.js"></script>
</body>
</html>