<?php

$memo = $data['memo'];
$no = 1;
?>
<div class="card">
    <form action="<?= BASEURL . '/Memo/ubahMemo/' . $memo['id']; ?>" method="post">
        <div class="card-header">
            <div class="card-title">Tambah Data Memo</div>
            <div class="card-tools">
                <a href="<?= BASEURL . '/Memo/detail/' . $memo['id']; ?>">
                    <button class="btn btn-success btn-sm mr-2">
                        <i class="fas fa-arrow-circle-left"></i> Batal Edit
                    </button>
                </a>
            </div>
        </div>
        <div class=" card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="destination">Tujuan</label>
                                <input required class="form-control" type="text" name="destination" id="destination" placeholder="Contoh: PT. Sentral Citra Indonesia" value="<?= $memo['tujuan']; ?>">
                            </div>
                            <div class=" form-group">
                                <label for="address">Alamat</label>
                                <input required class="form-control" type="text" name="address" id="address" placeholder="Contoh: Jl. Raya Cibarusah, Bekasi" value="<?= $memo['alamat']; ?>">
                            </div>
                            <div class=" form-group">
                                <label for="type">Jenis Memo</label>
                                <select class="form-control" type="text" name="type" id="type">
                                    <option value="Pengiriman">Pengiriman Barang</option>
                                    <option value="Pengambilan">Pengambilan Barang</option>
                                    <option value="<?= $memo['jenis']; ?>" selected><?= $memo['jenis']; ?> Barang (Data Saat Ini)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="memo_date">Tanggal</label>
                                <input required class="form-control" type="date" name="memo_date" id="memo_date" value="<?= $memo['tanggal']; ?>"">
                    </div>
                </div>
                <div class=" col-6">
                                <div class="form-group">
                                    <label for="company">Perusahaan</label>
                                    <select name="company" id="company" class="form-control">
                                        <option value="CII">PT Citra Interior Indonesia (CII)</option>
                                        <option value="CF">PT. Citra Furniture Indonesia (CF)</option>
                                        <option value="SCI">PT. Sentral Citra Indonesia (SCI)</option>
                                        <option value="<?= $memo['perusahaan']; ?>" selected><?= citra($memo['perusahaan']); ?> (Data Saat Ini)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="drivers_name">Nama Supir</label>
                                    <input required class="form-control" type="text" name="drivers_name" id="drivers_name" placeholder="Contoh: Supriyadi" value="<?= $memo['nama_driver']; ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="vehicles_number">No. Kendaraan</label>
                                    <input required class="form-control" type="text" name="vehicles_number" id="vehicles_number" placeholder="Contoh: B 2772 FRK" value="<?= $memo['no_kendaraan']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="drivers_number">No. HP Supir</label>
                                    <input required class="form-control" type="text" name="drivers_number" id="drivers_number" value="<?= $memo['no_driver']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">List Barang</div>
                                    </div>
                                    <div class="card-body" id="addItem">
                                        <?php foreach ($data['barang'] as $barang) : ?>
                                            <div class="row mb-2">
                                                <div class="col-4">
                                                    <input type="hidden" name="item_id[]" value="<?= $barang['id']; ?>">
                                                    <input required type="text" name="item_name[]" id="" class="form-control" placeholder="Nama Barang" value="<?= $barang['nama_barang']; ?>">
                                                </div>
                                                <div class="col-2">
                                                    <input required type="text" name="item_info[]" id="" class="form-control" placeholder="Keterangan" value="<?= $barang['keterangan']; ?>">
                                                </div>
                                                <div class="col-3">
                                                    <input required type="text" name="item_size[]" id="" class="form-control" placeholder="Ukuran" value="<?= $barang['ukuran']; ?>">
                                                </div>
                                                <div class=" col-2">
                                                    <input required type="text" name="item_quantity[]" id="" class="form-control" placeholder="QTY" value="<?= $barang['qty']; ?>">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Ubah Data!
                            </button>
                        </div>
                    </div>
    </form>
</div>