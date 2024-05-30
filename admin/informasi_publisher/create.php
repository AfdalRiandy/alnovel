<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/informasi_publisher.php"); 
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

    <title>Admin Section - Add Publisher</title>
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
                <a href="create.php" class="btn btn-big">Add Publisher</a>
                <a href="index.php" class="btn btn-big">Manage Publisher</a>
            </div>

            <div class="content">
                <h2 class="page-title">Add Publisher</h2>
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
                        <label>Nama Publisher</label>
                        <input type="text" name="Nama_Publisher" value="<?php echo $Nama_Publisher; ?>"
                            class="text-input" />
                    </div>
                    <div>
                        <label>Musim Terbit</label>
                        <select name="Musim_Terbit" class="text-input">
                            <option value=""></option>
                            <option value="Winter" <?php echo ($Musim_Terbit == 'Winter') ? 'selected' : ''; ?>>Winter
                            </option>
                            <option value="Spring" <?php echo ($Musim_Terbit == 'Spring') ? 'selected' : ''; ?>>Spring
                            </option>
                            <option value="Summer" <?php echo ($Musim_Terbit == 'Summer') ? 'selected' : ''; ?>>Summer
                            </option>
                            <option value="Fall" <?php echo ($Musim_Terbit == 'Fall') ? 'selected' : ''; ?>>Fall
                            </option>
                        </select>
                    </div>
                    <div>
                        <label>Jumlah Volume</label>
                        <input type="text" name="Jumlah_Volume" value="<?php echo $Jumlah_Volume; ?>"
                            class="text-input" />
                    </div>
                    <div>
                        <label>Tanggal_Terbit</label>
                        <input type="date" name="Tanggal_Terbit" value="<?php echo $Tanggal_Terbit; ?>"
                            class="text-input" />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-big" name="add-publisher">Add Publisher</button>
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