<!-- belum selesai -->

<?php
    require 'koneksi.php';
    require "header.php";
    $id = $_GET["id_login"];
    $mhs = "SELECT * FROM admin WHERE id = '$id'";

?>

    <h1>Rubah Admin</h1>
    <form action="" method="post">
    <?php 
            if($err){
                echo "<ul>$err</ul>";
            }
        ?>
        <ul>
            <li><input type="text" name="username" required placeholder="username" value=""></li>
            <li><input type="password"name="password" required placeholder="password"></li>
            <button name="submit" name="submit">Tambah data</button>
        </ul>
    </form>
<?php 
    require "footer.php";
?>