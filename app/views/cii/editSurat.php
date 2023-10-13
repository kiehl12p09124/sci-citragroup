<?php $surat = $data['surat']; ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h4>Edit Surat Citra Interior Indonesia</h4>
                </div>
                <div class="card-tools">
                    <a href="<?= BASEURL . '/' . $data['perusahaan'] . '/detail/' . $surat['id']; ?>">
                        <button class="btn btn-md btn-primary">
                            <i class="fas fa-info-circle"></i> Detail
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL . '/' . $data['perusahaan'] . '/editSurat/' . $surat['id']; ?>" method="post">
                    <!-- Tambah Data Surat -->
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Hal</div>
                                </div>
                                <input type="text" class="form-control" placeholder="Hal" name="hal" value="<?= $surat['hal']; ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Tujuan</div>
                                </div>
                                <input type="text" name="tujuan" class="form-control" value="<?= $surat['tujuan']; ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tanggal</span>
                                </div>
                                <input type="date" class="form-control" name="tanggal" value="<?= $surat['tgl_surat']; ?>" required>
                            </div>
                        </div>
                        <div class="col-1">
                            <a href="<?= BASEURL . '/CII/hapusSurat/' . $surat['id']; ?>">
                                <button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Diskon Rp.</span>
                                </div>
                                <input type="text" class="form-control" name="diskon" value="<?= $surat['diskon']; ?>">
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
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Status</span>
                                </div>
                                <select class="form-control" name="status" id="status">
                                    <option value="<?= $surat['status']; ?>"><?= $surat['status']; ?> (Data Saat Ini)</option>
                                    <option value="WAITING">WAITING</option>
                                    <option value="ON PROCCESS">ON PROCCESS</option>
                                    <option value="DONE">DONE</option>
                                    <option value="CLOSED">CLOSED</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-4">
                        <!-- Tabel List interior -->
                        <div class="col-7">
                            <table class="table table-hover table-bordered table-sm">
                                <thead>
                                    <tr class="bg-secondary">
                                        <td>NO.</td>
                                        <td>NAMA INTERIOR</td>
                                        <td>VOLUME</td>
                                        <td>HARGA/METER</td>
                                        <td>JUMLAH</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $jumlah = 0;
                                    foreach ($data['interior'] as $interior) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $interior['nama_interior']; ?></td>
                                            <td><?= $interior['volume1']; ?>mX<?= $interior['volume2']; ?>m</td>
                                            <td><span class="float-left">Rp</span><span class="float-right"><?= format_ribuan($interior['harga']); ?></span></td>
                                            <td>
                                                <span class="float-left">Rp</span>
                                                <span class="float-right"><?= format_ribuan($interior['volume1'] * $interior['volume2'] * $interior['harga']); ?></span>
                                            </td>
                                        </tr>
                                        <?php
                                        $jumlah += ($interior['volume1'] * $interior['volume2'] * $interior['harga']);
                                        ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td class="text-center" colspan="4">TOTAL</td>
                                        <td><span class="float-left">Rp</span><span class="float-right"><?= format_ribuan($jumlah); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center">DISKON</td>
                                        <td><span class="float-left">Rp</span><span class="float-right"><?= format_ribuan($surat['diskon']); ?></span></td>
                                    </tr>
                                    <?php $ppn = $surat['ppn'] > 0 ? (($jumlah - $surat['diskon']) * $surat['ppn'] / 100) / 1000 * 1000 : 0; ?>
                                    <?php if ($ppn != 0) : ?>
                                        <tr>
                                            <td colspan="4" class="text-center">PPN <?= $surat['ppn']; ?>%</td>
                                            <td>
                                                <span class="float-left">Rp.</span>
                                                <span class="float-right"><?= format_ribuan($ppn); ?></span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td colspan="4" class="text-center">SUBTOTAL</td>
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
                                <li class="list-group-item">1. Harga
                                    <select name="ppn">
                                        <option value="<?= $surat['ppn']; ?>"><?= $surat['ppn'] > 0 ? 'Termasuk (' . $surat['ppn'] . '%)' : 'Tidak Termasuk'; ?> (Data Saat Ini)</option>
                                        <option value="11">Termasuk</option>
                                        <option value="0">Tidak Termasuk</option>
                                    </select>
                                    PPN
                                </li>
                                <li class="list-group-item">2. Harga Sudah Termasuk Ongkos Kirim</li>
                                <li class="list-group-item">3. Pembayaran Sesuai
                                    <select class="mb-2" name="sepakat_pembayaran">
                                        <option value="Kesepakatan">Kesepakatan</option>
                                        <option value="Tempo">Tempo</option>
                                    </select>
                                    <input class="ml-1" id="tempo" type="hidden" name="tempo" size="2" placeholder="..Hari" value="<?= $surat['tempo']; ?>">
                                    <br>
                                    &nbsp;&nbsp; *Catatan : <textarea name="catatan" size="15"><?= $surat['catatan']; ?></textarea>
                                </li>
                                <li class="list-group-item">4. Pembayaran untuk transaksi ini mohon di transfer ke Rekening :
                                    <select name="rekening" class="ml-4">
                                        <option value="<?= $surat['rekening']; ?>"><?= explode('-', $surat['rekening'])[0] . '-' . explode('-', $surat['rekening'])[1]; ?> (Data Saat Ini)</option>
                                    <?php foreach (rekening('CII') as $rek) : ?>
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
            </div>
        </div>
    </div>
</div>
<script>
    var rekening = <?= $surat['rekening']; ?>
</script>