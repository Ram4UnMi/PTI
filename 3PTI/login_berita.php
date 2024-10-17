<?php
// Koneksi ke database
// $conn = mysqli_connect("localhost", "username", "password", "database");

// Cek koneksi
// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// }

// // Fungsi untuk login
// function login($username, $password)
// {
//     global $conn; // Menambahkan global untuk mengakses variabel $conn
//     $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
//     $result = mysqli_query($conn, $query);
//     $cek = mysqli_num_rows($result);
//     if ($cek > 0) {
//         return true;
//     } else {
//         return false;
//     }
// }

// // Formulir login
// if (isset($_POST['login'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     if (login($username, $password)) {
//         // Login berhasil, redirect ke halaman berita
//         header("Location: berita.php");
//         exit;
//     } else {
//         // Login gagal, tampilkan pesan error
//         $error = "Username atau password salah";
//     }
// }
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .login-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Formulir login -->
    <div class="login-container">
        <form action="tambah_berita.php" method="post">
            <h1>Formulir Login</h1>
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" size="20" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" size="20" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="login" value="Login"></td>
                </tr>
            </table>
            <?php if (isset($error)) {
                echo "<p style='color:red;'>$error</p>";
            } ?>
        </form>
    </div>

</body>

</html>