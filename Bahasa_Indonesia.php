<?php 
// Mulai session 
session_start(); 

$default_lang = 'bahasa_indonesia'; 

if (!isset($_SESSION['lang'])) { 
    $_SESSION['lang'] = $default_lang; 
} 

if (isset($_GET['lang'])) { 
    $_SESSION['lang'] = $_GET['lang']; 
    header("Location: index.php"); 
    exit(); // Tambahkan exit untuk menghentikan script setelah redirect
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
            <li><a href="tambah_berita.html"><?php echo $lang_menu_add; ?></a></li> 
        </ul> 
    </nav> 
    <p> 
        <?php echo $lang_selamat_datang; ?> 
    </p> 
</body> 
</html>
