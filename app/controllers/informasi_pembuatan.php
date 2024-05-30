<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validatePembuatan.php"); 

$table = 'informasi_pembuatan';
$novel = SelectAll('informasi_novel');
$informasi_pembuatan = SelectAll($table);

$errors = array();
$Pengarang = "";
$judulnovel_id = "";
$Ilustrator = "";
$Tanggal_Pembuatan = "";
$Email_Pengarang = "";




if (isset($_GET['id'])) {
    $pembuatan = SelectOne($table, ['id' => $_GET['id']]);

    if ($pembuatan) {  // Periksa apakah $pembuatan tidak null
        $id = $pembuatan['id'];
        $Pengarang = $pembuatan['Pengarang'];
        $judulnovel_id = $pembuatan['judulnovel_id']; // Sesuaikan dengan nama kolom di database
        $Ilustrator = $pembuatan['Ilustrator'];
        $Tanggal_Pembuatan = $pembuatan['Tanggal_Pembuatan'];
        $Email_Pengarang  = $pembuatan['Email_Pengarang'];
    }
}

if (isset($_GET['del_id'])) {
    adminOnly();
    $id = $_GET['del_id']; // Ganti $_GET['id'] menjadi $_GET['del_id']
    $count = delete($table, $id);
    $_SESSION['message'] = 'informasi pembuatan deleted';  
    $_SESSION['type'] = 'success';  
    header('location: ' . BASE_URL . '/admin/informasi_pembuatan/index.php');
    exit();
}


if (isset($_POST['add-pembuatan'])) {
    adminOnly();
    $errors = validatePembuatan($_POST);

    if (count($errors) == 0) {
        unset($_POST['add-pembuatan']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['Pengarang'] = htmlentities($_POST['Pengarang']); // Sesuaikan dengan nama kolom di database
        $_POST['judulnovel_id'] = htmlentities($_POST['judulnovel_id']);
        $_POST['Ilustrator'] = htmlentities($_POST['Ilustrator']);
        $_POST['Tanggal_Pembuatan'] = htmlentities($_POST['Tanggal_Pembuatan']);
        $_POST['Email_Pengarang'] = htmlentities($_POST['Email_Pengarang']);

        $pembuat_id = create($table, $_POST);
        $_SESSION['message'] = "informasi pembuatan berhasil dibuat";
        $_SESSION['type'] = "Berhasil";
        header("location: " . BASE_URL . "/admin/informasi_pembuatan/index.php");
        exit();
    } else {
        $judulnovel_id = $_POST['judulnovel_id'];
        $Pengarang = $_POST['Pengarang'];
        $Ilustrator = $_POST['Ilustrator'];
        $Tanggal_Pembuatan = $_POST['Tanggal_Pembuatan'];
        $Email_Pengarang = $_POST['Email_Pengarang'];
    }
}

if (isset($_POST['update-pembuatan'])) {
    adminOnly();
    $errors = validatePembuatan($_POST);

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-pembuatan'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['Pengarang'] = htmlentities($_POST['Pengarang']); // Sesuaikan dengan nama kolom di database
        $_POST['judulnovel_id'] = htmlentities($_POST['judulnovel_id']);
        $_POST['Ilustrator'] = htmlentities($_POST['Ilustrator']);
        $_POST['Tanggal_Pembuatan'] = htmlentities($_POST['Tanggal_Pembuatan']);
        $_POST['Email_Pengarang'] = htmlentities($_POST['Email_Pengarang']);

        $pembuat_id = update($table, $id, $_POST);
        $_SESSION['message'] = "pembuatan berhasil diubah";
        $_SESSION['type'] = "Berhasil";
        header("location: " . BASE_URL . "/admin/informasi_pembuatan/index.php");
        exit();
    } else {
        $judulnovel_id = $_POST['judulnovel_id'];
        $Pengarang = $_POST['Pengarang'];
        $Ilustrator = $_POST['Ilustrator'];
        $Tanggal_Pembuatan = $_POST['Tanggal_Pembuatan'];
        $Email_Pengarang = $_POST['Email_Pengarang'];
    }
}

?>