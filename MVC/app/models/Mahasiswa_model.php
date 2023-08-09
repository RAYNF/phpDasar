<?php
    class Mahasiswa_model{
        
        // private $mhs =[
        //     ["nama" => "Dody",
        //     "nrp" => "1111",
        //     "email" => "Dody@gmail.com",
        //     "jurusan" => "TI"],
        //     ["nama" => "joko",
        //     "nrp" => "1222",
        //     "email" => "joko@gmail.com",
        //     "jurusan" => "TI"],
            
        // ];
        
        //driver pdo koneksi database
        private $dbh;
        private $stmt;

        public function getAllMahasiswa(){
          $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
          $this->stmt->execute();
          return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }