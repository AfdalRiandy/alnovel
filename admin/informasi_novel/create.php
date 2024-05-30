<?php
include("../../path.php");
include(ROOT_PATH . "/app/controllers/informasi_novel.php");
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

    <title>Admin Section - Add Novel</title>
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
                <a href="create.php" class="btn btn-big">Add Novel</a>
                <a href="index.php" class="btn btn-big">Manage Novel</a>
            </div>

            <div class="content">
                <h2 class="page-title">Add Novel</h2>
                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Judul Novel</label>
                        <input type="text" name="Judul_Novel" value="<?php echo $Judul_Novel ?>" class="text-input" />
                    </div>
                    <div>
                        <label>Konsep Cerita</label>
                        <input type="text" name="Konsep_Cerita" value="<?php echo $Konsep_Cerita ?>"
                            class="text-input" />
                    </div>
                    <div>
                        <label for="Rating">Rating</label>
                        <input type="number" name="Rating" id="Rating" value="<?php echo $Rating ?>" class="text-input"
                            min="1" max="10" step="0.1" />
                    </div>
                    <div>
                        <label>image</label>
                        <input type="file" name="image" class="text-input" />
                    </div>
                    <div>
                        <label>Status</label>
                        <select name="Status" class="text-input">
                            <option value=""></option>
                            <option value="Tamat" <?php echo ($Status == 'Tamat') ? 'selected' : ''; ?>>Tamat
                            </option>
                            <option value="OnGoing" <?php echo ($Status == 'OnGoing') ? 'selected' : ''; ?>>OnGoing
                            </option>
                        </select>
                    </div>
                    <div>
                        <label>Publisher</label>
                        <?php $informasi_publisher_id = isset($_POST['informasi_publisher_id']) ? $_POST['informasi_publisher_id'] : ''; ?>
                        <select name="publisher_id" class="text-input">
                            <option value=""></option>
                            <?php foreach ($publisher  as $key => $informasi_publisher): ?>
                            <?php if (!empty($publisher_id) && $publisher_id == $informasi_publisher['id']): ?>
                            <option selected value="<?php echo $informasi_publisher['id']; ?>">
                                <?php echo $informasi_publisher['Nama_Publisher']; ?></option>
                            <?php else: ?>
                            <option value="<?php echo $informasi_publisher['id']; ?>">
                                <?php echo $informasi_publisher['Nama_Publisher']; ?>
                            </option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label>Pembuat</label>
                        <?php $informasi_pembuatan_id = isset($_POST['informasi_pembuatan_id']) ? $_POST['informasi_pembuatan_id'] : ''; ?>
                        <select name="pembuatan_id" class="text-input">
                            <option value=""></option>
                            <?php foreach ($pembuatan  as $key => $informasi_pembuatan): ?>
                            <?php if (!empty($pembuatan_id) && $pembuatan_id == $informasi_pembuatan['id']): ?>
                            <option selected value="<?php echo $informasi_pembuatan['id']; ?>">
                                <?php echo $informasi_pembuatan['Pengarang']; ?></option>
                            <?php else: ?>
                            <option value="<?php echo $informasi_pembuatan['id']; ?>">
                                <?php echo $informasi_pembuatan['Pengarang']; ?>
                            </option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label>Sinopsis</label>
                        <textarea name="Sinopsis" id="body"><?php echo $Sinopsis ?></textarea>
                    </div>

                    <div>
                        <?php if (!empty($published)): ?>
                        <label>
                            <input type="checkbox" name="published">
                            publish
                        </label>
                        <?php else: ?>
                        <label>
                            <input type="checkbox" name="published" checked>
                            publish
                        </label>
                        <?php endif; ?>

                    </div>
                    <div>
                        <button type="submit" name="add-novel" class="btn btn-big">Add Novel</button>
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