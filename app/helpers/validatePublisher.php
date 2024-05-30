<?php

function validatePublisher($publisher) {
    $errors = array();

    if (empty($publisher['Nama_Publisher'])) {
        array_push($errors, 'Nama Publisher Tidak Boleh Kosong');
    }

    if (empty($publisher['Musim_Terbit'])) {
        array_push($errors, 'Musim Terbit Tidak Boleh Kosong');
    }

    if (empty($publisher['Tanggal_Terbit'])) {
        array_push($errors, 'Tanggal Terbit Tidak Boleh Kosong');
    }

    if (empty($publisher['Jumlah_Volume'])) {
        array_push($errors, 'Jumlah Volume Tidak Boleh Kosong');
    }

    if (empty($publisher['judulnovel_id'])) {
        array_push($errors, 'Judul Novel Tidak Boleh Kosong');
    }

    $existingPublisher = selectOne('informasi_publisher', ['Nama_Publisher' => $publisher['Nama_Publisher']]);
    if (!empty($existingPublisher)) {
        array_push($errors, 'Publisher Sudah Ada');
    }

    return $errors;
}
?>