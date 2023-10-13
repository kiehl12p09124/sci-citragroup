<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h4>Tambah Surat Sentral Citra Indonesia</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/SCI/tambahSurat" method="post">
                    <!-- Tambah Data Surat -->
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Hal</div>
                                </div>
                                <input type="text" class="form-control" placeholder="Hal" name="hal" value="Surat Penawaran">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Tujuan</div>
                                </div>
                                <input type="text" class="form-control" placeholder="Tujuan" name="tujuan" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tanggal</span>
                                </div>
                                <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-2">
                            <!-- <button type="button" class="btn btn-primary addMoreBarang">
                                <i class="fas fa-plus"></i> Barang
                            </button> -->
                            <button type="button" class="btn btn-primary addMoreBarang">
                                <i class="fas fa-plus"></i> Barang
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Diskon: Rp.</span>
                                </div>
                                <input type="text" class="form-control" placeholder="" name="diskon" value="0">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Seri Surat :</span>
                                </div>
                                <input type="text" class="form-control" name="no_seri" value="SCI/<?= romawi(date('m')) . '/' . date('Y') . '/' . str_pad($data['available_seri'], 3, '0', STR_PAD_LEFT); ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-7">
                            <ul class="list-group" id="addBarang">
                                <li class="list-group-item bg-secondary">List Barang:</li>
                            </ul>
                        </div>

                        <div class="col-5">
                            <ul class="list-group">
                                <li class="list-group-item bg-secondary">Note :</li>
                                <li class="list-group-item">1. Harga
                                    <select name="ppn">
                                        <option value="11">Termasuk</option>
                                        <option value="0">Tidak Termasuk</option>
                                    </select>
                                    PPN
                                </li>
                                <li class="list-group-item">2. Pembayaran Sesuai
                                    <select class="mb-2" name="sepakat_pembayaran">
                                        <option value="Kesepakatan">Kesepakatan</option>
                                        <option value="Tempo">Tempo</option>
                                    </select>
                                    <input class="ml-1" id="tempo" type="hidden" name="tempo" size="4" placeholder="..Hari">
                                    <br>
                                    &nbsp;&nbsp; *Catatan : <textarea type="text" name="catatan"></textarea>
                                </li>
                                <li class="list-group-item">3. Pembayaran untuk transaksi ini mohon di transfer ke Rekening :
                                    <select name="rekening">
                                        <?php foreach (rekening('SCI') as $rek) : ?>
                                            <option value="<?= $rek['bank'] . '-' . $rek['an'] . '-' . $rek['rekening']; ?>"><?= $rek['an'] . ' (' . $rek['bank'] . ')'; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </li>
                                <li class="list-group-item">
                                    <button type="submit" class="btn btn-primary">Submit!</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
    <!-- Tambah data barang -->
    <div class="form-row fieldGroupBarangCopy" style="display:none;">
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang[]">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" placeholder="Ket" name="ket[]">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" placeholder="QTY" name="qty[]">
        </div>
        <div class="col-3">
            <input type="text" class="form-control" placeholder="Harga Satuan" name="harga_barang[]">
        </div>
        <div class="col-1">
            <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-minus"></i></a>
        </div>
    </div>