<?php

function validateUser($user) {
    $errors = array();

    if (!isset($user['Username']) || empty($user['Username'])) {
        array_push($errors, 'Username Tidak Boleh Kosong');
    }

    // Periksa apakah 'email' di-set dan memiliki nilai yang tidak kosong
    if (!isset($user['email']) || empty($user['email'])) {
        array_push($errors, 'Email Tidak Boleh Kosong');
    }

    if (!isset($user['Password']) || empty($user['Password'])) {
        array_push($errors, 'Password Tidak Boleh Kosong');
    }

    if (!isset($user['PasswordConf']) || $user['PasswordConf'] !== $user['Password']) {
        array_push($errors, 'Password Tidak Cocok');
    }

    
    $existingUser = selectOne('user', ['email' => $user['email']]);
    if (!empty($existingUser)) {
        array_push($errors, 'Email Sudah Ada');
    }

    return $errors;
}


function validateLogin($user) {
    $errors = array();

    if (!isset($user['Username']) || empty($user['Username'])) {
        array_push($errors, 'Username Tidak Boleh Kosong');
    }

    if (!isset($user['Password']) || empty($user['Password'])) {
        array_push($errors, 'Password Tidak Boleh Kosong');
    }

    return $errors;
}

?>