<?php include("path.php"); 
include(ROOT_PATH . "/app/controllers/informasi_publisher.php"); 

$novel = array();
$novelTitle = 'Update Terbaru';

if (isset($_GET['t_id'])) {
    $novel = getNovelByPublisherId($_GET['t_id']);
    $novelTitle = "Kamu mencari '" . $_GET['Nama_Publisher'] . "'";
} else if (isset($_POST['search-term'])) {
    $novelTitle = "Kamu mencari '" . $_POST['search-term'] . "'";
    $novel = searchNovel($_POST['search-term']);
} else {
    $novel = getPublishedNovel();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/90acc466c7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Rubik:wght@600&display=swap" rel="stylesheet">

    <!-- Ganti CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>AlNovel</title>
</head>

<body>
    <!-- Navbar -->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <?php include(ROOT_PATH . "/app/includes/message.php"); ?>




    <!-- Navbar End -->

    <!-- page wrapper-->
    <div class=" page-wrapper">
        <!-- post slider-->
        <div class="post-slider">
            <h1 class="slider-title">Rekomendasi Novel</h1>
            <i class="fas fa-chevron-left prev"></i>
            <i class="fas fa-chevron-right next"></i>

            <div class="post-wrapper">
                <?php foreach ($novel as $informasi_novel): ?>
                <div class="post">
                    <img src="<?php echo BASE_URL . '/assets/img/' . $informasi_novel['image']; ?>" alt=""
                        class="slider-image">
                    <div class="post-info">
                        <h4><a
                                href="single.php?id=<?php echo $informasi_novel['id']; ?>"><?php echo $informasi_novel['Judul_Novel']; ?></a>
                        </h4>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- post slider-->
    </div>

    <!-- page wrapper-->

    <!-- content-->
    <div class="content clearfix">
        <!-- main content-->
        <div class="main-content">
            <h1 class="recent-post-title"><?php echo  $novelTitle ?></h1>

            <?php foreach ($novel as $informasi_novel): ?>
            <div class="post clearfix">
                <img src="<?php echo BASE_URL . '/assets/img/' .  $informasi_novel['image']; ?>" alt=""
                    class="post-image">
                <div class="post-preview">
                    <h2><a
                            href="single.php?id=<?php echo $informasi_novel['id']; ?>"><?php echo $informasi_novel['Judul_Novel']; ?></a>
                    </h2>
                    <i class="text-inputs"><?php echo $informasi_novel['Konsep_Cerita']; ?></i>
                    <i class="text-inputs"><?php echo $informasi_novel['Rating']; ?></i>
                    <i class="text-inputs"><?php echo $informasi_novel['Status']; ?></i>
                    &nbsp;
                    <p class="preview-text">
                        <?php echo html_entity_decode(substr($informasi_novel['Sinopsis'], 0, 150) . '....'); ?>
                    </p>
                    <a href="single.php?id=<?php echo $informasi_novel['id']; ?>" class="btn read-more">Read More</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>


        <!-- novel korea -->

        <!-- sidebar -->
        <div class="sidebar">
            <div class="section-search">
                <h2 class="section-title">Mau Cari Apa?</h2>
                <form action="" class="index.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="search...">
                </form>
            </div>

            <div class="section topics">
                <h2 class="section-title">genre</h2>
                <ul>
                    <?php foreach ($informasi_publisher  as $key => $informasi_publisher): ?>
                    <li><a
                            href="<?php echo BASE_URL . '/index.php?t_id=' . $informasi_publisher['id'] . '&Nama_Publisher=' . $informasi_publisher['Nama_Publisher'] ?>"><?php echo $informasi_publisher['Nama_Publisher']; ?></a>
                        </a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- sidebar -->
    </div>

    </div>
    <!-- page wrapper-->

    <!-- Footer-->
    <?php include(ROOT_PATH . "/app/includes/footers.php"); ?>
    <!-- Footer-->


    <!-- Jquery script-->
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>

    <!-- Slick-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js">
    </script>

    <!-- Custom script-->
    <script src="assets/js/scripts.js"></script>

</body>

</html>