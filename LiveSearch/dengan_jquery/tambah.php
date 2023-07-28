<?php
session_start();
// cek apakah user sudah berhasil login 

//bila belum login maka lempar kembali ke halaman login 
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
// $conn = mysqli_connect("localhost","root","","phpdasar");


// //cek apakah tombol submit sudah di tekan
// if(isset($_POST["submit"])){
//     //ambil data tiap element dalam form
//     $nrp = $_POST["nrp"];
//     $nama = $_POST["nama"];
//     $email = $_POST["email"];
//     $jurusan = $_POST["jurusan"];
//     $gambar = $_POST["gambar"];

//     $query = "INSERT INTO mahasiswa VALUES (
//         '','$nrp','$nama','$email','$jurusan','$gambar'
//         )";
//     mysqli_query($conn,$query);

//     //cek apakah data berhasil ditambah 
//     if(mysqli_affected_rows($conn)>0){
//         echo "berhasil";
//     }else{
//         echo "gagal";
//     }
// }


if(isset($_POST["submit"])){
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
   
    <title>Document</title>
</head>
<body>
    <h1>Tambah data</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">nrp</label>
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
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar">
			</li>
            <li>
                <button type="submit" name="submit">tambah data</button>
            </li>
        </ul>
    </form>
</body>
</html>