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
   
    
    //pagination
    //konfigurasi
    $jumlahDataPerHalaman = 2;
    //menghitung jumlah data
    // $result=mysqli_query($conn,"SELECT * FROM mahasiswa");
    // $jumlahData = mysqli_num_rows($result);
    
    //atau 
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    
    //hitung jumlah halaman
    $jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman) ;
    
    //jika user masih di index
    if(isset($_GET["halaman"])){

        //sekarang berada pada halaman brp
        $halamanAktif = $_GET["halaman"];
    }else{
        $halamanAktif = 1;
    }
    
    //diringkas --> $halamanAktif = (isset($_GET["halaman"])? $_GET["halaman"] : 1);
    $awalData = ($jumlahDataPerHalaman*$halamanAktif)-$jumlahDataPerHalaman;

    
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC LIMIT $awalData ,$jumlahDataPerHalaman");
    //tampilkan 2 data mulai dari data ke 2

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
</head>
<body>
    
    <h1>Daftaar Mahasiswa</h1>
    <!-- pencarian -->
    <form action="" method="post">

        <input type="text"name = "keyword" size="30" autofocus placeholder="masukan keyword pencarian..." autocomplete="off">
        <button type="submit" name="cari">cari</button>
    </form>
    <!-- tambah data -->
    <br>
    <a href="tambah.php">tambah data</a>
    <br>


    <!-- Navigasi -->
    <!-- tanda panah kurang -->
    <?php if($halamanAktif>1):?>
    <a href="?halaman=<?php echo $halamanAktif-1;?>">&laquo;</a>
    <?php endif;?>

    <!-- tanda panah tambah -->
    <?php if($halamanAktif<$jumlahHalaman):?>
    <a href="?halaman=<?php echo $halamanAktif+1;?>">&raquo;</a>
    <?php endif;?>

      <!--jumlah halaman  -->
    <?php for($i = 1;$i<= $jumlahHalaman;$i++) : ?>
        <?php if($i == $halamanAktif): ?>
        <a href="?halaman=<?php echo $i;?>" style="font-weight: bold;color:red"><?php echo $i;?></a>
        <?php else: ?>
            <a href="?halaman=<?php echo $i;?>"><?php echo $i;?></a>
        <?php endif;?>
    <?php endfor;?>
    <br>
    
    <!-- Logout -->
    <a href="logout.php">LogOut</a>
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
            <td><?php echo $i ?></td>
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
</body>
</html>