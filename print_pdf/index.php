<?php 
session_start();
    // cek apakah user sudah berhasil login 

    //bila belum login maka lempar kembali ke halaman login 
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }

   // ambil data dari functions.php
    require  'functions.php';
    // if($conn == false){
    //     // echo "koneksi gagal";
    // }
    // else{
    //     // echo "koneksi berhasil";
    // }
    //ambil data
    // $result = mysqli_query($conn,"SELECT * FROM mahasiswa");

    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

    //tombol cari ditekan
    if(isset($_POST["cari"])){
        $mahasiswa = cari($_POST["keyword"]);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .loader{
            width: 100px;
            position: absolute;
            top: 55px;
            left: 220px;
            z-index: -1;
            display: none;
        }
    </style>
</head>
<body>
    
    <h1>Daftaar Mahasiswa</h1>
    <!-- pencarian -->
    <form action="" method="post">

        <input type="text"name = "keyword" size="30" autofocus placeholder="masukan keyword pencarian..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">cari</button>
        <img src="dasar/loader.gif" alt="" class="loader">
    </form>

    <!-- tambah data -->
    <br>
    <a href="tambah.php">tambah data</a>
    <br>
    <!-- Logout -->
    <a href="logout.php">LogOut</a>
    
    <!-- cetak -->
     <a href="cetak.php">Cetak</a>

    <!-- table -->
    <div id="container">
    <table border="1" cellpadding = "10">
        <tr>
            <th>no</th>
            <th>aksi</th>
            <th>nama</th>
            <th>jurusan</th>
          
        </tr>
        <?php $i = 1?>
        <?php foreach($mahasiswa as $row): ?>
        <tr>
            <td><?php echo $i?></td>
            <td>
                <a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a>
                <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin');" >hapus</a>
            </td>
            <td><?php echo $row["nama"];?></td>
            <td><?php echo $row["jurusan"];?></td>
         
        </tr>
        <?php $i++;?>
        <?php endforeach?>
    </table>
    </div>

    <!-- manggil jquery -->
    <script src="js/jquey.js"></script>
    <script src="js/script.js"></script>
</body>
</html>