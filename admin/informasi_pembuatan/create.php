<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/informasi_pembuatan.php"); 
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

    <title>Admin Section - Add Pembuat</title>
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
                <a href="create.php" class="btn btn-big">Add Pembuat</a>
                <a href="index.php" class="btn btn-big">Manage Pembuat</a>
            </div>

            <div class="content">
                <h2 class="page-title">Add Pembuat</h2>
                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                <form action="create.php" method="post">
                    <div>
                        <label>Judul Novel</label>
                        <?php $judulnovel_id = isset($_POST['judulnovel_id']) ? $_POST['judulnovel_id'] : ''; ?>
                        <select name="judulnovel_id" class="text-input">
                            <option value=""></option>
                            <?php foreach ($novel as $key => $informasi_novel): ?>
                            <?php if (!empty($judulnovel_id) && $judulnovel_id == $informasi_novel['id']): ?>
                            <option selected value="<?php echo $informasi_novel['id']; ?>">
                                <?php echo $informasi_novel['Judul_Novel']; ?>
                            </option>
                            <?php else: ?>
                            <option value="<?php echo $informasi_novel['id']; ?>">
                                <?php echo $informasi_novel['Judul_Novel']; ?>
                            </option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label>Pengarang</label>
                        <input type="text" name="Pengarang" value="<?php echo $Pengarang; ?>" class="text-input" />
                    </div>
                    <div>
                        <label>Ilustrator</label>
                        <input type="text" name="Ilustrator" value="<?php echo $Ilustrator; ?>" class="text-input" />
                    </div>
                    <div>
                        <label>Email Pengarang</label>
                        <input type="text" name="Email_Pengarang" value="<?php echo $Email_Pengarang; ?>"
                            class="text-input" />
                    </div>
                    <div>
                        <div>
                            <label>Tanggal Pembuatan</label>
                            <input type="date" name="Tanggal_Pembuatan" value="<?php echo $Tanggal_Pembuatan; ?>"
                                class="text-input" />
                        </div>

                        <div>
                            <button type="submit" class="btn btn-big" name="add-pembuatan">Add Pembuat</button>
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