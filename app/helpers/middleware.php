<?php

function userOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'kamu harus login dulu';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }

}

function adminOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
        $_SESSION['message'] = 'kamu tidak memiliki hak ases';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }

}

function guestOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id'])) {
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }

}

?>