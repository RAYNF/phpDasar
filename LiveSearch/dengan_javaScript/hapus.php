<?php
session_start();
// cek apakah user sudah berhasil login 

//bila belum login maka lempar kembali ke halaman login 
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

    require 'functions.php';
    $id = $_GET["id"];

    if(hapus($id)>0){
        echo "
        <script>
        alert('data gagal dihapus');
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