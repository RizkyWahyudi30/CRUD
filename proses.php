<?php
include 'fungsi.php';
session_start();

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {

        $berhasil = tambah_data($_POST, $_FILES);

        if ($berhasil) {
            $_SESSION['eksekusi'] = [
                'pesan' => "Data Berhasil Ditambahkan!",
                'tipe' => "success"
            ];
            header("location: index.php");
        } else {
            echo $berhasil;
        }
    } else if ($_POST['aksi'] == "edit") {

        $berhasil = ubah_data($_POST, $_FILES);

        if ($berhasil) {
            $_SESSION['eksekusi'] = [
                'pesan' => "Data Berhasil Diperbarui!",
                'tipe' => "primary"
            ];
            header("location: index.php");
        } else {
            echo $berhasil;
        }

        header("location: index.php");
    }
}

if (isset($_GET['hapus'])) {
    $berhasil = hapus_data($_GET);

    if ($berhasil) {
        $_SESSION['eksekusi'] = [
            'pesan' => "Data Berhasil Dihapus",
            'tipe' => "danger"
        ];
        header("location: index.php");
    } else {
        echo $berhasil;
    }
}
