 <?php
session_start();
include '../../config/koneksi.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<?php include 'includes-admin/admin-meta.php'; ?>
 <?php include 'includes-admin/admin-sidebar.php'; ?>


    <div class="main-content">
        <header class="inpo1">
            <h1>Welkom, <?php echo $_SESSION['username']; ?></h1>
        </header>
        <section></section>
    </div>
    
 <?php include 'includes-admin/admin-footer.php'; ?>