<div class="row">
    <div class="col-4">
        <!-- small box -->
        <div class="small-box bg-success">
        <div class="inner">
            <h3>150</h3>
            <p>Surat Ter-Acc</p>
        </div>
        <div class="icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-4">
        <!-- small box -->
        <div class="small-box bg-warning">
        <div class="inner">
            <h3>150</h3>
            <p>Surat Belum di Acc</p>
        </div>
        <div class="icon">
            <i class="fas fa-clock"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-4">
        <!-- small box -->
        <div class="small-box bg-danger">
        <div class="inner">
            <h3>150</h3>
            <p>Surat Tidak di Acc</p>
        </div>
        <div class="icon">
            <i class="fas fa-ban"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"></div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=1; $i < 25; $i++):?>
                            <?php if ($i%2 == 1){?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td>PT. Setia Abadi</td>
                                    <td><?= tgl_indo(date('Y-m-d'));?></td>
                                    <td><div class="btn btn-success">ter-<i>ACC</i></div></td>
                                    <td><button class="btn btn-primary" title="ganti status"><i class="fas fa-pen"></i></button></td>
                                </tr>
                                <?php }else{?>
                                    <tr>
                                        <td><?= $i;?></td>
                                        <td>PT. Karya Jaya</td>
                                        <td><?= tgl_indo(date('Y-m-d'));?></td>
                                        <td><div class="btn btn-warning">pending</div></td>
                                        <td><button class="btn btn-primary" title="ganti status"><i class="fas fa-pen"></i></button></td>
                                    </tr>
                                <?php }?>
                            <?php endfor;?>
                    </tbody>
                </table>
            </div>
                <div class="card-footer"></div>
        </div>
    </div>
</div>