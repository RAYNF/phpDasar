<?php
//jalankan session 
session_start();
//agar pasti hilang,lakukan perintah di bawah ini 
session_unset();
session_destroy();

//tendang ke halaman login
header("Location: login.php");
exit;


?>