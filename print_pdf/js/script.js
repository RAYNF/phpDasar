//memanggil jquery untuk ambil document

//jquery tolong ambilkan document,ketika document itu siap jalankan fungsi berikut
$(document).ready(function(){

    //buat event menghilangkan tombol cari
    $('#tombol-cari').hide();

    //buat evemt ketika keyword dituliskan live search
   $('#keyword').on('keyup',function(){
    //munculkan gambar loading
    $('.loader').show();

    // //ajax menggunakan load
    // // jquery tolong carikan element container kemudian ubah isinya dengan data yang diambil dari sumber
    // $('#container').load('ajax/mahasiswa.php?keyword='+$('#keyword').val());
    // // load hanya bisa get,tidak bisa post 

    $.get('ajax/mahasiswa.php?keyword='+ $('#keyword').val(),function(data){
        $('#container').html(data);
        $('.loader').hide();
    });

   });

});