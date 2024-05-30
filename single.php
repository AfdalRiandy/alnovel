<?php include("path.php"); 
include(ROOT_PATH . "/app/controllers/informasi_novel.php"); 

if (isset($_GET['id'])) {
    $informasi_novel = SelectOne('informasi_novel', ['id' => $_GET['id']]);
}
$publisher  = SelectAll('informasi_publisher ');
$novel = SelectAll('informasi_novel', ['published' => 1]);


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

    <title><?php echo $informasi_novel['Judul_Novel']; ?> | AlNovel</title>
</head>

<body>
    <!-- Navbar Menu -->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <!-- Navbar Menu END-->

    <!-- page wrapper-->
    <div class="page-wrapper">
        <!-- content-->
        <div class="content clearfix">
            <!-- main content wrapper-->
            <div class="main-content-wrapper">
                <div class="main-content single">
                    <h1 class="post-novel"><?php echo $informasi_novel['Judul_Novel']; ?></h1>
                    <div class="post-novel">
                        <?php echo html_entity_decode($informasi_novel['Sinopsis']); ?>
                    </div>
                    <?php foreach ($pembuatan as $informasi_pembuatan): ?>
                    <?php if ($informasi_pembuatan['judulnovel_id'] == $informasi_novel['id']): ?>
                    <h3 class="section-title">-------------------------------------------------------</h3>
                    <h2 class="section-title">Informasi pembuatan</h2>
                    <i class="text-inputss">Pengarang : <?php echo $informasi_pembuatan['Pengarang']; ?></i>
                    <i class="text-inputss">Ilustrator : <?php echo $informasi_pembuatan['Ilustrator']; ?></i>
                    <i class="text-inputss">Email : <?php echo $informasi_pembuatan['Email_Pengarang']; ?></i>
                    <i class="text-inputss">Tanggal : <?php echo $informasi_pembuatan['Tanggal_Pembuatan']; ?></i>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    &nbsp;
                    <?php foreach ($publisher as $informasi_publisher): ?>
                    <?php if ($informasi_publisher['judulnovel_id'] == $informasi_novel['id']): ?>
                    <h2 class="section-title">Informasi publisher</h2>
                    <i class="text-inputss">Musim Terbit :<?php echo $informasi_publisher['Musim_Terbit']; ?></i>
                    <i class="text-inputss">Nama publisher :
                        <?php echo $informasi_publisher['Nama_Publisher']; ?></i>
                    <i class="text-inputss">Tanggal : <?php echo $informasi_publisher['Tanggal_Terbit']; ?></i>
                    <i class="text-inputss">Jumlah Volume : <?php echo $informasi_publisher['Jumlah_Volume']; ?></i>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- //main content-->

            <!-- sidebar -->
            <div class="sidebar single">
                <div class="section popular">
                    <h2 class="section-title">Populer</h2>
                    <?php $count = 0; ?>
                    <?php foreach ($novel as $p): ?>
                    <?php if (is_array($p) && array_key_exists('image', $p)): ?>
                    <?php if ($count < 5): ?>
                    <div class="post clearfix">
                        <img src="<?php echo BASE_URL . '/assets/img/' . $p['image']; ?>" alt="" />
                        <a href="single.php?id=<?php echo $p['id']; ?>" class="Judul_Novel">
                            <h4><?php echo $p['Judul_Novel'] ?></h4>
                        </a>
                    </div>
                    <?php $count++; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <!-- sidebar -->
            </div>
        </div>
        <!-- page wrapper-->

        <!-- Footer-->
        <?php include(ROOT_PATH . "/app/includes/footers.php"); ?>
        <!-- Footer-->

        <!-- Jquery script-->
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Slick-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js">
        </script>

        <!-- Custom script-->
        <script src="js/scripts.js"></script>
</body>

</html>