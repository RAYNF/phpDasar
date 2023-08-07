<?php

class Home extends Controller{
    public function index(){
        // echo'home/index';

        
        //buat title
        $data['judul'] = 'Home';
        //panggil fungsi view yang berada pada controller
        $this->view('template/header',$data);
        $this->view('home/index');
        $this->view('template/footer');
    }
    
}