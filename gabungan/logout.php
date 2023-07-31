<?php 
    //hapus session
    session_start();
    session_destroy();
    //pindahkan ke halaman login
    header("Location:login.php");
?>