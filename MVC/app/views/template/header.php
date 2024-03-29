<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?php echo $data['judul'];?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </head>
</head>
<body>

<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
<div class="div">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo BASEURL;?>/home">PHP MVC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo BASEURL;?>/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASEURL;?>/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASEURL;?>/mahasiswa">Mahasiswa</a>
        </li>
      </ul>
    </div>
  </div>
  </div>
</nav>