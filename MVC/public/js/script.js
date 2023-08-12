$(function() {
    $('.tombolTambahData').on('click',function(){
        $('#formModalLabel').html('tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('tambah Data');
    });

    //jquey tolong apabila kelas , jalankan fungsi berikut
    $('.tampilModalUbah').on('click',function(){
        $('#formModalLabel').html('ubah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('ubah Data');
        $('.modal-body form').attr('action','http://localhost/belajar/phpDasar/MVC/public/mahasiswa/ubah');

        //ambil data 
        const id = $(this).data('id');
        
        //jalankan ajax nya
        $.ajax({
            url: 'http://localhost/belajar/phpDasar/MVC/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){

                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
            }
        });

    });



});
