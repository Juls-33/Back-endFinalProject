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


<!-- edit users modal -->
 <!-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editUserModal">EDIT</button> -->
<!-- User Edit Modal HTML -->
<div id="editUserModal" class="modal fade" tabindex="-1" aria-labelledby="editUserModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-btn btn-primary" id="editUserModalLabel">Edit User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="editUserModalCloseBtn"></button>
            </div>

            <div class="modal-body">    
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" id="editUserTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="edit-username-tab" data-bs-toggle="tab" href="#edit-username" role="tab" aria-controls="edit-username" aria-selected="true">Username</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="edit-email-tab" data-bs-toggle="tab" href="#edit-email" role="tab" aria-controls="edit-email" aria-selected="false">Email</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="edit-address-tab" data-bs-toggle="tab" href="#edit-address" role="tab" aria-controls="edit-address" aria-selected="false">Address</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="edit-password-tab" data-bs-toggle="tab" href="#edit-contact" role="tab" aria-controls="edit-contact" aria-selected="false">Contact</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-3">
                    <!-- Username Tab -->
                    <div class="tab-pane fade show active" id="edit-username" role="tabpanel" aria-labelledby="edit-username-tab">
                        <div class="form-group mb-3">
                          <form id="nameForm">
                            <label for="username" class="form-label">First Name</label>
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter new first name" maxlength="100" required>
                            <label for="username" class="form-label">Last Name</label>
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter new last name" maxlength="100" required>
                            <button type="button" class="btn btn-primary" onclick="updateName()">Save Details</button>
                          </form>
                        </div>
                    </div>

                    <!-- Email Tab -->
                    <div class="tab-pane fade" id="edit-email" role="tabpanel" aria-labelledby="edit-email-tab">
                        <div class="form-group mb-3">
                            <form id="emailForm">
                              <label for="username" class="form-label">Email</label>
                              <input type="EMAIL" id="email" name="email" class="form-control" placeholder="Enter new email" maxlength="100" required>
                              <button type="button" class="btn btn-primary" onclick="updateEmail()">Save Details</button>
                            </form>
                        </div>
                    </div>

                    <!-- Address Tab -->
                    <div class="tab-pane fade" id="edit-address" role="tabpanel" aria-labelledby="edit-address-tab">
                        <div class="form-group mb-3">
                            <form id="addressForm">
                              <label for="username" class="form-label">Address</label>
                              <input type="text" id="address" name="address" class="form-control" placeholder="Enter new address" maxlength="250" required>
                              <button type="button" class="btn btn-primary" onclick="updateAddress()">Save Details</button>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Tab -->
                    <div class="tab-pane fade" id="edit-contact" role="tabpanel" aria-labelledby="edit-contact-tab">
                        <div class="form-group mb-3">
                            <form id="contactForm">
                              <label for="username" class="form-label">Contact Number</label>
                              <input type="text" id="contact" name="contact" class="form-control" placeholder="Enter new contact number" maxlength="11" required>
                              <button type="button" class="btn btn-primary" onclick="updateContact()">Save Details</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="editUserModalCloseFooterBtn">Close</button>
            </div>
        </div>
    </div>
</div>