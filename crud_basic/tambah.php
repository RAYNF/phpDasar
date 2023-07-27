<?php
//panggil bernama functions.php
    require 'functions.php';
//cek apakah $_post submit sudah ada isinya
    if(isset($_POST["submit"])){
        //jika sudah cek apakakah fungsi tambah $_post nilai lebih dari 0
        if(tambah($_POST) > 0){
            echo "
            <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
            </script>
            ";
        }else{
            echo " 
            <script>
            alert('data gagal ditambahkan');
            document.location.href = 'index.php';
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
    <h1>Tambah Data</h1>
    <form action=""method="post">
        <ul>
            <li>
                <label for="nrp">Nrp</label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">jurusan</label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah data</button>
            </li>
        </ul>
    </form>
    
</body>
</html>