<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Mengkuda</title>
    <link rel="stylesheet" href="../../assets/css/adminstyle.css">
</head>
<body>
    <div class="sidebar">
        <h2>Adminkan Kuda</h2>
        <li><a href="index.php">Inpokan</a></li>
        <li><a href="#">Kudakan</a></li>
        <li><a href="#">Arenakan</a></li>
        <li><a href="#">Ceritakan</a></li>
        <li><a href="../login.php" class="logout">Logout</a></li>
    </div>

    <div>
        <header>
            <h1>Welkom, <?php echo $_SESSION['nama_lengkap']; ?></h1>
        </header>
        <section></section>
    </div>
    
</body>
</html>