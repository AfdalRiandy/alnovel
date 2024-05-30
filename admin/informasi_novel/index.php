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

    <title>Admin Section - Manage Posts</title>
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
                <h2 class="page-title">Manage Novel </h2>

                <?php include(ROOT_PATH . "/app/includes/message.php"); ?>

                <table>
                    <thead>
                        <th>SN</th>
                        <th>Judul Novel</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($informasi_novel as $key => $novel): ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $novel['Judul_Novel']; ?></td>
                            <td><?php echo $novel['Judul_Novel']; ?></td>
                            <td><a href="edit.php?id=<?php echo $novel['id']; ?>" class="edit"> edit </a></a>
                            </td>
                            <td><a href="edit.php?delete_id=<?php echo $novel['id']; ?>" class="delete">delete</a></a>
                            </td>

                            <?php if ($novel['published']): ?>
                            <td><a href="edit.php?published=0&p_id=<?php echo $novel['id'] ?>"
                                    class="unpublish">unpublish</a></a></td>
                            <?php else: ?>
                            <td><a href="edit.php?published=1&p_id=<?php echo $novel['id'] ?>"
                                    class="publish">publish</a></a></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>

                </table>
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