<?php
$no = 1;

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Data Surat Bulan Ini</div>
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
                                <td><?= $surat['tempo'].' Hari ('.tgl_indo(date('Y-m-d', strtotime("+".$surat['tempo']." day"))).')';?></td>
                                <td class="text-center">
                                    <div class="<?= bgStatus($surat['status']);?>">
                                        <?= $surat['status'];?>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="<?= BASEURL.'/CII/detail/'.$surat['id'];?>">
                                        <button class="btn btn-sm btn-success" title="detail"><i class="fas fa-info-circle"></i></button>
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