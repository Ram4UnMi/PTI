<?php
// Membuka file JSON
$file = file_get_contents('http://localhost/folderAnda/api/konversi.php');
$json = json_decode($file, true);

foreach ($json as $key) {
    if (is_array($key)) {
        foreach ($key as $subKey => $value) {
            echo $subKey . ' : ' . $value . '<br />';
        }
    }
    echo "<br>";
}
?>
