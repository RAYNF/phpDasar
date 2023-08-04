<?php 
    require "header.php";
?>
<!-- fitur hak akses -->
<?php 
    print_r($_SESSION['admin_akses']);
?>
<h1>Halaman beranda</h1>

<nav>
    <ul><li><a href="index.php">Halaman depan</a></li></ul>
    <!-- yang bisa melihat hanya user yang memiliki hak akses bernama guru -->
    <?php if(in_array("guru",$_SESSION['admin_akses'])):?>
    <ul><li><a href="buat_matkul.php">Tambah Matkul</a></li></ul>
    <?php endif?>
    
    <?php if(in_array("siswa",$_SESSION['admin_akses'])):?>
    <ul><li><a href="daftar_matkul.php">Daftar Matkul</a></li></ul>
    <?php endif?>
</nav>
<?php 
    require "footer.php"
?>