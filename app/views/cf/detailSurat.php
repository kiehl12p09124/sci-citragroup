<?php $surat = $data['surat']; ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h4>Detail Surat Citra Furniture Indonesia</h4>
                </div>
                <div class="card-tools mr-3">
                    <button class="btn btn-md btn-success" data-toggle="modal" data-target="#printModal">
                        <i class="fas fa-print"></i> Print
                    </button>
                    <button class="btn btn-md btn-dark" data-toggle="modal" data-target="#printInvoice">
                        <i class="fas fa-file-invoice"></i> Print Invoice
                    </button>
                    <a href="<?= BASEURL . '/' . $data['perusahaan'] . '/edit/' . $surat['id']; ?>">
                        <button class="btn btn-md btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </a>
                    <?php if ($surat['data'] == "!aktif") { ?>
                        <a href="<?= BASEURL . '/' . $data['perusahaan'] . '/restore/' . $surat['id']; ?>">
                            <button class="btn btn-md btn-warning">
                                <i class="fas fa-trash-restore"></i> Restore
                            </button>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="card-body">
                <!-- Tambah Data Surat -->
                <div class="row">
                    <div class="col-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Hal</div>
                            </div>
                            <input type="text" class="form-control" placeholder="Hal" name="hal" value="<?= $surat['hal']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Tujuan</div>
                            </div>
                            <input type="text" class="form-control" value="<?= $surat['tujuan']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tanggal</span>
                            </div>
                            <input type="text" class="form-control" name="tanggal" value="<?= tgl_indo($surat['tgl_surat']); ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Diskon</span>
                            </div>
                            <input type="text" class="form-control" name="diskon" value="<?= format_rupiah($surat['diskon']); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Seri Surat :</span>
                            </div>
                            <input type="text" class="form-control" name="no_seri" value="<?= $surat['no_seri']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tempo</span>
                            </div>
                            <input type="text" class="form-control" value="<?= $surat['tempo'] > 0 ? $surat['tempo'] . ' Hari' : 'Sesuai Kesepakatan'; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Status</span>
                            </div>
                            <input type="text" class="form-control" name="no_seri" value="<?= $surat['status']; ?>" readonly>
                        </div>
                    </div>
                    <!-- <div class="col-1">
                            <a href="<?= BASEURL . '/CII/hapusSurat/' . $surat['id']; ?>">
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>                           
                            </a>
                        </div>                                                 -->
                </div>

                <div class="row mt-4">
                    <!-- Tabel List barang -->
                    <div class="col-7">
                        <table class="table table-hover table-bordered table-sm">
                            <thead>
                                <tr class="bg-secondary">
                                    <td>NO.</td>
                                    <td>NAMA BARANG</td>
                                    <td>KET</td>
                                    <td>QTY</td>
                                    <td>HARGA SATUAN</td>
                                    <td>JUMLAH</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $jumlah = 0;
                                foreach ($data['barang'] as $barang) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $barang['nama_barang']; ?></td>
                                        <td><?= $barang['ket']; ?></td>
                                        <td><?= $barang['qty']; ?></td>
                                        <td><span class="float-left">Rp.</span><span class="float-right"><?= format_ribuan($barang['harga']); ?></span></td>
                                        <td>
                                            <span class="float-left">Rp.</span>
                                            <span class="float-right"><?= format_ribuan($barang['qty'] * $barang['harga']); ?></span>
                                        </td>
                                    </tr>
                                    <?php
                                    $jumlah += ($barang['qty'] * $barang['harga']);
                                    ?>
                                <?php endforeach; ?>
                                <tr>
                                    <td class="text-center" colspan="5">TOTAL</td>
                                    <td><span class="float-left">Rp.</span><span class="float-right"><?= format_ribuan($jumlah); ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-center">DISKON</td>
                                    <td><span class="float-left">Rp.</span><span class="float-right"><?= format_ribuan($surat['diskon']); ?></span></td>
                                </tr>
                                <?php $ppn = $surat['ppn'] > 0 ? (($jumlah - $surat['diskon']) * $surat['ppn'] / 100) / 1000 * 1000 : 0; ?>
                                <?php if ($ppn != 0) : ?>
                                    <tr>
                                        <td colspan="5" class="text-center">PPN <?= $surat['ppn']; ?>%</td>
                                        <td>
                                            <span class="float-left">Rp.</span>
                                            <span class="float-right"><?= format_ribuan($ppn); ?></span>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="5" class="text-center">SUBTOTAL</td>
                                    <td>
                                        <span class="float-left">Rp.</span>
                                        <span class="float-right"><?= format_ribuan((int)$jumlah - (int)$surat['diskon'] + (int)$ppn); ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-5">
                        <ul class="list-group">
                            <li class="list-group-item bg-secondary">Note :</li>
                            <li class="list-group-item">1. Harga <?= $surat['ppn'] > 0 ? 'Termasuk PPN ' . $surat['ppn'] . '%' : 'Tidak Termasuk PPN'; ?> </li>
                            <li class="list-group-item">2. Pembayaran
                                <?= $surat['tempo'] == '-' ? 'Sesuai Kesepakatan' : 'Dengan Tempo ' . $surat['tempo'] . ' hari (' . tgl_indo($surat['tgl_surat']) . ')'; ?>
                                <br>
                                &nbsp;&nbsp; *Catatan : <?= $surat['catatan']; ?>
                            </li>
                            <li class="list-group-item">3. Pembayaran untuk transaksi ini mohon di transfer ke Rekening : <br>
                                <table class="ml-4" cellspacing="3" cellpadding="1">
                                    <tr>
                                        <td>Atas Nama</td>
                                        <td>:</td>
                                        <td><?= explode('-', $surat['rekening'])[1]; ?></td>

                                    </tr>
                                    <tr>
                                        <td>No. Rek</td>
                                        <td>:</td>
                                        <td><?= explode('-', $surat['rekening'])[2]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bank</td>
                                        <td>:</td>
                                        <td><?= explode('-', $surat['rekening'])[0]; ?></td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="printModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="<?= BASEURL . '/' . $data['perusahaan'] . '/print/' . $surat['id']; ?>" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Print Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-uppercase">Ongkos Kirim</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formOngkir" id="formOngkir1" value="Sudah Termasuk Ongkos Kirim" checked>
                            <label class="form-check-label" for="formOngkir1">
                                Harga Sudah Termasuk Ongkos Kirim
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formOngkir" id="formOngkir2" value="Tidak Termasuk Ongkos Kirim">
                            <label class="form-check-label" for="formOngkir2">
                                Harga Tidak Termasuk Ongkos Kirim
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase">Instalasi</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formInstalasi" id="formInstalasi1" value="Sudah Termasuk Biaya instalasi" checked>
                            <label class="form-check-label" for="formInstalasi1">
                                Harga Sudah Termasuk Biaya instalasi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formInstalasi" id="formInstalasi2" value="Tidak Termasuk Biaya Instalasi">
                            <label class="form-check-label" for="formInstalasi2">
                                Harga Tidak Termasuk Biaya Instalasi
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Print</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="printInvoice" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="<?= BASEURL . '/' . $data['perusahaan'] . '/invoicePrint/' . $surat['id']; ?>" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Print Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-uppercase">Ongkos Kirim</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formOngkir" id="formOngkir1" value="Sudah Termasuk Ongkos Kirim" checked>
                            <label class="form-check-label" for="formOngkir1">
                                Harga Sudah Termasuk Ongkos Kirim
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formOngkir" id="formOngkir2" value="Tidak Termasuk Ongkos Kirim">
                            <label class="form-check-label" for="formOngkir2">
                                Harga Tidak Termasuk Ongkos Kirim
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase">Instalasi</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formInstalasi" id="formInstalasi1" value="Sudah Termasuk Biaya instalasi" checked>
                            <label class="form-check-label" for="formInstalasi1">
                                Harga Sudah Termasuk Biaya instalasi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formInstalasi" id="formInstalasi2" value="Tidak Termasuk Biaya Instalasi">
                            <label class="form-check-label" for="formInstalasi2">
                                Harga Tidak Termasuk Biaya Instalasi
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase">Catatan Tambahan</label>
                        <input type="text" class="form-control" name="addon_notes" placeholder="Masukan Catatan Tambahan disini" value="-">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Print Invoice</button>
                </div>
            </div>
        </div>
    </form>
</div>