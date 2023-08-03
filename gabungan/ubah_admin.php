

<?php
    require 'koneksi.php';
    require "header.php";
    //nangkep id login yang dikirim 
    $id = $_GET["id_login"];

    //ambil data

    //syntax query 
    $query = "SELECT * FROM admin WHERE id_login = '$id'";
     //perintah untuk melaksanakan
     $result = mysqli_query($conn,$query);
     //penampung
     $rows = [];
     //masukan kumpulan data ke dalam penampung
     while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }

    //update data

    //cek apakah $_POST submit sudah ada isinya
    if(isset($_POST["submit"])){
        $id = $_POST["id_login"];
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $query1 = "UPDATE admin SET
                    username = '$username',
                    password = '$password'
                    WHERE id_login = $id
                  ";
        
        $a = mysqli_query($conn,$query1);
        
        if($a){
        echo "
        <script>
        alert('user berhasil ditambahkan');
        document.location.href = 'daftar_admin.php';
        </script>
        ";
        }else{
        echo " 
        <script>
        alert('user gagal ditambahkan');
        document.location.href = 'daftar_admin.php';
        </script>
        ";
        }
    }

?>

    <h1>Rubah Admin</h1>
    <form action="" method="post">
    <?php foreach($rows as $row): ?>
        <ul>
            
            <li><input type="text" name="username" value="<?php echo $row["username"];?>">
            <li> <input type="text" name="password"></li>

            <input type="hidden" name="id_login" value="<?php echo $row["id_login"]; ?>">
          

            <button name="submit" name="submit">Ubah data</button>
        </ul>
        <?php endforeach ?>
    </form>
<?php 
    require "footer.php";
?>