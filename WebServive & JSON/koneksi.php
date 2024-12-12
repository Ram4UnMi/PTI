<?php
function koneksi_db()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "";

    $link = mysqli_connect($host, $username, $password, $database);

    if (!$link) {
        die("Tidak bisa konek ke database: " . mysqli_connect_error());
    }

    return $link;
}
?>
