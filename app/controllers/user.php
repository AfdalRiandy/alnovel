<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$table = 'user';
$admin_users = SelectAll($table);

$errors = array();
$id = '';
$Username = '';
$admin = '';
$email = '';
$Password = '';
$PasswordConf = '';

function loginUser($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['Username'] = $user['Username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'Anda sudah login';
    $_SESSION['type'] = 'berhasil';

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    } else {
        header('location: ' . BASE_URL . '/index.php');
    }
    exit();
    
}

if (isset($_POST['create-admin'])) {
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        unset($_POST['PasswordConf'], $_POST['create-admin']);
        $_POST['Password'] = password_hash($_POST['Password'], PASSWORD_DEFAULT);

        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Admin user created successfully";
            $_SESSION["type"] = "success";
            header('location: ' . BASE_URL . '/admin/user/index.php');
            exit();
        } else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = SelectOne($table, ['id' => $user_id]);
            loginUser($user);
        }
    } else {
        // Simpan nilai-nilai yang sudah diisi
        $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $admin = isset($_POST['admin']) ? 1 : 0 ;
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
        $PasswordConf = isset($_POST['PasswordConf']) ? $_POST['PasswordConf'] : '';
    }
}

if (isset($_POST['update-user'])) {
    adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['PasswordConf'], $_POST['update-user'], $_POST['id']);
        $_POST['Password'] = password_hash($_POST['Password'], PASSWORD_DEFAULT);

            $_POST['admin'] = isset($_POST['admin']) ?1:0;
            $count = update($table, $id, $_POST);
            $_SESSION['message'] = "Admin user update";
            $_SESSION["type"] = "success";
            header('location: ' . BASE_URL . '/admin/user/index.php');
            exit();
            
    } else {
        // Simpan nilai-nilai yang sudah diisi
        $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $admin = isset($_POST['admin']) ? 1 : 0 ;
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
        $PasswordConf = isset($_POST['PasswordConf']) ? $_POST['PasswordConf'] : '';
    }
}


if (isset($_GET['id'])) {
    $user = SelectOne($table, ['id' => $_GET['id']]);

    $id = $user['id'];
    $Username = $user['Username'];
    $admin = $user['admin'];
    $email = $user['email'];
}

if (isset($_POST['register-btn'])) {
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['PasswordConf']);
        $_POST['admin'] = 0;

        // Pastikan kunci 'Password' ada sebelum mengaksesnya
        $_POST['Password'] = isset($_POST['Password']) ? password_hash($_POST['Password'], PASSWORD_DEFAULT) : '';

        $user_id = create('user', $_POST);
        $user = SelectOne('user', ['id' => $user_id]);
        header('location: ' . BASE_URL . '/index.php');
        
    } else {
        // Simpan nilai-nilai yang sudah diisi
        $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
        $PasswordConf = isset($_POST['PasswordConf']) ? $_POST['PasswordConf'] : '';
    }
}

if (isset($_POST['login-btn'])) {
$errors = validateLogin($_POST);

if (count($errors) === 0) {
$user = SelectOne($table, ['Username' => $_POST['Username']]);

if ($user && password_verify($_POST['Password'], $user['Password'])) {
//log user in
loginUser($user);
} else {
array_push($errors, 'Password salah');
}
}
$Username = $_POST['Username'];
$Password = $_POST['Password'];
}

if (isset($_GET['delete_id'])) {
adminOnly();
$count = delete($table, $_GET['delete_id']);
$_SESSION['message'] = 'admin user deleted';
$_SESSION['type'] = 'success';
header('location: ' . BASE_URL . '/admin/user/index.php');
exit();
}

?>