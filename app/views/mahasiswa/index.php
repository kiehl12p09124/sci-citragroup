<div class="container mt-5">
    <div class="row">
      <div class="col-lg-6">
          <?= Flasher::flash(); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 mb-6">
        <form method="post" action="http://localhost/phpmvc/public/mahasiswa/cari">
          <div class="input-group">
            <input class="form-control" type="search" name="cari" id="cari" placeholder="Cari Mahasiswa.." autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-success" type="submit">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
          <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" id="tombolTambah" data-toggle="modal" data-target="#exampleModal">
              Tambah Data Mahasiswa
          </button>
            <br><br>
            <h3>Daftar Mahasiswa</h3>

                <ul class="list-group">
            <?php foreach ($data['mhs'] as $mhs):?>
                    <li class="list-group-item"><?= $mhs['nama']; ?>
                    <a class="badge badge-primary float-right ml-1" href="<?= BASEURL.'/Mahasiswa/detail/'. $mhs['id']; ?>">Detail</a>
                    <a href="<?= BASEURL;?>/Mahasiswa/getUbah" class="badge badge-success float-right ml-1 tombolUbah" data-toggle="modal" data-target="#exampleModal" data-id="<?= $mhs['id'];?>">Ubah</a>
                        <a href="<?= BASEURL;?>/Mahasiswa/hapus/<?= $mhs['id'];?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Apa Anda Yakin Ingin Menghapus data Ini?')">Hapus</a>
                    </li>
            <?php endforeach;?>
                </ul>
        </div>
    </div>






    <!-- Modal -->
    <form action="<?= BASEURL.'/Mahasiswa/tambah';?>" method="post" id="form">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-5">
                    <input type="hidden" name="id" id="id" value="">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input class="form-control" type="text" name="nama" id="nama" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="nrp">NRP</label>   
                    <input class="form-control" type="number" name="nrp" id="nrp" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="jurusan">Jurusan</label>  
                  <select class="form-control" name="jurusan" id="jurusan">
                      <option value="Teknik Informatika">Teknik Informatika</option>
                      <option value="Sastra Hewan">Sastra Hewan</option>
                      <option value="Manajemen Amal">Manajemen Amal</option>
                    </select>
                    
                  </div>
                            

                  
                  
                  
                  
                </div>
              </div>
              <div class="modal-footer">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>      
      </div>
    </div>
  </div>
</div>
</div>
</form>