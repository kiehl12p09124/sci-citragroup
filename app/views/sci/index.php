<?php
$no = 1;

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Data Surat Sentral Citra Indonesia Bulan Ini</div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-head-fixed ">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>No. Seri Surat</th>
                            <th>Tujuan</th>
                            <th>Tanggal diterbitkan</th>
                            <th>Jatuh Tempo</th>
                            <th>Status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['surat'] as $surat): ?>
                            <tr>
                                <td class="text-center"><?= $no++;?></td>
                                <td><?= $surat['no_seri'];?></td>
                                <td><?= $surat['tujuan'];?></td>
                                <td><?= tgl_indo($surat['tgl_surat']);?></td>
                                <td><?= $surat['tempo'] < 1 ? 'Sesuai Kesepakatan' : $surat['tempo'].' Hari ('.tgl_indo(date('Y-m-d', strtotime("+".$surat['tempo']." day"))).')';?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm" title="<?= $surat['status'];?>">
                                        <?= $surat['status'].' '.iconStatus($surat['status']);?>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <a href="<?= BASEURL.'/SCI/detail/'.$surat['id'];?>">
                                        <button class="btn btn-sm btn-success" title="detail"><i class="fas fa-info-circle"></i></button>
                                    </a>
                                    <a href="<?= BASEURL.'/SCI/edit/'.$surat['id'];?>">
                                        <button class="btn btn-sm btn-primary" title="edit"><i class="fas fa-edit"></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
                <div class="card-footer"></div>
        </div>
    </div>
</div>