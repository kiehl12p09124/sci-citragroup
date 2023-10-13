<div class="card">
    <form action="<?= BASEURL; ?>/Memo/tambahMemo" method="post">
        <div class="card-header">
            <div class="card-title">Tambah Data Memo</div>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="destination">Tujuan</label>
                        <input required class="form-control" type="text" name="destination" id="destination" placeholder="Contoh: PT. Sentral Citra Indonesia">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input required class="form-control" type="text" name="address" id="address" placeholder="Contoh: Jl. Raya Cibarusah, Bekasi">
                    </div>
                    <div class=" form-group">
                        <label for="type">Jenis Memo</label>
                        <select class="form-control" type="text" name="type" id="type">
                            <option value="Pengiriman">Pengiriman Barang</option>
                            <option value="Pengambilan">Pengambilan Barang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="memo_date">Tanggal</label>
                        <input required class="form-control" type="date" name="memo_date" id="memo_date" value="<?= date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class=" col-6">
                    <div class="form-group">
                        <label for="company">Perusahaan</label>
                        <select name="company" id="company" class="form-control">
                            <option value="CII">PT Citra Interior Indonesia (CII)</option>
                            <option value="CF">PT. Citra Furniture Indonesia (CF)</option>
                            <option value="SCI">PT. Sentral Citra Indonesia (SCI)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="drivers_name">Nama Supir</label>
                        <input required class="form-control" type="text" name="drivers_name" id="drivers_name" placeholder="Contoh: Supriyadi">
                    </div>
                    <div class=" form-group">
                        <label for="vehicles_number">No. Kendaraan</label>
                        <input required class="form-control" type="text" name="vehicles_number" id="vehicles_number" placeholder="Contoh: B 2772 FRK">
                    </div>
                    <div class="form-group">
                        <label for="drivers_number">No. HP Supir</label>
                        <input required class="form-control" type="text" name="drivers_number" id="drivers_number" placeholder="Contoh: 088123456789">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">List Barang</div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm mr-2 addMoreItem">
                                    <i class="fas fa-plus"></i> Barang
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="addItem">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button class="btn btn-success">
                    Tambah Data!
                </button>
            </div>
        </div>
    </form>
</div>

<div class="fieldGroupItemCopy" style="display:none">
    <div class="row">
        <div class="col-4">
            <input required type="text" name="item_name[]" id="" class="form-control" placeholder="Nama Barang">
        </div>
        <div class="col-2">
            <input required type="text" name="item_info[]" id="" class="form-control" placeholder="Keterangan">
        </div>
        <div class="col-3">
            <input required type="text" name="item_size[]" id="" class="form-control" placeholder="Ukuran">
        </div>
        <div class="col-2">
            <input required type="text" name="item_quantity[]" id="" class="form-control" placeholder="QTY">
        </div>
        <div class="col-1">
            <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-minus"></i></a>
        </div>
    </div>
</div>