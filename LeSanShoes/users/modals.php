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
                    <div class="card mb-3">
                        <div class="row g-0">
                            <p>You must <a href="../userAuth/login.php">log in</a> first to view your cart.</p>
                        </div>
                    </div>
                    <!-- Additional items can be added here -->
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

<!-- login modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userModalLabel">User Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <?php if (isset($_SESSION["username"])): ?>
            <p>You are logged in as <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></p>
            <a href="../userAuth/logoutUser.php" class="btn btn-danger">Logout</a>
          <?php else: ?>
            <p>You are not logged in.</p>
            <a href="../userAuth/login.php" class="btn btn-primary">Login</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- view orders modal -->
   <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="orderDetailsContent">
        
      </div>
    </div>
  </div>
</div>
