<?php
// ambil fungsi dari functions.php
    require 'functions.php';

    // jalankan fungsi query yang ada di functions.php
    $mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>

    <br>
    <a href="tambah.php">tambah Data</a>
    <table border="1"cellpadding= "10">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Jurusan</th>
        </tr>
        <!-- buat variabel i sebagai penomoran table html -->
        <?php $i = 1 ?>
        <!-- buat perulangan untuk menampilkan data -->
        <!-- $mahasiswa di ambil dari atas -->
        <?php foreach($mahasiswa as $row): ?>
        <tr>
            <td><?php echo $i?></td>
            <td>
                <a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a>
                <a href="hapus.php?id=<?php echo $row["id"];?>" onclick="return confirm('yakin');" >hapus</a>
            </td>
            <!-- tampilkan $row yang bernama kolom nama -->
            <td><?php echo $row["nama"]?></td>
            <td><?php echo $row["jurusan"]?></td>
        </tr>
        <?php $i++;?>
        <!-- batas perulangan  -->
        <?php endforeach ?>
    </table>
</body>
</html>