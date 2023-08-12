<?php

//kalau tidak ada session id, jalankan session
if(!session_id()) session_start();

//memanggil semua file yang dibutuhkan 
require_once '../app/init.php';

//menjalankan kelas App
$app = new App;