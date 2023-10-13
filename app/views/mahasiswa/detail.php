<div class="container mt-5">

    <div class="row">
        <div class="col-6">
            <h3>Data Mahasiswa</h3>

                <ul class"list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center ">Nama :<?= $data['mhs']['nama']; ?></li>
                    <li class="list-group-item d-flex justify-content-between align-items-center ">NRP :<?= $data['mhs']['nrp']; ?></li>
                    <li class="list-group-item d-flex justify-content-between align-items-center ">Email :<?= $data['mhs']['email']; ?></li>
                    <li class="list-group-item d-flex justify-content-between align-items-center ">Jurusan :<?= $data['mhs']['jurusan']; ?></li>
                    <li class="list-group-item d-flex justify-content-between align-items-center "><a href="<?= BASEURL.'/Mahasiswa/'; ?>">Kembali</a></li>
                </ul>
                
        </div>
    </div>




</div>