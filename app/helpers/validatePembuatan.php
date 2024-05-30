<?php

function validatePembuatan($pembuatan) {
    $errors = array();

    if (empty($pembuatan['judulnovel_id'])) {
        array_push($errors, 'Judul Novel Tidak Boleh Kosong');
    }

    if (empty($pembuatan['Pengarang'])) {
        array_push($errors, 'Pengarang Tidak Boleh Kosong');
    }

    if (empty($pembuatan['Ilustrator'])) {
        array_push($errors, 'Ilustrator Tidak Boleh Kosong');
    }

    if (empty($pembuatan['Tanggal_Pembuatan'])) {
        array_push($errors, 'Tanggal pembuatan Tidak Boleh Kosong');
    }

    if (empty($pembuatan['Email_Pengarang'])) {
        array_push($errors, 'Email Pengarang Tidak Boleh Kosong');
    }

    $existingPembuatan = selectOne('informasi_pembuatan', ['Pengarang' => $pembuatan['Pengarang']]);
    if (!empty($existingPembuatan)) {
        array_push($errors, 'Informasi Pembuatan Sudah Ada');
    }

    return $errors;
}
?>