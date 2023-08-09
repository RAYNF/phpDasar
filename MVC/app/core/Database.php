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
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->dbh = new PDO($dsn,$this->user,$this->pass,$option);
        }catch(PDOException $e){
            die ($e->getMessage());
        }
    }

    public function query($query){
        //nyiapin permintaan user agar dapat dipakai secara flexibel
        $this->stmt = $this->dbh->prepare($query);
    }

    //parameter
    public function bind($param,$type=null,$value){
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
    public function execute(){
        $this->stmt->execute();
    }

}