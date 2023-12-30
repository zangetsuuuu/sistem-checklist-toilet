<?php
include "config/koneksi.php";

session_start();

// Proses login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users  WHERE username = '$username' AND pass = '$password'");

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["username"] = $username;
        // Login berhasil, redirect ke halaman
        header('Location: home.php');
    } else {
        // Login gagal, tampilkan pesan error
        echo "<script>alert('Username atau Password Salah!');
            window.location.href='index.php'</script>";
    }
}
?>