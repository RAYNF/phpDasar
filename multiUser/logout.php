<?php 
//hapus session
session_start();
session_destroy();
//arahkan ke login
header("location:login.php");

?>