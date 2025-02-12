<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/user.php"); 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/90acc466c7.js" crossorigin="anonymous"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Rubik:wght@600&display=swap" rel="stylesheet" />

    <!-- Ganti CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <title>Register</title>
</head>

<body>
    <!-- Navbar Menu -->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <!-- Navbar Menu END-->

    <div class="auth-content">
        <form action="register.php" method="post" enctype="multipart/form-data">
            <h2 class="form-title">Register</h2>

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

            <div>
                <label>Username</label>
                <input type="Username" name="Username" value="<?php echo $Username ?>" class="text-input" />
            </div>

            <div>
                <label>email</label>
                <input type="email" name="email" value="<?php echo $email ?>" class="text-input" />
            </div>

            <div>
                <label>Password</label>
                <input type="Password" name="Password" value="<?php echo $Password ?>" class="text-input" />
            </div>

            <div>
                <label>Password Confirmation</label>
                <input type="PasswordConf" name="PasswordConf" value="<?php echo $PasswordConf ?>" class="text-input" />
            </div>
            <div>
                <button type="submit" name="register-btn" class="btn btn-big">
                    Register
                </button>
            </div>
            <p>Or <a href="<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>
        </form>
    </div>

    <!-- Jquery script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Custom script-->
    <script src="js/scripts.js"></script>
</body>

</html>