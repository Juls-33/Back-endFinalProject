
<header>
    <div class="ad">
        <div class="ad-text">
            <h2>Limited Time Offer 20% off for All Shoes! Contact Us Now</h2>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="logo-class">
                    <img src="../assets/images/sanshoes logo.png" alt="Bootstrap" width="100" height="100">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="../users/index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../users/products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                </ul>
                <div class="d-lg-flex flex-lg-row align-items-center gap-2">
                    <span class="material-symbols-outlined d-none d-lg-inline cursor-pointer" style="cursor:pointer; pointer-events: auto;" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" title="View Orders">
                        receipt_long
                    </span>
                    <div class="d-flex d-lg-none align-items-center mb-2">
                      <span class="icon-text d-inline d-lg-none cursor-pointer" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
                          View Orders
                      </span>
                    </div>
                    <span class="material-symbols-outlined d-none d-lg-inline cursor-pointer" style="cursor:pointer; pointer-events: auto;" id="openCartBtn" data-bs-toggle="modal" data-bs-target="#cartModal" title="View Cart">
                        shopping_cart
                    </span>
                    <div class="d-flex d-lg-none align-items-center mb-2">
                      <span class="icon-text d-inline d-lg-none cursor-pointer" id="openCartBtn" data-bs-toggle="modal" data-bs-target="#cartModal">Cart</span>
                    </div>
                    <div class="dropdown mb-1">
                        <div class="d-flex align-items-center" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Profile">
                            <span class="material-symbols-outlined d-none d-lg-inline">account_circle</span>
                            <span class="icon-text d-inline d-lg-none">User  Account</span>
                        </div>
                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <?php if (isset($_SESSION["username"])): ?>
                        <li class="dropdown-item text-muted">Hello, <?php echo htmlspecialchars($_SESSION["username"]); ?></li>
                         <li><hr class="dropdown-divider"></li>
                         <li> <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editUserModal">
                        Edit Profile</a> </li>

                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../userAuth/logoutUser.php">Logout</a></li>
                        <?php else: ?>
                        <li><a class="dropdown-item" href="../userAuth/login.php">Login</a></li>
                       <?php endif; ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
