$(function(){

    $('#tombolTambah').on('click', function(){

        $('#exampleModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#form').attr('action', 'http://localhost/phpmvc/public/Mahasiswa/tambah');
        $('#nama').val("");
        $('#nrp').val("");
        $('#email').val("");
        $('#jurusan').val("Teknik Informatika");
        
    });

    $('.tombolUbah').on('click', function(){

        $('#exampleModalLabel').html("Ubah Data Mahasiswa ");
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('#form').attr('action', 'http://localhost/phpmvc/public/Mahasiswa/ubah');


        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getUbah',
            data: {id : id},
            method: 'post',
            type: 'json',
            success: function(data){

                data = JSON.parse(data);
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
            }
        });
    });



})