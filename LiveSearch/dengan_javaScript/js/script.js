//ambil elment" yang dibutuhkan dengan teknik penelusuran DOM

//javascript tolong carikan saya element yang punya id keyword yang berada pada document
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

//untuk menjalankan ajax kita butuh triger

//contoh sederhana
// tombolCari.addEventListener('click',function(){
//     alert('berhasil');
// })

//tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup',function(){

    // contoh ambil apa yang dituliskan di tabel dan tampilkan di console
    // console.log(keyword.value);

    //buat object ajax (template)
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax 
    xhr.onreadystatechange = function(){
        if(xhr.readyState==4 && xhr.status == 200){

            //apapun sumbernya akan muncul sebagai repond text
            // console.log(xhr.responseText);

            //panggil container dan isi dengan apapun yang didapat daari respond sumbernya
            container.innerHTML = xhr.responseText;

        }
    }

//eksekusi ajax
//request,sumber,sinkronus/asyncronus dan sambil ngirimin keyword
xhr.open('GET','ajax/mahasiswa.php?keyword=' + keyword.value,true);
xhr.send();

});



