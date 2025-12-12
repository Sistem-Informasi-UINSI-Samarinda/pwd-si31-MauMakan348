<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id']; 
$arena = mysqli_query($conn, "select * from arena where id_arena='$id'");
$data = mysqli_fetch_assoc($arena);

if (isset($_POST['submit'])){
    $nama = $_POST['nama_arena'];
    $deskripsi = $_POST['deskripsi_arena'];
    $foto_lama =$_POST['foto_lama'];
}

?>

<?php include 'includes-admin/admin-meta.php'; ?>
<?php include 'includes-admin/admin-sidebar.php'; ?>

<div class="main-content-edit">
    <header class="kudakan1-edit">
        <a href="arenakan.php">Kembali</a>
    </header>

    <section>
    </section>

</div>

<?php include 'includes-admin/admin-footer.php'; ?>