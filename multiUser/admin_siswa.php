<?php 
    include 'inc_header.php';
    if(!in_array("siswa",$_SESSION['admin_akses'])){
        echo "kamu tidak punya akses";
        include ("inc_footer.php");
        exit();
    }
  
?>
    
    <h1>halaman siswa</h1>
    <p>Selamat datang di halaman siswa</p>

<?php 
    include 'inc_footer.php';
?>