<?php
    require 'koneksi.php';
    require "header.php";

    //buat statment syntax query
    $mahasiswa = "SELECT * FROM admin";
    //perintah untuk melaksanakan
    $result = mysqli_query($conn,$mahasiswa);
    //penampung
    $rows = [];
    //masukan kumpulan data ke dalam penampung
    while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    

?>

    <h1>Daftar admin</h1>
    <br>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Nama user</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach($rows as $row): ?>
        <tr>
            <td><?php echo $i?></td>
            <td>
                <a href="ubah_admin.php?id=<?php echo $row["id_login"]?>">ubah</a>
                <a href="#">hapus</a>
            </td>
            <td><?php echo $row["username"]?></td>
        </tr>
        <?php $i++;?>
        
        <?php endforeach ?>
    </table>
<?php 
    require "footer.php";
?>