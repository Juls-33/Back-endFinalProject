<!-- cart-modal.php -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="cartModalBody">
                <div id="cartItems">
                    <div class="card mb-3" style="max-width: fit-content;">
                        <div class="row g-0">
                            <div class="col-md-4" style="padding-left: 10px;">
                                <img src="user-homepage/images/pdimg/kai1.jpg" class="img-fluid rounded-start" alt="Nike V2K Run" style="object-fit: contain;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Kaiju 1</h5>
                                    <p class="card-text">Men's Shoes</p>
                                    <p class="card-text">
                                        <small class="text-muted">Vintage Green/Mineral Spruce/Wolf Grey/Vintage Green</small>
                                    </p>
                                    <div class="dropdown mb-2">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="sizeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            Size: US 10
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="sizeDropdown">
                                            <li><a class="dropdown-item" href="#">US 9.5</a></li>
                                            <li><a class="dropdown-item" href="#">US 9</a></li>
                                            <li><a class="dropdown-item" href="#">US 8.5</a></li>
                                            <li><a class="dropdown-item" href="#">US 8</a></li>
                                        </ul>
                                    </div>
                                    <p class="card-text"><strong>₱6,895.00</strong></p>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-outline-secondary me-2">-</button>
                                        <span>1</span>
                                        <button class="btn btn-outline-secondary ms-2">+</button>
                                        <button class="btn btn-outline-danger ms-2">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Additional items will be loaded dynamically -->
                </div>
            </div>
            <div id="cartFooter" class="modal-footer d-flex justify-content-between" style="display: none;">
                <hr>
                <p><strong>Subtotal: <span id="cartSubtotal">₱0.00</span></strong></p>
                <button id="checkoutBtn" class="btn btn-danger">Checkout</button>
            </div>
        </div>
    </div>
</div>
