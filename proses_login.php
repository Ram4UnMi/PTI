<?php
// Import file config untuk koneksi ke database
require('dbconfig.php');

// Ambil input dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Validasi form
if ($username == "" || $password == "") {
    header("location:login.php?pesan=gagal");
    die;
}

// Cek apakah username dan password ada di database
$data = mysqli_query($mysqli, "SELECT * FROM admin WHERE username='$username' AND password=sha1('$password')");
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    // Jika username dan password cocok, redirect ke halaman input daftar tamu
    header("location:input_daftar_tamu.php");
    exit;
} else {
    // Jika login gagal, redirect kembali ke halaman login
    header("location:login.php?pesan=salah");
    exit;
}
?>
