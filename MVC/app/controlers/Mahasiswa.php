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

    public function detail($id){
        //buat judul
        $data['judul'] = 'Detail mahasiswa';
        //ambil data dari model
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('template/header',$data);
        //kirimkan data ke halaman view
        $this->view('mahasiswa/detail',$data);
        //template footer
        $this->view('template/footer');
    }

    //sama seperti php dasar
    public function tambah(){
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST)>0){
            //kalau berhasil ditambahkan maka panggil class flasher dengan method setFlash
            Flasher::setFlash('berhasil ','ditambahkan','success');

            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
        else{
            Flasher::setFlash('gagal ','ditambahkan','danger');
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id){
        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id)>0){
            //kalau berhasil ditambahkan maka panggil class flasher dengan method setFlash
            Flasher::setFlash('berhasil ','dithapus','success');

            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
        else{
            Flasher::setFlash('gagal ','dihapus','danger');
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getubah(){
       echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah(){
        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST)>0){
            //kalau berhasil ditambahkan maka panggil class flasher dengan method setFlash
            Flasher::setFlash('berhasil ','diubah','success');

            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
        else{
            Flasher::setFlash('gagal ','diubah','danger');
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari(){
        //buat judul
        $data['judul'] = 'daftar mahasiswa';
        //ambil data dari model
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('template/header',$data);
        //kirimkan data ke halaman view
        $this->view('mahasiswa/index',$data);
        //template footer
        $this->view('template/footer');
    }
}