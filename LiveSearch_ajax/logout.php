<?php
//jalankan session 
session_start();
//agar pasti hilang,lakukan perintah di bawah ini 
session_unset();
session_destroy();

setcookie('id','',time()-3600);
setcookie('key','',time()-3600);

//tendang ke halaman login
header("Location: login.php");
exit;


?>