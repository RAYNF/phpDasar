<h1>ubah data</h1>

<form action="<?php echo BASEURL;?>/mahasiswa/ubah" method="post">

    <input type="hidden" name="id" id="id" value="<?php echo $data['mhs']['id']; ?>">

    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" value="<?php echo $data['mhs']['nama']; ?>">

    <label for="nrp">Nrp</label>
    <input type="text" name="nrp" id="nrp" value="<?php echo $data['mhs']['nrp']; ?>">

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?php echo $data['mhs']['email']; ?>">

    <label for="jurusan">Jurusan</label>
    <input type="text" name="jurusan" id="jurusan" value="<?php echo $data['mhs']['jurusan']; ?>">

    <button type="submit">Ubah</button>
</form>