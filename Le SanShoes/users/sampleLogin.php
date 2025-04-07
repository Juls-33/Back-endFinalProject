
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>UserAccounts - Login</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <!-- Custome styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form>
                <h2 class="text-center">Login</h2>
                <hr>
                <div class="form-group <?php echo isset($errors['username']) ? 'has-error' : '' ?>">
                    <label class="control-label">Username or Email</label>
                    <input type="text" name="username" id="password" value="<?php echo $username; ?>" class="form-control">
                    <?php if (isset($errors['username'])): ?>
                    <span class="help-block"><?php echo $errors['username'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                    <label class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <?php if (isset($errors['password'])): ?>
                    <span class="help-block"><?php echo $errors['password'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <button type="submit" name="login_btn" class="btn btn-success">Login</button>
                </div>
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                </form>
            </div>
            </div>
        </div>
    </div>
    </body>
 </html>