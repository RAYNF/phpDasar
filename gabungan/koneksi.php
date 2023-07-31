<?php 
    $db_host="localhost";
    $db_name="root";
    $db_pasword="";
    $db_table="coba_phpdasar";

    $conn = mysqli_connect($db_host,$db_name,$db_pasword,$db_table);

    if($conn != true){
        echo "koneksi gagal";
    }
   
?>
