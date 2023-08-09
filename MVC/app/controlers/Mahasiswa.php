<?php 
class Mahasiswa extends Controller{
    public function index(){
        //buat judul
        $data['judul'] = 'daftar mahasiswa';
        //ambil data dari model
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('template/header',$data);
        //kirimkan data ke halaman view
        $this->view('mahasiswa/index',$data);
        //template footer
        $this->view('template/footer');
    }
}