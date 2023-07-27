<?php 
//koneksi data
$conn = mysqli_connect("localhost","root","","phpdasar");

//buat function ambil data
function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){

    global $conn;

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = $data["jurusan"];

    // $gambar = $data["gambar"];
    //upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;

    }

    $query = "INSERT INTO mahasiswa VALUES (
        '','$nrp','$nama','$email','$jurusan','$gambar'
    )";
    mysqli_query($conn,$query);

    //mengecek apakah berhasil/tidak
    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "<script>
               alert('plih gambar dahulu');
               </script> ";
            return false;
    }

    //cek apakah yang diupload gambar
    $ekstensiGambarValid =['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

    //cek jika ukuran teralu besar
    if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}
    

    //upload gambar
    // move_uploaded_file($tmpName,'dasar/'. $namaFile);

    // //generate nama unique
    // return $namaFile;
    $namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'dasar/' . $namaFileBaru);

	return $namaFileBaru;
}

function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = $data["jurusan"];
    $gambar = $data["gambar"];

    $query = "UPDATE mahasiswa SET 
        nrp = '$nrp',
        nama = '$nama',
        email = '$email',
        jurusan = '$jurusan',
        gambar = '$gambar'
        WHERE id = $id
    ";
    mysqli_query($conn,$query);

    //mengecek apakah berhasil/tidak
    return mysqli_affected_rows($conn);

}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE
    nama LIKE '%$keyword%' OR 
    nrp LIKE '%$keyword%'
    ";
    return query($query);
}

function registrasi($data){
    global $conn;

    //hurufnya di kecilkan dan dihilangkan karakter aneh"
    $username = strtolower(stripslashes($data["username"]));
    
    //untuk memasukan tanda kutip di database
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    //cek apakah username atau password sudah ada atau belum
   $result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");

   if(mysqli_fetch_assoc($result)){
    echo "<script>
    alert('pusername sudah terdaftar');
    </script>";
    return false;
   }

    //cek konfirmasi password
    if($password !== $password2){
        echo "<script>
        alert('password tidak sesuai');
        </script>";
        return false;
    }

    //enkripsi password
    //password apa yang dia acak,alogoritma apa yang digunakan
    $password = password_hash($password,PASSWORD_DEFAULT);

   //tambahkan user baru ke database
   mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");

   //cek apakah berhasil
   return mysqli_affected_rows($conn);
}

?>
