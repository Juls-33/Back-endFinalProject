<?php
include("../includes/logic/config.php");
$username = $_SESSION['username']; 

// Prepare the SQL statement to avoid SQL injection
$stmt = $conn->prepare("SELECT fname, lname, user_address, contact, email FROM users_tbl WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($fname, $lname, $userAddress, $contact, $email);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title class = "pageTitle">Checkout</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: flex;
    flex-direction: column;

}
html, body {
  overflow-x: hidden;
}

/* Navbar css */
.navbar-brand, .nav-link, .navbar-text {
    color: #B51E1E !important;
    font-weight: bold;
}

img {
    width: 100%;
    height: 100%;
}

.logo-class {
    width: 8rem;
    height: 4rem;
    display: flex;
}

.material-symbols-outlined{
  color: #B51E1E;
  font-size: 3rem;
}

.icon-text {
  color: #B51E1E;
  font-weight: bold;
  font-size: 18px;
}


a{
    text-decoration: none;
    color: #555;
}
p{
    color: #000000;
}
.header{
    border: #B51E1E solid;
}

/* Main css */
main{
    padding-left: 13vw;
    padding-right: 13vw;
    margin-top: 3vh;
    margin-bottom: 8vh;
}
h2{
    padding-bottom: 2vh;
}
h4{
    margin-top: 20px;
}

.img-fluid {
    width: 60px; /* Set the width of product image */
    height: auto; /* Keep the aspect ratio */
    margin-right: 10px; /* Spacing between image and text */
}
.list-group-item {
    display: flex; /* Flex layout for alignment */
    align-items: center; /* Center items vertically */
}

.scrollable-col{
    max-height: 80vh;
    overflow-y: auto;
    scrollbar-width: none;
}

.mt-3 {
    margin-top: 1rem; /* Adjust margin as needed */
}

.btn-link {
    text-decoration: none; /* Remove link underline */
    color: black; /* Adjust color for the link */
    font-weight: 500; /* Font weight adjustment */
    padding-left: 0;
}

.btn-primary {
    background-color: black; /* Set button background to black */
    color: white; /* Set text color to white */
    padding: 0.5rem 1rem; /* Adjust padding for button */
}

.d-flex {
    display: flex; /* Enable flexbox */
}

.justify-content-between {
    justify-content: space-between; /* Space elements evenly */
    width: 100%; /* Ensure full width */
}
</style>
</head>
<body>

<!-- Header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <div class="logo-class">
            <img src="LeSanShoes/assets/images/sanshoes logo.png" alt="Bootstrap" width="100" height="100">
            </div>
        </a>
        <div class="d-lg-flex flex-lg-row align-items-center gap-2">
            <!-- temporary login and logout -->
            <div><a href="../userAuth/login.php">Login</a></div>
            <p>Username: <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'Not set'; ?></p>
            <a href="../userAuth/logoutUser.php">Logout</a>
            <!-- end of temporary login and logout -->
            <div class="mb-2">
              <span class="material-symbols-outlined d-none d-lg-inline">account_circle</span>
              <span class="icon-text d-inline d-lg-none">User Account</span>
            </div>
            <!-- <div>
                <span class="material-symbols-outlined d-none d-lg-inline" data-bs-toggle="modal" data-bs-target="#cartModal">shopping_cart</span>
                <span class="icon-text d-inline d-lg-none" data-bs-toggle="modal" data-bs-target="#cartModal">Cart</span>
            </div> -->
        </div>
        </div>
    </nav>
</header>

<!-- Main Body -->
<main>
    <div class="container-fluid">
        <h2 class="text-center">Checkout</h2>
        <div class="row row-cols-lg-2 g-5">
            <div class="scrollable-col">
                <h4>Contact</h4>
                <p><?= htmlspecialchars($fname) ?> <?= htmlspecialchars($lname) ?> (<?= htmlspecialchars($email) ?>)</p>
                <!-- <a href="#" class="btn btn-link">Log out</a> -->

                <h3>Delivery method</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="deliveryMethod" id="ship" value="ship" checked>
                    <label class="form-check-label" for="ship">Ship</label>
                </div>

                <h3 class="mt-4">Shipping</h3>

                <div class="address-form-fields">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" value="<?= htmlspecialchars($fname) ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" value="<?= htmlspecialchars($lname) ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <select class="form-control" id="addressInfo">
                            <option>Enter new address</option>
                            <option>Use current address</option>
                        </select>
                    </div>

                    <!-- Use block display if this should be visible when selecting current address -->
                    <input type="text" id="savedAddressInput" class="form-control mt-2" value="<?= htmlspecialchars($userAddress) ?>" readonly style="display: block;">
                    <input type="text" id="newAddressInput" class="form-control mt-2" placeholder="Enter your address" style="display: none;">

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" value="<?= htmlspecialchars($contact) ?>">
                    </div>
                </div>
                
                <div class="mt-3 d-flex justify-content-between">
                    <a href="index.php" class="btn btn-link">< Return to home</a>
                    <button id="placeOrderBtn" class="btn btn-primary">Place Order</button>
                </div>
            </div>

            <div class="col">

                <h4>Order Summary</h4>

                <div class="mt-3">
                    <ul class="list-group" id="checkoutList"></ul>
                    <p>Shipping <span class="float-right">Free</span></p>
                    <h4 class="mt-4">Total: <span class="float-right" id="checkoutTotal"></span></h4>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="text-white text-center text-lg-start w-100" style="width: 100%; background-color: #B51E1E;">
    <div class="p-4" style="max-width: 100%;">
      <div class="d-flex flex-wrap justify-content-around text-start">
        <!-- Column 1 -->
        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <div class="shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto">
            <img src="../assets/images/sanshoes logo white.png" height="70" alt="" loading="lazy" />
          </div>
          <p class="text-center" style="color: white;">Find your perfect pair and step into comfort and style</p>
          <ul class="list-unstyled d-flex justify-content-center">
            <li><a class="text-white px-2" href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a class="text-white px-2" href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a class="text-white px-2" href="#"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
  
        <!-- Column 4 -->
        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <h5 class="text-uppercase mb-4">Contact</h5>
          <ul class="list-unstyled">
            <li><p class="text-white"><i class="fas fa-map-marker-alt pe-2"></i>Warsaw, 57 Street, Poland</p></li>
            <li><p class="text-white"><i class="fas fa-phone pe-2"></i>+ 01 234 567 89</p></li>
            <li><p class="text-white"><i class="fas fa-envelope pe-2 mb-0"></i>contact@example.com</p></li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">LeSanShoes.com</a>
    </div>
</footer>
<script src="orderDetailsMiddleware.js"></script>
</body>
<script>
document.getElementById('addressInfo').addEventListener('change', function() {
    const addressFormFields = document.querySelector('.address-form-fields');
    const savedAddressInput = document.getElementById('savedAddressInput');
    const newAddressInput = document.getElementById('newAddressInput');
    if (this.value === 'Use current address') {
        // Show the saved address preview and readonly input
        savedAddressInput.style.display = 'block';
        newAddressInput.style.display = 'none';
    } else {
        // Hide the saved address preview and readonly input
        savedAddressInput.style.display = 'none';
        newAddressInput.style.display = 'block';
    }
});
// Initialize the state when page loads
window.onload = function() {
    document.getElementById('savedAddressInput').style.display = 'none';
    document.getElementById('newAddressInput').style.display = 'block';
};

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const items = JSON.parse(sessionStorage.getItem('checkoutItems')) || [];
        
        if (items.length === 0) {
            document.getElementById('checkoutList').innerHTML = '<p>No items selected for checkout.</p>';
            return;
        }

        let html = '';
        let subtotal = 0;

        items.forEach(item => {
            subtotal += item.total_price;

            html += `
                <li class="list-group-item d-flex align-items-center">
                    <img src="${item.image1}" alt="${item.model_name}" class="img-fluid me-3" style="width: 80px; height: auto; object-fit: contain;">
                    <div>
                        <p class="mb-1">${item.model_name}</p>
                        <small>${item.size_name} &middot; Qty: ${item.quantity}</small>
                    </div>
                    <span class="ms-auto">₱${item.total_price.toLocaleString()}</span>
                </li>
            `;
        });

        document.getElementById('checkoutList').innerHTML = html;
        document.getElementById('checkoutTotal').innerText = `₱${subtotal.toLocaleString()}`;
    });

    </script>

    <script>
    document.getElementById('placeOrderBtn').addEventListener('click', function () {
        const items = JSON.parse(sessionStorage.getItem('checkoutItems')) || [];
        console.log(items);
        var address = "";
        if (document.getElementById('savedAddressInput').style.display == 'none'){
            if (!document.getElementById('savedAddressInput').value){
                Swal.fire("Warning", "You must enter your address", "warning");
                return;
            }
            address = document.getElementById('newAddressInput').value.trim();
        }else{
            address = document.getElementById('savedAddressInput').value.trim();
        }
        const phone = document.getElementById('phone').value.trim();
        

        if (items.length === 0) {
            Swal.fire("Empty Checkout", "No items to place an order.", "warning");
            return;
        }
        if (!address) {
            Swal.fire("Missing Address", "Please enter a delivery address.", "warning");
            return;
        }
        var formData = {
            action: 'checkout',
            address: address,
            phone: phone,
            items: items
        };
        var jsonString = JSON.stringify(formData);
        this.disabled = true;
        $.ajax({
            url: 'placeOrder.php',
            method: 'POST',
            data: {myJson : jsonString},
            success: function (response) {
                Swal.fire("Order Placed", "Thank you for your purchase!", "success").then(() => {
                    sessionStorage.removeItem('checkoutItems');
                    // alert("done");
                    window.location.href = 'products.php';
                });
            },
            error: function (xhr) {
                Swal.fire("Order Failed", xhr.responseText, "error");
                document.getElementById('placeOrderBtn').disabled = false;
            }
        });
    });
    </script>



</html>