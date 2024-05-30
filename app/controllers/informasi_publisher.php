<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validatePublisher.php");


$table = 'informasi_publisher';
$novel = SelectAll('informasi_novel');
$informasi_publisher = SelectAll($table);

$errors = array();
$id = '';
$Musim_Terbit = '';
$Nama_Publisher = '';
$Tanggal_Terbit = '';
$judulnovel_id = "";
$Jumlah_Volume = '';


$informasi_publisher = SelectAll($table);
if (isset($_POST['add-publisher'])) {
    adminOnly();
    $errors = validatePublisher($_POST);

    
    if (count($errors) === 0) {
        unset($_POST['add-publisher']);
        $publisher_id = create($table, $_POST);
        $_SESSION['message'] = 'Info Tentang Publisher Telah di Buat';
        $_SESSION['type'] = 'success';  
        header('location: ' . BASE_URL . '/admin/informasi_publisher/index.php');
        exit();
    } else {
        // Memeriksa apakah kunci 'Nama_Publisher' dan 'description' sudah diatur sebelum mengaksesnya
        $Nama_Publisher = isset($_POST['Nama_Publisher']) ? $_POST['Nama_Publisher'] : '';
        $judulnovel_id = isset($_POST['judulnovel_id']) ? $_POST['judulnovel_id'] : '';
        $Musim_Terbit = isset($_POST['Musim_Terbit']) ? $_POST['Musim_Terbit'] : '';
        $Nama_Publisher = isset($_POST['Nama_Publisher']) ? $_POST['Nama_Publisher'] : '';
        $Tanggal_Terbit = isset($_POST['Tanggal_Terbit']) ? $_POST['Tanggal_Terbit'] : '';
        $Jumlah_Volume = isset($_POST['Jumlah_Volume']) ? $_POST['Jumlah_Volume'] : '';
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $publisher = SelectOne($table, ['id'=> $id]);
    $id = $publisher['id'];
    $Nama_Publisher = $publisher['Nama_Publisher'];
    $judulnovel_id = $publisher['judulnovel_id'];
    $Musim_Terbit = $publisher['Musim_Terbit'];
    $Nama_Publisher = $publisher['Nama_Publisher'];
    $Tanggal_Terbit = $publisher['Tanggal_Terbit'];
    $judulnovel_id = $publisher['judulnovel_id'];
    $Jumlah_Volume = $publisher['Jumlah_Volume'];
}

if (isset($_GET['del_id'])) {
    adminOnly();
    $id = $_GET['del_id']; // Ganti $_GET['id'] menjadi $_GET['del_id']
    $count = delete($table, $id);
    $_SESSION['message'] = 'publisher deleted';  
    $_SESSION['type'] = 'success';  
    header('location: ' . BASE_URL . '/admin/informasi_publisher/index.php');
    exit();
}


if (isset($_POST['update-publisher'])) {
    adminOnly();
    $errors = validatePublisher($_POST);
    if (count($errors) === 0) {

    $id = $_POST['id'];
    unset($_POST['update-publisher'], $_POST['id']);
    $publisher_id = update($table, $id, $_POST);
    $_SESSION['message'] = 'publisher updated';  // Perbaiki pesan sesi
    $_SESSION['type'] = 'success';  // Juga perbaiki typo pada type
    header('location: ' . BASE_URL . '/admin/informasi_publisher/index.php');
    exit();

} else {
    $id =$_POST['id'];
    $Nama_Publisher =$_POST['Nama_Publisher'];
    $judulnovel_id = $_POST['judulnovel_id'];
    $Musim_Terbit = $_POST['Musim_Terbit'];
    $Nama_Publisher = $_POST['Nama_Publisher'];
    $Tanggal_Terbit = $_POST['Tanggal_Terbit'];
    $Jumlah_Volume = $_POST['Jumlah_Volume'];
}

}


?>