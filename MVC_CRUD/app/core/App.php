<?php

class App{

    //web default
    protected $controller = 'Mahasiswa';
    protected $method ='index';
    protected $params = [];
    
    public function __construct()
    {
        $url = $this->parseURL();
        
         // controller
         //cek apakah ada controller yang bernama inputan user yang lokasi nya di controlers
        if( file_exists('../app/controlers/' . $url[0] . '.php')) {
            //kalau ada
            $this->controller = $url[0];
            //terus di hapus
            unset($url[0]);
            // var_dump($url);
        }
        
        //kalau contoler inputan user tidak ada maka pakau controler default 
        require_once '../app/controlers/ '. $this->controller .'.php';
        //jalankan
        $this->controller = new $this->controller;
    }

}