<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    //koneksi database
    public function __construct()
    {
        //data souce name
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;
        //harus ada cadangan untuk mengoptimasi koneksi
        $option = [
            //berfungsi agar koneksi ke database terjaga terus
            PDO::ATTR_PERSISTENT => true,
            //untuk mode error nya tampilkan eksepsi nya
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->dbh = new PDO($dsn,$this->user,$this->pass,$option);
        }catch(PDOException $e){
            die ($e->getMessage());
        }
    }

    //fungsi menjalankan query 
    public function query($query){
        //nyiapin permintaan user agar dapat dipakai secara flexibel
        $this->stmt = $this->dbh->prepare($query);
    }

    //parameter
    public function bind($param,$value,$type=null){
        if(is_null($type)){
            //agar switch nya jalan saja
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                $type = PDO::PARAM_STR;
            }
        }
        //sql nya dibersihkan melalui tahap diatas agar aman
        $this->stmt->bindValue($param,$value,$type);
    }
    //eksekusi
    public function execute(){
        $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);

    }
    //menghitung berapa baris yang baru berubah di tabel nya

    public function rowCount(){
        return $this->stmt->rowCount();
    }
}