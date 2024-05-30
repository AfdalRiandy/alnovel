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

    <title>Admin Section - Manage Publisher</title>
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
                <h2 class="page-title">Manage Publisher</h2>

                <?php include(ROOT_PATH . "/app/includes/message.php"); ?>

                <table>
                    <thead>
                        <th>SN</th>
                        <th>Publisher</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($informasi_publisher as $key => $publisher): ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $publisher['Nama_Publisher']; ?></td>
                            <td><a href="edit.php?id=<?php echo $publisher['id']; ?>" class="edit">edit</a></td>
                            <td><a href="index.php?del_id=<?php echo $publisher['id']; ?> class=" delete">delete</a>
                            </td>
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
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Custom script-->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js">
    </script>

    <!-- Custom script-->
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>