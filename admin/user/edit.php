<?php include("../../path.php"); 
include(ROOT_PATH . "/app/controllers/user.php");
adminOnly();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/90acc466c7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Rubik:wght@600&display=swap" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/admin.css" />

    <title>Admin Section - Edit Users</title>
</head>

<body>
    <!-- Navbar -->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    <!-- Navbar End -->

    <!-- page wrapper-->
    <div class="admin">
        <!-- Left Sidebar-->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
        <!-- Left Sidebar end -->

        <!-- admin content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add users</a>
                <a href="index.php" class="btn btn-big">Manage users</a>
            </div>

            <div class="content">
                <h2 class="page-title">Edit users</h2>
                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div>
                        <label>Username</label>
                        <input type="Username" name="Username" value="<?php echo $Username ?>" class="text-input" />
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $email ?>" class="text-input" />
                    </div>

                    <div>
                        <label>Password</label>
                        <input type="Password" name="Password" value="<?php echo $Password ?>" class="text-input" />
                    </div>

                    <div>
                        <label>Password Confirmation</label>
                        <input type="Password" name="PasswordConf" value="<?php echo $PasswordConf ?>"
                            class="text-input" />
                    </div>
                    <div>
                        <?php if (isset($admin) && $admin == 1): ?>
                        <label>
                            <input type="checkbox" name="admin" checked>
                            Admin
                        </label>
                        <?php else: ?>
                        <label>
                            <input type="checkbox" name="admin">
                            Admin
                        </label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="update-user" class="btn btn-big">Update users</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- admin content end -->
    </div>
    <!-- page wrapper-->

    <!-- Jquery script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Custom script-->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

    <!-- Custom script-->
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>