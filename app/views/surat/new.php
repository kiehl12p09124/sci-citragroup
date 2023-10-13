<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h4>Tambah Surat Baru</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL;?>/Surat/tambah" method="post">
                <!-- Tambah Data Surat -->
                    <div class="form-row">
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Hal</div>
                                </div>
                                <input type="text" class="form-control" placeholder="Hal">
                            </div>
                        </div>  
                        <div class="col-5">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Tujuan</div>
                                </div>
                                <input type="text" class="form-control" placeholder="Tujuan">
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-primary addMoreBarang">
                                <i class="fas fa-plus"></i> Barang
                            </button>
                            <button type="button" class="btn btn-primary addMoreInterior">
                                <i class="fas fa-plus"></i> Interior
                            </button>
                        </div>                                             
                    </div>
                    
                    <div class="row mt-3 mb-n2" id="listBarang">
                        <div class="col-3">
                            <h5>Barang</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div id="addBarang"></div>
                        </div>
                    </div>
                    
                    <div class="row mt-3 mb-n2" id="listInterior">
                        <div class="col-3"><h5>Interior</h5></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div id="addInterior"></div>
                        </div>
                    </div>


                <!-- Tambah data barang -->
                    <div class="form-row fieldGroupBarangCopy" style="display:none;">
                        <div class="col-3">
                            <input type="text" class="form-control" placeholder="Nama Barang" name="namaBarang[]">
                        </div>
                        <div class="col-1">
                            <input type="text" class="form-control" placeholder="Ket" name="ket[]">
                        </div>
                        <div class="col-1">
                            <input type="text" class="form-control" placeholder="QTY" name="qty[]">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="Harga Satuan" name="hargaBarang">
                        </div>
                        <div class="col-1">
                            <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>

                <!-- Tambah Data Interior -->
                    <!-- <div class="form-row fieldGroupInteriorCopy" style="display:none;">
                        <div class="col-3">
                            <input type="text" class="form-control" placeholder="Nama Barang" name="namaBarang[]">
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Volume(m)" name="qty[]" aria-label="qty[]" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                <div class="input-group-append">
                                    <span class="input-group-text">X</span>
                                </div>

                                <input type="text" class="form-control" placeholder="Volume(m)" name="qty[]" aria-label="qty[]" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Harga" name="hargaBarang">
                            </div>
                        </div>
                        <div class="col-1">
                            <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-minus"></i></a>
                        </div>
                    </div> -->
                    <br><hr>
                    <div class="row">
                        <div class="col-3"><h5>Note :</h5></div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" name="note1" id="" value="1">
                            Harga 
                            <select name="ppn">
                                <option>Termasuk</option>
                                <option>Tidak Termasuk</option>
                            </select>
                            PPN
                        </div>
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" name="note2" id="">
                            Harga 
                            <select name="ppn" id="">
                                <option>Termasuk</option>
                                <option>Tidak Termasuk</option>
                            </select>
                            Ongkos Kirim
                        </div>
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" name="note3" id="">
                            Pembayaran Dengan Kesepakatan
                        </div>
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" name="note4" id="">
                            Pembayaran untuk transaksi ini mohon ditransfer ke rekening.
                            <div class="form-check">
                                A.n : <select name="ppn" id="">
                                    <option>PT. Sentral Furnindo(BNI : 12223)</option>
                                    <option>PT. Sentral Furnindo(Mandiri : 0899921)</option>
                                    <option>William Prayogo(BCA : 0123455)</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" name="note5" id="">
                            Barang 
                            <select name="ppn" id="">
                                <option>Sudah</option>
                                <option>Belum</option>
                            </select>
                            Termasuk Instalasi
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary">Submit!</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>