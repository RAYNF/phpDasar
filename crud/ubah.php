<?php
//panggil bernama functions.php
    require 'functions.php';

    //dapatkan id dari bagan yang dipilih
    $id = $_GET["id"];

    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//cek apakah $_post submit sudah ada isinya
    if(isset($_POST["submit"])){
        //jika sudah cek apakakah fungsi tambah $_post nilai lebih dari 0
        if(ubah($_POST) > 0){
            echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
            </script>
            ";
        }else{
            echo " 
            <script>
            alert('data gagal diubah');
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
    <h1>Ubah data</h1>

    <form action="" method="post">
        <!-- tampilkan id nya juga, tetapi di sembunyikan  -->
        <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
        <ul>
            <li>
                <!-- beri values agar data yang ada didatabase dapat muncul -->
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