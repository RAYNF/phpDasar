<?php 

class About extends Controller{
    public function index($nama = "joko",$pekerjaan= "progammer"){
        // echo "hallo nama $nama dan saya $pekerjaan";
        
        //bawa data inputan user
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;

        $data['judul'] = 'About index';
        //antarkan ke halaman about/index beserta bawa data inputan user
        $this->view('template/header',$data);
        $this->view('about/index',$data);
        $this->view('template/footer');

    }
    public function page(){
        // echo 'About/page';
        $data['judul'] = 'About page';

        //antarkan ke halaman about/page
        $this->view('template/header',$data);
        $this->view('about/page');
        $this->view('template/footer');
    }
}