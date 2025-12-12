<?php
include '../../config/koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_kuda'];
    $lahir = !empty($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : NULL;
    $kelamin = $_POST['jenis_kelamin'];
    $peternakan = $_POST['peternakan'];

    // Upload foto
    $file = $_FILES['foto_kuda']['name'];
    $tmp = $_FILES['foto_kuda']['tmp_name'];
    $folder = "../../uploads/kuda/";

    move_uploaded_file($tmp, $folder.$file);

    mysqli_query($conn, "INSERT INTO kuda (nama_kuda, tanggal_lahir, jenis_kelamin, peternakan, foto_kuda)
                         VALUES ('$nama','$lahir','$kelamin','$peternakan','$file')");

    header("Location: kudakan.php");
}
?>

 <?php include 'includes-admin/admin-meta.php'; ?>
 <?php include 'includes-admin/admin-sidebar.php'; ?>

    <div class="main-content-edit">

        <header class="kudakan1-edit">
            <a href="kudakan.php">Kembali</a>
        </header>

        <section>
            <div class="edtkuda-kontener">
            
                <h2>Tambah Data Kuda</h2>
                
                <form method="POST" enctype="multipart/form-data">

                    <div class="kudaedt-grid">

                    <div class="kudaedt-kiri">
                        <label>Nama kuda:</label>
                        <input type="text" name="nama_kuda" required>

                        <label>Tanggal lahir:</label>
                        <input type="date" name="tanggal_lahir" class="input-date">

                        <label>Jenis kelamin:</label>
                        <select name="jenis_kelamin">
                            <option value="Jantan">Jantan</option>
                            <option value="Betina">Betina</option>
                        </select>

                        <label>Peternakan:</label>
                        <input type="text" name="peternakan" required>
                    </div>

                        <div class="kudaedt-kanan">
                            <label>Preview Foto:</label>
                            <img id="previewImage" class="kudaedt-foto"><br>

                            <label>Upload foto:</label>
                            <input type="file" name="foto_kuda" id="fotoInput" accept="image/*">
                        </div>

                    </div>
                
                    <button type="submit" name="submit">Simpan</button>

                </form>
            </div>
        </section>

<script>
    document.getElementById('fotoInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('previewImage');

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
    });
</script>

    </div>
    
 <?php include 'includes-admin/admin-footer.php'; ?>
