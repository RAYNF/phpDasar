<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
          <!-- karena static bisa manggil fungsi dengan mudah -->
            <?php Flasher::flash();?>
        </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
          <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah data Mahasiswa
          </button>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
         <form action="<?php echo BASEURL;?>/mahasiswa/cari" method="post">
              <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="cari mahasiswa" name="keyword" id="keyword" autocomplete="off">
              <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
            </div>
        </form>
      </div>
    </div>

    <div class="col-lg-6">
        <h3>Daftar mahasiswa</h3>
        <ul class="list-group">
        <?php foreach($data['mhs'] as $mhs) :?>
        <li class="list-group-item ">
            <?php echo $mhs['nama'];?>
            <a href="<?php echo BASEURL;?>/mahasiswa/detail/<?php echo $mhs['id'];?>" class="badge text-bg-primary float-right ml-1">detail</a>

            <a href="<?php echo BASEURL;?>/mahasiswa/ubah/<?php echo $mhs['id'];?>" class="badge text-bg-warning float-right tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?php echo $mhs['id'];?>">ubah</a>

            <a href="<?php echo BASEURL;?>/mahasiswa/hapus/<?php echo $mhs['id'];?>" class="badge text-bg-danger float-right ml-1" onclick="return confirm('yakin');">hapus</a>

          </li>
        <?php endforeach; ?>
        </ul>  
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- data akan dikirimkan ke cotroler mahasiswa method tambah -->
        <form action="<?php echo BASEURL;?>/mahasiswa/tambah" method="post">
        <div class="mb-3">

        <input type="hidden" name="id" id="id">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
        <label for="nrp">Nrp</label>
        <input type="text" class="form-control" id="nrp" name="nrp">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
        <label for="jurusan">Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan">


        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
    </div>
  </div>
</div>