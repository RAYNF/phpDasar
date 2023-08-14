<h1>Hallo</h1>

<a href="<?php echo BASEURL;?>/mahasiswa/tambahForm" class="tombolTambahData">tambah</a>
<?php foreach($data['mhs']as $mhs) :?>
<ul>
    <li><?php echo $mhs['nama'];?></li>
    <li><a href="<?php echo BASEURL;?>/mahasiswa/detail/<?php echo $mhs['id'];?>">detail</a></li>
    <li><a href="<?php echo BASEURL;?>/mahasiswa/ubahForm/<?php echo $mhs['id'];?>" data-id="<?php echo $mhs['id'];?>" class="tampilModalUbah">ubah</a></li>
    <li><a href="<?php echo BASEURL;?>/mahasiswa/hapus/<?php echo $mhs['id'];?>" onclick="return confirm('yakin');">hapus</a></li>
</ul>
<?php endforeach ?>