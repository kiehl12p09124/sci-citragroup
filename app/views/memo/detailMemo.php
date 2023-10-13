<?php

$memo = $data['memo'];
$no = 1;

?>


<div class="card">
    <div class="card-header">
        <div class="card-title">Detail Data Memo</div>
        <div class="card-tools">
            <a href="<?= BASEURL . '/Memo/PrintMemo/' . $memo['id']; ?>">
                <button class="btn btn-success btn-sm mr-1">
                    <i class="fas fa-print"></i> Print
                </button>
            </a>
            <a href="<?= BASEURL . '/Memo/edit/' . $memo['id']; ?>">
                <button class="btn btn-primary btn-sm mr-1">
                    <i class="fas fa-edit"></i> edit
                </button>
            </a>
            <a href="<?= BASEURL . '/Memo/delete/' . $memo['id']; ?>">
                <button onclick="return confirm('Apakah Anda yakin Ingin menghapus data ini? data ini akan dihapus secara permanen');" class="btn btn-sm btn-danger btn-sm mr-3" title="hapus"><i class="fas fa-trash"></i></button>
            </a>

        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">Tujuan</div>
                            <div class="col-1">:</div>
                            <div class="col-8"><?= $memo['tujuan']; ?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">Alamat</div>
                            <div class="col-1">:</div>
                            <div class="col-8"><?= $memo['alamat']; ?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">Jenis Memo</div>
                            <div class="col-1">:</div>
                            <div class="col-8"><?= $memo['jenis']; ?> Barang</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">Tanggal Memo</div>
                            <div class="col-1">:</div>
                            <div class="col-8"><?= tgl_indo($memo['tanggal']); ?></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-6">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">Perusahaan</div>
                            <div class="col-1">:</div>
                            <div class="col-7"><?= $memo['perusahaan']; ?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">Nama Supir</div>
                            <div class="col-1">:</div>
                            <div class="col-7"><?= $memo['nama_driver']; ?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">Nomor Hp. Driver</div>
                            <div class="col-1">:</div>
                            <div class="col-7"><?= $memo['no_driver']; ?></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">Nomor Kendaraan</div>
                            <div class="col-1">:</div>
                            <div class="col-7"><?= $memo['no_kendaraan']; ?></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">List Barang</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead class="bg-dark">
                                <tr class="text-uppercase">
                                    <td>No</td>
                                    <td>Nama Barang</td>
                                    <td>Keterangan</td>
                                    <td>Ukuran</td>
                                    <td>Qty</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['barang'] as $barang) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $barang['nama_barang']; ?></td>
                                        <td><?= $barang['keterangan']; ?></td>
                                        <td><?= $barang['ukuran']; ?></td>
                                        <td><?= $barang['qty']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>