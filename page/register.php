<?php
session_start();
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <?php
    if (isset($_POST['register'])){
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek username sama email
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' OR username='$username'");

    if (mysqli_num_rows($check) > 0){
        echo "<script>alert('Username atau email sudah terdaftar!');</script>";
    } else {
        $query = mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");

        if($query){
            echo "<script>alert('Anda sudah terdaftar! Silakan login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal, coba lagi.');</script>";
        }
    }
}
?>

<a href="login.php" class="backlogin">Kembali</a>

<form id="register" method="post">
    <h2>Registerkan dulu lee</h2>
    <br>
    <label>Buat Username</label>
    <input type="text" name="username" placeholder="username" required >
    <label>Masukkan Email</label>
    <input type="text" id="email" name="email" placeholder="email" required >
    <p id="erroremail" class="erregis"></p>
    <label>Buat Password</label>
    <input type="password" name="password" placeholder="password" required >
    <p id="errorpw" class="erregis"></p>
    <br><br>
    <button type="submit" name="register">register</button>
</form>

<img src="../assets/gambar/uma-no.gif" class="bgregis1"/>
<img src="../assets/gambar/uma-yes.gif" class="bgregis2"/>

<script src="../assets/js/register.js"></script>

</body>
</html>