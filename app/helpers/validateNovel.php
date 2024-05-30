<?php

function validateNovel($novel) {
    $errors = array();

    if (empty($novel['Judul_Novel'])) {
        array_push($errors, 'Judul Tidak Boleh Kosong');
    }

    if (empty($novel['Sinopsis'])) {
        array_push($errors, 'Sinopsis Tidak Boleh Kosong');
    }

    if (empty($novel['Konsep_Cerita'])) {
        array_push($errors, 'Konsep Cerita Tidak Boleh Kosong');
    }

    if (empty($novel['Status'])) {
        array_push($errors, 'Status Tidak Boleh Kosong');
    }

    if (empty($novel['Rating'])) {
        array_push($errors, 'Rating Tidak Boleh Kosong');
    }

    if (empty($novel['publisher_id'])) {
        array_push($errors, 'Publisher Tidak Boleh Kosong');
    }
    
    if (empty($novel['pembuatan_id'])) {
        array_push($errors, 'Pembuat Tidak Boleh Kosong');
    }
    

    // Periksa apakah judul novel sudah ada
    $existingNovel = selectOne('Informasi_Novel', ['Judul_Novel' => $novel['Judul_Novel']]);
    if ($existingNovel) {
        if (isset($novel['update-novel']) && $existingNovel['id'] != $novel['id']) {
            array_push($errors, 'Nama novel tersebut sudah ada');
        }

        if (isset($novel['add-novel'])){
            array_push($errors, 'Novel dengan judul tersebut sudah ada');
        }
    }

    return $errors;
}
?>