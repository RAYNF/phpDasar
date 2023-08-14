<h1 id="formModalLabel">tambah data</h1>

<form action="<?php echo BASEURL;?>/mahasiswa/tambah" method="post">

    <input type="hidden" name="id" id="id">

    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama">

    <label for="nrp">Nrp</label>
    <input type="text" name="nrp" id="nrp">

    <label for="email">Email</label>
    <input type="email" name="email" id="email">

    <label for="jurusan">Jurusan</label>
    <input type="text" name="jurusan" id="jurusan">

    <button type="submit">Tambah Data</button>
</form>