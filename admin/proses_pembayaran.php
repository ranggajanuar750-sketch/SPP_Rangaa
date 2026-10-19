<?php
session_start();
include "../src/koneksi.php";

if (isset($_GET['act']) && $_GET['act'] == 'bayar') {

    $id_pembayaran = $_GET['id_pembayaran'];
    $nisn          = $_GET['nisn'];

    // Membuat nomor pembayaran
    $today = date("ymd");
    $query = mysqli_query($koneksi, "SELECT max(no_bayar) AS last FROM pembayaran WHERE no_bayar LIKE '$today%'");
    $data  = mysqli_fetch_array($query);

    $lastNoBayar = $data['last'];

    // Cek jika sudah ada nomor bayar pada hari ini
    if (!empty($lastNoBayar)) {
        $lastNoUrut = (int) substr($lastNoBayar, 6, 4);
        $nextNoUrut = $lastNoUrut + 1;
    } else {
        // Jika belum ada transaksi hari ini, mulai dari urutan 1
        $nextNoUrut = 1;
    }

    $nextNoBayar = $today . sprintf('%04d', $nextNoUrut);

    // Tanggal Bayar
    $tgl_pembayaran = date('Y-m-d');

    // ID admin/petugas dari Session (diperiksa agar tidak undefined)
    $admin = isset($_SESSION['id_petugas']) ? $_SESSION['id_petugas'] : NULL;

    // Update status transaksi di database
    mysqli_query($koneksi, "UPDATE pembayaran SET 
        no_bayar='$nextNoBayar',
        tgl_pembayaran='$tgl_pembayaran',
        keterangan='LUNAS',
        id_petugas='$admin'
        WHERE id_pembayaran='$id_pembayaran'");

    header('location:halaman_admin.php?open=data_pembayaran&nisn=' . $nisn);
    exit();
}
?>