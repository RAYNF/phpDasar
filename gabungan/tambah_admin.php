<?php
    require 'koneksi.php';
    require "header.php";



    $username="";
    $password="";
    $err="";

    if(isset($_POST['submit'])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        //cek apakah ada yang kosong
        if($username=='' or $password==''){
            $err .= "<li>silahkam masukan username atau password </li>";
        }
        if(empty($err)){
            //buat sintaks memasukan data ke dalama databases
            $sql = "INSERT INTO admin VALUES('','$username',MD5('$password'))";
            //perintah memasukan 
         $a = mysqli_query($conn,$sql);
            //mengecek apakah berhasil atau tidak
            if($a){
                echo "
            <script>
            alert('user berhasil ditambahkan');
            </script>
            ";
            }else{
                echo " 
                <script>
                alert('user gagal ditambahkan');
                </script>
                ";
            }

        }
    }
?>
    <h1>Regestrasi</h1>
    
    <form action="" method="post">
    <?php 
            if($err){
                echo "<ul>$err</ul>";
            }
        ?>
        <ul>
            <li><input type="text" name="username" required placeholder="username"></li>
            <li><input type="password"name="password" required placeholder="password"></li>
            <button name="submit" name="submit">Tambah data</button>
        </ul>
    </form>
<?php 
    require "footer.php";
?>