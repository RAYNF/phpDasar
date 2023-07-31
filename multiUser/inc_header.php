<?php

    session_start();

    require 'inc_koneksi.php';
    //jika belum login maka akan dilempar halaman login
    print_r($_SESSION['admin_akses']);
    
    if(!isset($_SESSION['admin_username'])){
        header("location:login.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app">
    <nav>
        <ul>
            <li><a href="admin_depan.php">Halaman depan</a></li>
            <!-- jika seseorang punya salah satu akses  -->
            <!--  jika user dalam hak akses punya guru,maka tampil halaman guru-->
            <?php if(in_array("guru",$_SESSION['admin_akses'])):?>
                <li><a href="admin_guru.php">Halaman guru</a></li>
            <?php endif ?>
            <?php if(in_array("siswa",$_SESSION['admin_akses'])):?>
                <li><a href="admin_siswa.php">Halaman guru</a></li>
            <?php endif ?>
            <?php if(in_array("spp",$_SESSION['admin_akses'])):?>
                <li><a href="admin_spp.php">Halaman guru</a></li>
            <?php endif ?>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    