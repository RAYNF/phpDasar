<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
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
            //kalau contoler inputan user tidak ada maka pakau controler default 
            // var_dump($url);
        }
     //
      require_once '../app/controlers/'. $this->controller . '.php';
      $this->controller = new $this->controller;
        
      //method
      //kalau kosongan ambil method default
      //kalau ada inputan user cek ada ndak method nya di controlers
        if(isset($url[1])){
            //cek apakah ada method nya 
            if(method_exists($this->controller,$url[1])){
                //kalau ada method nya ditimpa
                $this->method =  $url[1];
                //terus di hps
                unset($url[1]);
            }
        }

        //parameter
        //kalau tidak kosong maka berati itu parameter nya
        if(!empty($url)){

            $this->params = array_values($url);
            // var_dump($url);
        }
        //jalankan controler dan method dan kirimkan paramter jika ada
        call_user_func_array([$this->controller,$this->method],$this->params);

        // echo 'ok';
    }
    //mengambil url dan memecah 

    public function parseURL()
    {
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'],'/'); //menghapus (/) diakhir
            $url = filter_var($url, FILTER_SANITIZE_URL);  //bersih dari karakter aneh
            $url = explode('/',$url);   //memecah kata sebelum garing menjadi sendiri
            return $url;
        }
    }
}