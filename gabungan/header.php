<?php 
    //buat session
    session_start();

    require 'koneksi.php';
    //jika belum login maka di kembalikan ke halaman login
    if(!isset($_SESSION['admin_username'])){
        header("Location:login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
</head>
<body>
    <h1>To do list</h1>
    <nav>
        <ul>
            <li><a href="logout.php">Logout</a></li>
            <?php if(in_array("admin",$_SESSION['admin_akses'])):?>
            <li><a href="daftar_admin.php">Daftar admin</a></li>
            <?php endif?>
            <li><a href="index.php">Beranda</a></li>
        </ul>
    </nav>
    