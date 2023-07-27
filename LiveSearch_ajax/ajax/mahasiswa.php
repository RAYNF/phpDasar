<?php 

require '../functions.php';
//dapat dari ajax  di javascript untuk ditangkap keyword
$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE
nama LIKE '%$keyword%' OR 
nrp LIKE '%$keyword%'";

$mahasiswa = query($query);

?>
<table border="1" cellpadding = "10">
        <tr>
            <th>no</th>
            <th>aksi</th>
            <th>nama</th>
            <th>jurusan</th>
          
        </tr>
        <?php $i = 1?>
        <?php foreach($mahasiswa as $row): ?>
        <tr>
            <td><?php echo $i?></td>
            <td>
                <a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a>
                <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin');" >hapus</a>
            </td>
            <td><?php echo $row["nama"];?></td>
            <td><?php echo $row["jurusan"];?></td>
         
        </tr>
        <?php $i++;?>
        <?php endforeach?>
    </table>