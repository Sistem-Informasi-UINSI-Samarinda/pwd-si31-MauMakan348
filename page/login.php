<?php 
session_start();
include '../config/koneksi.php';
$error = "";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <?php 
    if(isset($_POST['login'])){
        $input = $_POST['username'];
        $password = $_POST['password'];

        // Cek Input ke database
        if(filter_var($input, FILTER_VALIDATE_EMAIL)){
            $query = "SELECT * FROM users WHERE email ='$input'";
        } else {
            $query = "SELECT * FROM users WHERE username ='$input'";
        }

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])){
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
                $_SESSION['username'] = $row['username'];
                header("Location: admin/index.php");
                exit();
            }
            else {
                $error="Password Salah";
            }
        }
        else{
            $error="Username/email tidak sesuai";
        }
    }
    ?>

    <a href="../index.php" class="backlogin">Kembali</a>

    <form method="post" action="">
        <h2>Login kan dulu lee</h2><br>
        <label>Username atau Email</label> <br> 
        <input type="text" name="username" placeholder="Masukkan Username Email" required> <br>

        <label>Password</label> <br>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <?php if( $error != ""): ?>
        <p style="color:red; margin: -10px 0 5px 0; font-size: 14px;"><?= $error ?></p>
        <?php endif; ?>
        <br><br>

        <button type="submit" name="login">Login</button><br>
        <a href="register.php">Belum punya akun?</a>
    </form>
    <script src="../assets/js/register.js"></script>

    <img src="../assets/gambar/agnes-cafe.gif" class="bglogin"/>
</body>
</html>