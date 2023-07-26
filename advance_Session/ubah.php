<?php
session_start();
// cek apakah user sudah berhasil login 

//bila belum login maka lempar kembali ke halaman login 
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

//ambil data di url 
$id = $_GET["id"];
//query data mahasiswa berdasar id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


if(isset($_POST["submit"])){
    if(ubah($_POST) > 0){
        echo "
        <script>
        alert('data berhasil diubah');
        document.location.href = 'index.php'
        </script>
        ";
    }else{
        echo " 
        <script>
        alert('data gagal diubah');
        document.location.href = 'index.php'
        
        </script>
        ";
    }
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
    <h1>Ubah data</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nrp">nrp</label>
                <input type="text" name="nrp" id="nrp" required value="<?php echo $mhs["nrp"] ?>">
            </li>

            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required value="<?php echo $mhs["nama"] ?>">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required value="<?php echo $mhs["email"] ?>">
            </li>
            <li>
                <label for="jurusan">jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"] ?>">
            </li>
            <li>
                <label for="gambar">gambar</label>
                <input type="text" name="gambar" id="gambar" value="<?php echo $mhs["gambar"] ?>">
            </li>
            <li>
                <button type="submit" name="submit">ubah data</button>
            </li>
        </ul>
    </form>
</body>
</html>