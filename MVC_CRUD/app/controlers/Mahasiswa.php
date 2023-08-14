<?php

class Mahasiswa extends Controller{
    public function index(){
       //ambil data dari model
       $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
       $this->view('template/header',$data);
       //kirimkan data ke halaman view
       $this->view('mahasiswa/index',$data);
       //template footer
       $this->view('template/footer');
    }

    public function detail($id){
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('template/header',$data);
        //kirimkan data ke halaman view
        $this->view('mahasiswa/detail',$data);
        //template footer
        $this->view('template/footer');
    }

    //menuju form tambah data
    public function tambahForm(){
        $this->view('template/header');
        //kirimkan data ke halaman view
        $this->view('mahasiswa/tambah');
        //template footer
        $this->view('template/footer');
    }
//proses tambah data
    public function tambah(){
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST)>0){
            //arahkan kembali ke halaman awal
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
        else{
           //arahakan kembali ke halaman awal
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }
//proses hapus data
    public function hapus($id){
        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id)>0){
            //kalau berhasil ditambahkan maka panggil class flasher dengan method setFlash
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
        else{
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }

     //menuju form edit data
     public function ubahForm($id){
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('template/header');
        //kirimkan data ke halaman view
        $this->view('mahasiswa/ubah',$data);
        //template footer
        $this->view('template/footer');
    }


//proses ubah data
    public function ubah(){
        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST)>0){
            //arahkan kembali ke halaman awal
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
        else{
           //arahakan kembali ke halaman awal
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }
}