<?php 
    include 'inc_header.php';
    if(!in_array("guru",$_SESSION['admin_akses'])){
        echo "kamu tidak punya akses";
        include ("inc_footer.php");
        exit();
    }
  
?>
    
    <h1>halaman guru</h1>
    <p>Selamat datang di halaman guru</p>

<?php 
    include 'inc_footer.php';
?>