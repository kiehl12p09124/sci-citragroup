<?php
$no = 1;

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Data Memo <?= isset($_POST['rentang1']) ? ' ( ' . explode(',', tgl_indo($_POST['rentang1']))[1] . ' - ' . explode(',', tgl_indo($_POST['rentang2']))[1] . ' )' : ''; ?>
                </div>
                <div class="card-tools">
                    <form action="" method="post">
                        <div class="input-group input-group-sm">
                            <span class="mt-1">Filter Tanggal :</span>
                            <div class="input-group-prepend ml-2">
                                <span class="input-group-text">Dari</span>
                            </div>
                            <input type="date" class="form-control" name="rentang1" required>
                            <div class="input-group-prepend ml-2">
                                <span class="input-group-text">Sampai</span>
                            </div>
                            <input type="date" name="rentang2" class="form-control" required>
                            <button type="submit" class="btn btn-sm btn-primary ml-2">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-head-fixed ">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tujuan</th>
                            <th>Perusahaan</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Nama Supir</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['memo'] as $memo) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $memo['tujuan']; ?></td>
                                <td><?= $memo['perusahaan']; ?></td>
                                <td><?= tgl_indo($memo['tanggal']); ?></td>
                                <td><?= $memo['jenis'];?> Barang</td>
                                <td><?= $memo['nama_driver'];?></td>
                                <td class="text-center">
                                    <a href="<?= BASEURL . '/Memo/detail/' . $memo['id']; ?>">
                                        <button class="btn btn-sm btn-warning" title="detail"><i class="fas fa-info-circle"></i></button>
                                    </a>
                                    <a href="<?= BASEURL . '/Memo/printMemo/' . $memo['id']; ?>">
                                        <button class="btn btn-sm btn-success" title="detail"><i class="fas fa-print"></i></button>
                                    </a>
                                    <a href="<?= BASEURL . '/Memo/edit/' . $memo['id']; ?>">
                                        <button class="btn btn-sm btn-primary" title="edit"><i class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="<?= BASEURL . '/Memo/delete/' . $memo['id']; ?>">
                                        <button onclick="return confirm('Apakah Anda yakin Ingin menghapus data ini? data ini akan dihapus secara permanen');" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>