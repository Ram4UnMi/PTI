<head>
    <title>Simpan Berita</title>
</head>
<center>
<body>

<?php 
include "db.php"; 

if (isset($_POST['simpan'])) { 
    $judul_id = $_POST['judul_berita_indonesia']; 
    $judul_en = $_POST['judul_berita_inggris']; 
    $isi_id = $_POST['isi_berita_indonesia']; 
    $isi_en = $_POST['isi_berita_inggris']; 
    $ekstensi_diperbolehkan = array('png', 'jpg', 'pdf', 'zip'); 
    $nama = $_FILES['file']['name']; 
    $x = explode('.', $nama); 
    $ekstensi = strtolower(end($x)); 
    $ukuran = $_FILES['file']['size']; 
    $file_tmp = $_FILES['file']['tmp_name']; 

    // Cek ekstensi file
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) { 
        // Upload file dilarang lebih dari 1 MB (1024x1024 = 1048576) 
        if ($ukuran < 1048576) { 
            move_uploaded_file($file_tmp, 'berkas/' . $nama); 

            $hasil = mysqli_query($mysqli, 
                "INSERT INTO berita_tamu VALUES (NULL, NOW(), '$judul_id', '$judul_en', '$isi_id', '$isi_en', '$nama_file', 'T')"); 

            if ($hasil) { 
                echo 'Proses Upload File : Berhasil'; 
                echo '<a href="index.php">Kembali Ke Halaman Berita</a>'; 
            } else { 
                echo 'Proses Upload File : Gagal'; 
                echo '<a href="index.php">Kembali Ke Halaman Berita</a>'; 
                echo '<a href="tambah_berita.php">Kembali Ke Form Tambah Berita</a>'; 
            } 
        } else { 
            echo 'Ukuran File Terlalu Besar'; 
        } 
    } else { 
        echo 'File yang dikirim terindikasi BERBAHAYA'; 
    } 
} 
?>

</body>
</center>