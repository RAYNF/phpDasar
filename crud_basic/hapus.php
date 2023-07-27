<?php 
    require 'functions.php';

    //ambil id dari bagan yang di pilih 
    $id = $_GET["id"];
    
    // jikah hapus berhasil maka
    if(hapus($id)>0){
        echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = 'index.php'
        </script>
        ";
    }else{
        echo "
        <script>
        alert('data gagal dihapus');
        document.location.href = 'index.php'
        </script>
        ";
    }
?>