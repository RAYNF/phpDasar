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
        
        private $table = 'mahasiswa';
        private $db;

        public function __construct()
        {
          $this->db = new Database();
        }

        public function getAllMahasiswa(){
          $this->db->query('SELECT * FROM '.$this->table);
          return $this->db->resultSet();
        }

        public function getMahasiswaById($id){
          $this->db->query('SELECT * FROM '.$this->table.' WHERE id =:id');
          $this->db->bind('id',$id);
          return $this->db->single();
        }

        //tambah data
        public function tambahDataMahasiswa($data){
          //penulisan sintax dengan metode binding
          $query = "INSERT INTO mahasiswa VALUES ('',:nama,:nrp,:email,:jurusan)";

          $this->db->query($query);
          $this->db->bind('nama',$data['nama']);
          $this->db->bind('nrp',$data['nrp']);
          $this->db->bind('email',$data['email']);
          $this->db->bind('jurusan',$data['jurusan']);

          $this->db->execute();

          return $this->db->rowCount(); 
        }


        //hapus data
        public function hapusDataMahasiswa($id){
          //penulisan sintax dengan metode binding
          $query = "DELETE FROM mahasiswa WHERE id= :id";
          $this->db->query($query);
          $this->db->bind('id',$id);
          $this->db->execute();

          return $this->db->rowCount(); 
        }
    }