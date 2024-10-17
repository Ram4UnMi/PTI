<?php
// Mulai session
session_start();

// Set default bahasa
$default_lang = 'bahasa_indonesia';

// Cek apakah session bahasa sudah ada
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = $default_lang;
}

// Cek apakah ada perubahan bahasa
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    header("Location: index.php");
    exit;
}

// Masukkan file bahasa yang sedang aktif
include $_SESSION['lang'] . '.php';
?>

<html>
<head>
    <title><?php echo $lang_judul; ?></title>
</head>
<body>
    <a href="?lang=bahasa_inggris">Bahasa Inggris</a>
    <a href="?lang=bahasa_indonesia">Bahasa Indonesia</a>

    <nav>
        <ul>
            <li><a href="#"><?php echo $lang_menu_home; ?></a></li>
            <li><a href="#"><?php echo $lang_menu_profile; ?></a></li>
            <li><a href="#"><?php echo $lang_menu_contact; ?></a></li>
            <li><a href="login_berita.php"><?php echo $lang_menu_add; ?></a></li>
        </ul>
    </nav>

    <p>
        <?php echo $lang_selamat_datang; ?>
    </p>

    <table border="1">
        <?php
        include "db.php";

        // Cek bahasa untuk menampilkan judul tabel
        if ($_SESSION['lang'] == "bahasa_indonesia") {
            echo "<tr>
                    <th>Id</th>
                    <th>Waktu</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Nama File</th>
                  </tr>";
        } else {
            echo "<tr>
                    <th>Id</th>
                    <th>Time</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>File Name</th>
                  </tr>";
        }

        // Query data dari database
        $sql = "SELECT * FROM berita_tamu ORDER BY id_berita ASC";
        $hasil = mysqli_query($mysqli, $sql);

        // Cek apakah data ada
        if ($hasil) {
            while ($row = mysqli_fetch_row($hasil)) {
                list($id_berita, $waktu_berita, $judul_id, $judul_en, $isi_id, $isi_en, $nama_file, $dihapus) = $row;

                // Cek bahasa untuk menampilkan data
                if ($_SESSION['lang'] == "bahasa_inggris") {
                    echo "<tr>
                            <td>$id_berita</td>
                            <td>$waktu_berita</td>
                            <td>$judul_en</td>
                            <td>$isi_en</td>
                            <td><a href='berkas/$nama_file'>$nama_file</a></td>
                          </tr>";
                } else {
                    echo "<tr>
                            <td>$id_berita</td>
                            <td>$waktu_berita</td>
                            <td>$judul_id</td>
                            <td>$isi_id</td>
                            <td><a href='berkas/$nama_file'>$nama_file</a></td>
                          </tr>";
                }
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>