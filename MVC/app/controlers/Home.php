<?php

class Home extends Controller{
    public function index(){
        // echo'home/index';

        
        //buat title
        $data['judul'] = 'Home';
        //panggil pake model yang bernama User_model dan panggil method
        $data['nama'] = $this->model('User_model')->getUser();
        //panggil fungsi view yang berada pada controller
        $this->view('template/header',$data);
        $this->view('home/index',$data);
        $this->view('template/footer');
    }
    
}