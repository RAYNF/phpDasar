<?php 
    //buat session
    session_start();

    //jika sudah pernah dibuatkan session
    if(isset($_SESSION["admin_username"])){
        header("Location:index.php");
        exit();
    }
    require "koneksi.php";
    
    $username ="";
    $passwword ="";
    $err ="";

    //jika user sudah mengklik tombol login maka
    if(isset($_POST['login'])){
        //masukan inputan username user ke $username
        $username = $_POST['username'];
        $passwword = $_POST['password'];
        //di cek apakah inputan user kosong 
        if($username=='' or $passwword==''){
            $err .= "<li>silahkam masukan username atau password </li>";
        }
        //jika tidak ada error maka
        if(empty($err)){
            //cari didalam table admin yang username nya sama dengan inputan user
            $sql1 = "SELECT * FROM admin Where username = '$username'";
            $q1 = mysqli_query($conn,$sql1);
            $r1 = mysqli_fetch_assoc($q1);

            //cocok kan password yang di input user dengan yang di database
            if($r1['password'] != md5($passwword)){
                $err.="<li>akun tidak ditemukan</li>";
            }
        }

        //hak akses
        if(empty($err)){
            //cek apakah user tersebut punya akses
            //login id didapat dari table admin
            $login_id = $r1['id_login'];
            $sql1="SELECT * FROM admin_akses WHERE id_login = '$login_id'";
            $q1 = mysqli_query($conn,$sql1);
            while($r1 = mysqli_fetch_assoc($q1)){
                //memasukan akses id yang ada di admin_akses
                $akses[] = $r1['akses_id'];//isinya spp,guru,siswa
            }
            if(empty($akses)){
                $err .= "<li>kamu tidak punya akses</li>";
            }
        }

        //jika tidak ada error arahkan ke halaman index.php
        if(empty($err)){
            //apabila tidak ada eror maka dibuatlah session
            $_SESSION['admin_username'] = $username;
            //admin akses di simpan di session
            $_SESSION['admin_akses'] = $akses;
            header("Location: index.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <!-- jika ada yang error maka muncul peringatan  -->
    <?php 
            if($err){
                echo "<ul>$err</ul>";
            }
        ?>
    <form action="" method="post">
        <ul>
            <li><input type="text" name="username" placeholder="username"></li>
            <li><input type="password"name="password" placeholder="password"></li>
            <li><button type="submit"name="login">Login</button></li>
        </ul>
    </form>
</body>
</html>