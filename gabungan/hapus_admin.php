<?php
    require 'koneksi.php';
    require "header.php";
    //nangkep id login yang dikirim 
    $id = $_GET["id_login"];

    $query = "DELETE FROM admin WHERE id_login = $id";
    $a = mysqli_query($conn,$query);

    if($a){
        echo "
        <script>
        alert('user berhasil dihapus');
        document.location.href = 'daftar_admin.php';
        </script>
        ";
        }else{
        echo " 
        <script>
        alert('user gagal dihapus');
        document.location.href = 'daftar_admin.php';
        </script>
        ";
        }
?>


<?php
    require 'footer.php';
?>