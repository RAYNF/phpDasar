<?php
  
    $conn = mysqli_connect("localhost","root","","phpdasar");

    //buat fungsi ambil data
    function query($query){
        global $conn;
        // perintah untuk mengambil data dari database
        $result = mysqli_query($conn,$query);
        // buat penampungan
        $rows = [];
        // masukan data dengan mysqli_fecth_assoc ke dalama arrows
        while($row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        // kembalikan ke wadah rows
        return $rows;
    }

    //fungsi tambah
    function tambah($data){
        //panggil fungsi conn
        global $conn;
        //masukan $data['nrp'] ke dalam variabel baru
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = $data["jurusan"];
        $gambar = $data["gambar"];

        
        $query = "INSERT INTO mahasiswa VALUES (
            '','$nrp','$nama','$email','$jurusan','$gambar'
        )";
        //masukan ke dalam databasae
        mysqli_query($conn,$query);
    
        //mengecek apakah berhasil/tidak
        //jika berhasil 1 jika tidak -1
        return mysqli_affected_rows($conn);

    }

    function ubah($data) {
        global $conn;
    
        //masukan id ke dalam variabel $id
        $id = $data["id"];
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = $data["jurusan"];
        $gambar = htmlspecialchars($data["gambar"]);
    
        //sintaks mysql
        $query = "UPDATE mahasiswa SET
                    nrp = '$nrp',
                    nama = '$nama',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                  WHERE id = $id
                ";

        //jalankan perintah mysql
        mysqli_query($conn, $query);
        
        //cek apakah berhasil atau tidak
        return mysqli_affected_rows($conn);	
    }

    function hapus($id){
        global $conn;
        //buat sintaks mysql
        mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
        //cek apakah berhasil atau tidak 
        return mysqli_affected_rows($conn);
    }
?>