<?php 
    $db_host ="localhost";
    $db_name = "root";
    $db_password ="";
    $db_tabel="phpdasar";

    $conn = mysqli_connect($db_host,$db_name,$db_password,$db_tabel);
    if(!$koneksi = 1){
        die("koneksi sukses");
    }
    
?>