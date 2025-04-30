                        <div class="modal-body">
                            <!-- FORM -->
                            <form id="addShoeForm">
                                <h2 class="text-center mb-3">New Admin</h2>
                                <hr>
                                <div class="form-group mb-3">
                                    <label for="model_name">Model Name:</label>
                                    <input type="text" id="model_name" name="model_name" class="form-control" maxlength="100" required>
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
                                    <textarea name="description" id="description" name="description" class="form-control" rows="5" cols="40" required></textarea><br>
                                </div> 

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" name="signup_btn" value="signup_btn" onclick="newShoeModel()">Save changes</button>
                        </div>
