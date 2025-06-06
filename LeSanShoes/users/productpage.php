<?php session_start();
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
    
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">

    <link rel="stylesheet" href="productpage.css">
    <link rel="stylesheet" href="../header-footer/header-footer.css">
    <link rel="stylesheet" href="userTest.css">
    
</head>
<body>

<!-- Header -->
<?php include('../header-footer/header.php'); ?>

<!-- Main Body (Display Dynamic Product Details Here)-->
<main id="mainpart"></main>

<!-- Modals -->
    <div class="modal fade modal-fullscreen" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center position-relative">
                    <button class="btn btn-secondary nav-buttons prev-btn" onclick="changeImage(-1)">&#10094;</button>
                    <div id="modalImage" class="img-zoom" 
                         style="height: 80vh; background-size: cover; background-position: center;" 
                         onmousemove="zoom(event, this)"
                         onmouseleave="resetZoom(this)"
                         onmouseenter="this.style.backgroundSize = '150%'">
                    </div>
                    <button class="btn btn-secondary nav-buttons next-btn" onclick="changeImage(1)">&#10095;</button>
                    <div class="thumbnail-list" id="thumbnailList"></div>
                </div>
            </div>
        </div>
    </div>

<!-- On click add to cart -->
<div class="modal fade" id="addCartModal" tabindex="-1" aria-labelledby="addCartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCartModalLabel"><i class="bi bi-cart-check"></i> Item Added to Cart</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <!-- <img src="user-homepage/images/pdimg/kai1.jpg" alt="Product" id="img" class="img-fluid rounded"> -->
                        <img id="cart-product-img" src="" alt="Product Image" class="img-fluid mb-3">
                    </div>
                    <div class="col-md-4">
                        <h5 id="cart-product-name"></h5>
                        <p id="cart-product-price"></p>
                        <p>Size: <span id="selected-size"></span></p>
                        <p>Quantity: <span id="selected-qty"></span></p>
                        <p>Total: <span id="cart-total-price"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Continue Shopping</button>
                <!-- <a href="cart.html" type="button" class="btn btn-primary">View Cart</a> -->
            </div>
        </div>
    </div>
</div>
<!-- end of onclick add to cart -->

<!-- Size chart modal -->
<div class="modal fade" id="sizeChartModal" tabindex="-1" aria-labelledby="sizeChartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sizeChartModalLabel"><i class="material-icons me-2">straighten</i>Size Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3" id="scModalBody">
                <h4>Men's Size</h4>
                <div class="table-responsive modal-table-container">
                    <table class="table table-bordered mb-4">
                        <tr>
                            <th>US</th>
                            <td>6.5</td><td>7</td><td>7.5</td><td>8</td><td>8.5</td><td>9</td><td>9.5</td><td>10</td><td>10.5</td><td>11</td><td>11.5</td><td>12</td>
                        </tr>
                        <tr>
                            <th>EUR</th>
                            <td>39</td><td>40</td><td>40.5</td><td>41</td><td>42</td><td>42.5</td><td>43</td><td>44</td><td>44.5</td><td>45</td><td>46</td><td>46.5</td>
                        </tr>
                        <tr>
                            <th>Foot Length (in)</th>
                            <td>9.5</td><td>9.7</td><td>9.9</td><td>10</td><td>10.2</td><td>10.4</td><td>10.5</td><td>10.7</td><td>10.9</td><td>11.0</td><td>11.2</td><td>11.4</td>
                        </tr>
                        <tr>
                            <th>Foot Length (cm)</th>
                            <td>24.2</td><td>24.7</td><td>25.1</td><td>25.5</td><td>25.9</td><td>26.3</td><td>26.8</td><td>27.2</td><td>27.6</td><td>28.0</td><td>28.4</td><td>28.8</td>
                        </tr>
                    </table>
                </div>
            
                <h4>Women's Size</h4>
                <div class="table-responsive modal-table-container">
                    <table class="table table-bordered">
                        <tr>
                            <th>US</th>
                            <td>6</td><td>6.5</td><td>7 </td><td>7.5</td><td>8</td><td>8.5</td><td>9</td><td>9.5</td><td>10</td><td>10.5</td>
                        </tr>
                        <tr>
                            <th>EUR</th>
                            <td>36.5</td><td>37.5</td><td>38</td><td>38.5</td><td>39</td><td>40</td><td>40.5</td><td>41</td><td>41.5</td><td>42</td>
                        </tr>
                        <tr>
                            <th>Foot Length (in)</th>
                            <td>9.0</td><td>9.2</td><td>9.4</td><td>9.5</td><td>9.7</td><td>9.9</td><td>10.1</td><td>10.3</td><td>10.5</td><td>10.7</td>
                        </tr>
                        <tr>
                            <th>Foot Length (cm)</th>
                            <td>23.0</td><td>23.4</td><td>23.8</td><td>24.2</td><td>24.6</td><td>25.0</td><td>25.4</td><td>25.8</td><td>26.2</td><td>26.6</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end of size chart modal -->

<?php include('modals.php'); ?>
<?php include('../header-footer/footer.php'); ?>

<script>
    
function updateCartFooter(isEmpty) {
        const footer = document.getElementById('cartFooter');
        footer.style.display = isEmpty ? 'none' : 'flex';
    }

// document.addEventListener('DOMContentLoaded', function() {
//     const modal = new bootstrap.Modal('#addCartModal');
    
//     document.querySelector('.addtoCart').addEventListener('click', () => {
//         const selectedSize = document.querySelector('input[name="options-size"]:checked')?.nextElementSibling?.textContent || '';
//         document.getElementById('selected-size').textContent = selectedSize;
//         modal.show();
//     });
// });  
// document.querySelector('.material-symbols-outlined:last-child').addEventListener('click', () => {
//     const modal = new bootstrap.Modal(document.getElementById('cartModal'));
//     updateCart();
//     modal.show();
// });


</script>
<script src="ppageMiddleware.js"></script>
<script src="editUserMiddleware.js"></script>
<script src="orderDetailsMiddleware.js"></script>
</body>
</html>