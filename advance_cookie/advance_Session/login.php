<?php
    //jalankan perintah session
    session_start();

    require 'functions.php';

    //cek apakah seblumnya ada cookienya
    if(isset($_COOKIE['id'])&& isset($_COOKIE['key'])){
       $id = $_COOKIE['id'];
       $key = $_COOKIE['key'];

       //ambil username bersaarkan id
        $result = mysqli_query($conn,"SELECT username FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        //cek cookie dan username
        if($key === hash('sha256',$row['username'])){
            $_SESSION['login'] = true;
        }
    }

    if(isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }

    //$_POST itu semacam fungsi buatan php yang dapat menyimpan kata
    if(isset($_POST["login"])){
        //masukan username yang di inputkan user kedalam variabel $username 
        $username = $_POST["username"];
        $password = $_POST["password"];

        // echo ($username);
        
        //syntax sql yang berguna untuk mengecek apakah username ada yang sama dengan yang di database
        $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

        //cek username, apabila dari pengecekan menghasilkan angka 1 maka
        if(mysqli_num_rows($result)===1){
            //kalau ada cek password
            $row = mysqli_fetch_assoc($result);
            //fungsi password mengecek apakah sama
            if(password_verify($password,$row["password"])){
                
                //set session
                $_SESSION["login"] = true;

                //cek remember me
                if(isset($_POST['remember'])){
                    //buat cookie


                    setcookie('id',$row['id'],time()+60);
                    setcookie('key',hash('sha256',$$row['username']),time()+60);
                }

                //jika sama maka arah kan ke index.php
                header("Location: index.php");
                //jika beda exit 
                exit;
            }
        }
        $error = true;

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>

    <?php if(isset($error)):?>
        <p style="color: red;font-style:italic">username/password salah</p>
    <?php endif ?>

    <form action="" method="post">

        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username"id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>