<div class="container mt-5">

    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
                <form action="<?= BASEURL.'/Mahasiswa/tambah/';?>" method="post">

                    <table cellspacing="0" border="1">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="nama"></td>
                        </tr>
                        <tr>
                            <td>NRP</td>
                            <td>:</td>
                            <td><input type="number" name="nrp"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td><select name="jurusan">
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sastra Hewan">Sastra Hewan</option>
                                    <option value="Manajemen Amal">Manajemen Amal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-primary" type="submit" name="submit">Tambah Data</button></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                </form>
        </div>
    </div>




</div>