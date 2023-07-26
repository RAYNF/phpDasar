<?php 
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
</body>
</html>