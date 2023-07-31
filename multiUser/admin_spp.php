<?php 
    include 'inc_header.php';
    if(!in_array("spp",$_SESSION['admin_akses'])){
        echo "kamu tidak punya akses";
        include ("inc_footer.php");
        exit();
    }
?>
    
    <h1>halaman spp</h1>
    <p>Selamat datang di halaman spp</p>

<?php 
    include 'inc_footer.php';
?>