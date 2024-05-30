<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateNovel.php");


$table = 'informasi_novel';
$publisher = SelectAll('informasi_publisher');
$pembuatan = SelectAll('informasi_pembuatan');
$informasi_novel = SelectAll($table);

$errors = array();
$Judul_Novel = "";
$Sinopsis = "";
$Konsep_Cerita = "";
$Status = "";
$Rating = "";
$publisher_id = "";
$pembuatan_id = "";
$published = "";



if (isset($_GET['id'])) {
    $novel = SelectOne($table, ['id' => $_GET['id']]);

    if ($novel) {  // Periksa apakah $novel tidak null
        $id = $novel['id'];
        $Judul_Novel = $novel['Judul_Novel'];
        $Sinopsis = $novel['Sinopsis']; // Sesuaikan dengan nama kolom di database
        $Konsep_Cerita = $novel['Konsep_Cerita'];
        $Status = $novel['Status'];
        $Rating = $novel['Rating'];
        $publisher_id = $novel['publisher_id'];
        $pembuatan_id = $novel['pembuatan_id'];
        $published = $novel['published'];
    }
}

if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "novel deleted";
    $_SESSION['type'] = "Berhasil";
    header("location: " . BASE_URL . "/admin/informasi_novel/index.php");
    exit();
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {
    adminOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = "novel published state changed!";
    $_SESSION["type"] = "success";
    header("location: " . BASE_URL . "/admin/informasi_novel/index.php");
    exit();
}

if (isset($_POST['add-novel'])) {
    adminOnly();
    $errors = validateNovel($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/img/" . $image_name;

        $result = move_uploaded_file($_FILES["image"]["tmp_name"], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "failed upload image");
        }
    } else {
        array_push($errors, "novel image required");
    }

    if (count($errors) == 0) {
        unset($_POST['add-novel']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['Sinopsis'] = htmlentities($_POST['Sinopsis']); // Sesuaikan dengan nama kolom di database
        $_POST['Konsep_Cerita'] = htmlentities($_POST['Konsep_Cerita']);
        $_POST['Status'] = htmlentities($_POST['Status']);
        $_POST['Rating'] = htmlentities($_POST['Rating']);

        $novel_id = create($table, $_POST);
        $_SESSION['message'] = "Novel berhasil dibuat";
        $_SESSION['type'] = "Berhasil";
        header("location: " . BASE_URL . "/admin/informasi_novel/index.php");
        exit();
    } else {
        $Judul_Novel = $_POST['Judul_Novel'];
        $Sinopsis = $_POST['Sinopsis'];
        $Konsep_Cerita = $_POST['Konsep_Cerita'];
        $Status = $_POST['Status'];
        $Rating = isset($_POST['Rating']) ? htmlentities($_POST['Rating']) : "";
        $publisher_id = isset($_POST['publisher_id']) ? $_POST['publisher_id'] : "";        
        $pembuatan_id = isset($_POST['pembuatan_id']) ? $_POST['pembuatan_id'] : "";  
        $published = isset($_POST['published']) ? 1 : 0;
    }
}

if (isset($_POST['update-novel'])) {
    adminOnly();
    $errors = validateNovel($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/img/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "failed tu upload image");
        }
    } else {
        array_push($errors, "novel image required");
    }

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-novel'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['Sinopsis'] = htmlentities($_POST['Sinopsis']); 
        $_POST['Konsep_Cerita'] = htmlentities($_POST['Konsep_Cerita']);
        $_POST['Status'] = htmlentities($_POST['Status']);
        $_POST['Rating'] = htmlentities($_POST['Rating']);

        $novel_id = update($table, $id, $_POST);
        $_SESSION['message'] = "Novel berhasil diubah";
        $_SESSION['type'] = "Berhasil";
        header("location: " . BASE_URL . "/admin/informasi_novel/index.php");
        exit();
    } else {
        $Judul_Novel = $_POST['Judul_Novel'];
        $Sinopsis = $_POST['Sinopsis'];
        $Konsep_Cerita = $_POST['Konsep_Cerita'];
        $Status = $_POST['Status'];
        $Rating = isset($_POST['Rating']) ? htmlentities($_POST['Rating']) : "";
        $publisher_id = isset($_POST['publisher_id']) ? $_POST['publisher_id'] : "";        
        $pembuatan_id = isset($_POST['pembuatan_id']) ? $_POST['pembuatan_id'] : "";   
        $published = isset($_POST['published']) ? 1 : 0;
    }
}

?>