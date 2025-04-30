<div class="form-floating">
                                    <select class="form-select" id="technologySelect" aria-label="Select Technology">
                                        <option selected>Open this select menu</option>
                                        <?= getOptions($conn, 'technology_tbl', 'technology_id', 'technology_name'); ?>
                                    </select>
                                    <label for="technologySelect">Select a Technology</label>
                                </div>