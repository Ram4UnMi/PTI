<?php

// Koneksi ke database
$link = mysqli_connect("localhost", "root", "", "");

if ($link) {
    // Query untuk mengambil data mahasiswa
    $sql = "SELECT * FROM mahasiswa";
    $res = mysqli_query($link, $sql);

    // Menyiapkan array untuk menyimpan data mahasiswa
    $mahasiswa = array();

    // Mengambil data dan menyimpannya ke dalam array
    while ($data = mysqli_fetch_assoc($res)) {
        $mahasiswa[] = $data;
    }

    // Membungkus data dalam array dengan key "Data mahasiswa"
    $mahasiswa = array("Data mahasiswa" => $mahasiswa);

    // Menutup koneksi ke database
    mysqli_close($link);

    // Mengirimkan data dalam format JSON
    echo json_encode($mahasiswa);
} else {
    // Menampilkan pesan error jika koneksi gagal
    echo "Server error";
}

?>
