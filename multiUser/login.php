<?php
    //
    session_start();
    //jika berhasil login, maka dibuat session langsung diarahkan admin.php
    if(isset($_SESSION['admin_username'])){
        header("Location:admin_depan.php");
        exit();
    }
use FontLib\Table\Type\head;
        //panggil file inc_koneksi.php
        require('inc_koneksi.php');
        $username="";
        $password="";
        $err="";

        //jika tombol login sudah ada isinya maka jalankan berikut
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($username == '' or $password==''){
                $err .="<li>silahkan masukan username dan password</li>";
            }
            //jika tidak ada eror maka
            if(empty($err)){
                $sql1= "SELECT * FROM admin WHERE username ='$username'";
                $q1 = mysqli_query($conn,$sql1);
                $r1 = mysqli_fetch_assoc($q1);
                //cocockan pasword yang di inout user dengan yang ada di database
                if($r1['password'] != md5($password)){
                    $err.="<li>akun tidak ditemukan</li>";
                }
            }
            if(empty($err)){
                //cek apakah user tersebut punya akses
                //login id didapat dari table admin
                $login_id = $r1['login_id'];
                $sql1="SELECT * FROM admin_akses WHERE login_id = '$login_id'";
                $q1 = mysqli_query($conn,$sql1);
                while($r1 = mysqli_fetch_assoc($q1)){
                    //memasukan akses id yang ada di admin_akses
                    $akses[] = $r1['akses_id'];//isinya spp,guru,siswa
                }
                if(empty($akses)){
                    $err .= "<li>kamu tidak punya akses</li>";
                }


            }
            //jika tidak ada eror maka arahkan ke halaman admin.pphp
            if(empty($err)){
                //buat session dengan membawa nama yang di inputkan user
                $_SESSION['admin_username'] = $username;
                //admin akses nya di simoan
                $_SESSION['admin_akses'] = $akses;
                header("Location: admin_depan.php");
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app">
        <h1>Halaman Login</h1>
        <?php 
            if($err){
                echo "<ul>$err</ul>";
            }
        ?>
        <form action="" method="post">
            
            <input type="text" name="username" id="username" placeholder="username....">
            <br>
            
            <input type="password" name="password" id="password" placeholder="password...">
            <br>
            <button type="submit" name="login">Masuk sistem</button>
        </form>
    </div>
</body>
</html>