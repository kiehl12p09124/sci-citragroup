<?php $surat = $data['surat'];
//   $_POST['addon_notes'] = "apa ya bang";
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice <?= $surat['tujuan'] . ' ' . $data['perusahaan']; ?></title>
    <link rel="stylesheet" href="<?= PUBLICC; ?>/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PUBLICC; ?>/bootstrap/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= PUBLICC; ?>/bootstrap/dist/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= PUBLICC; ?>/css/print/invoice.css">

</head>

<body>
    <div class="margin">
        <div class="kop">
            <img src="<?= PUBLICC; ?>/img/sci/SCI_Kop.png">
        </div>
        <div class="main">
            <div class="detail">
                <div class="detail-title mt-2">
                    <h4><u><b>PROFORMA INVOICE</b></u></h4>
                </div>
                <div class="header-surat">
                    <div class="mt-4 ml-2">
                        Kepada Yth. <br> <b><?= $surat['tujuan']; ?></b>
                    </div>
                    <div class="d-flex justify-content-between mt-5">
                        <div class="ml-2">Mata Uang : Rupiah</div>
                        <div>No. PO : <?= $surat['no_seri']; ?></div>
                        <div class="mr-2">Tanggal PO : <?= tgl_indo($surat['tgl_surat']); ?></div>
                    </div>

                    <table cellspacing="0" class="detail-table">
                        <thead>
                            <tr class="text-uppercase text-bold">
                                <td class="border-left-0">No.</td>
                                <td>Keterangan</td>
                                <td>Jumlah</td>
                                <td>Harga Satuan</td>
                                <td class="border-right-0">Total Harga</td>
                            </tr>
                        </thead>
                        <!-- perulangan produk -->
                        <?php $no = 1;
                        $jumlah = 0;
                        foreach ($data['barang'] as $barang) : ?>

                            <tr>
                                <td class="border-left-0"><?= $no++; ?></td>
                                <td><?= strtoupper($barang['nama_barang']); ?></td>
                                <td><?= $barang['qty']; ?></td>
                                <td>
                                    <span class="float-left ml-3">Rp.</span>
                                    <span class="float-right mr-2"><?= format_ribuan($barang['harga']); ?></span>
                                </td>
                                <td class="border-right-0">
                                    <span class="float-left ml-3">Rp.</span>
                                    <span class="float-right mr-2"><?= format_ribuan($barang['qty'] * $barang['harga']); ?></span>
                                </td>
                            </tr>
                            <?php $jumlah += $barang['qty'] * $barang['harga']; ?>
                        <?php endforeach; ?>

                        <!-- keterangan total -->
                        <tr>
                            <td colspan="3" class="border-0"></td>
                            <td class="border-0 float-left ml-5">Total</td>
                            <td class="border-right-0">
                                <span class="float-left ml-3">Rp.</span>
                                <span class="float-right mr-2"><?= format_ribuan($jumlah); ?></span>
                            </td>
                        </tr>
                        <?php if ($surat['diskon'] > 0) : ?>
                            <tr>
                                <td colspan="3" class="border-0"></td>
                                <td class="border-0 float-left ml-5">Diskon</td>
                                <td class="border-right-0">
                                    <span class="float-left ml-3">Rp.</span>
                                    <span class="float-right mr-2"><?= format_ribuan($surat['diskon']); ?></span>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $ppn = $surat['ppn'] > 0 ? (($jumlah - $surat['diskon']) * $surat['ppn'] / 100) / 1000 * 1000 : 0; ?>
                        <?php if ($ppn != 0) : ?>
                            <tr>
                                <td colspan="3" class="border-0"></td>
                                <td class="border-0 float-left ml-5">PPN <?= $surat['ppn']; ?>%</td>
                                <td class="border-right-0">
                                    <span class="float-left ml-3">Rp.</span>
                                    <span class="float-right mr-2"><?= format_ribuan($ppn); ?></span>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td colspan="3" class="border-0"></td>
                            <td class="border-0 float-left ml-5"><b>SUBTOTAL</b></td>
                            <td class="border-right-0">
                                <b>
                                    <span class="float-left ml-3">Rp.</span>
                                    <span class="float-right mr-2"><?= format_ribuan((int)$jumlah - (int)$surat['diskon'] + (int)$ppn); ?></span>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-left-0 border-right-0" colspan="5">
                                <span class="float-left ml-2">
                                    <b>Terbilang</b>:
                                </span>
                                <span class="float-left ml-1">
                                    <i><?= ucwords(terbilang((int)$jumlah - (int)$surat['diskon'] + (int)$ppn)); ?></i>
                                </span>
                            </td>
                        </tr>
                    </table>
                    <div class="notes">
                        <span class="ml-2 mt-2"><i>Note</i></span> :
                        <ol>
                            <li>Harga <?= $surat['ppn'] > 0 ? 'Termasuk PPN ' . $surat['ppn'] . '%' : 'Tidak Termasuk PPN'; ?></li>
                            <li>Harga <?= $_POST['formOngkir'] . ' & ' . $_POST['formInstalasi']; ?></li>
                            <!-- <li>Harga Sudah Termasuk Ongkos Kirim</li> -->
                            <?php if (strlen($surat['catatan']) > 4) { ?>
                                <li><?= $surat['catatan']; ?></li>
                            <?php }; ?>

                            <?php if (strlen($_POST['addon_notes']) > 4) : ?>
                                <li><?= $_POST['addon_notes']; ?></li>
                            <?php endif; ?>
                            <li>Pembayaran Via Transfer Bank <?= explode('-', $surat['rekening'])[0]; ?></li>
                        </ol>
                    </div>
                    <div class="row mt-0">
                        <div class="col-6" style="border-right:2px solid black;">
                            <span class="text-uppercase ml-2">
                                <b><u>keterangan</u></b>
                            </span>
                            <div class="container mt-4 ml-n2">
                                <span>Pembayaran untuk invoice ini mohon di transfer ke Rekening</span>
                                <table cellpadding="4">
                                    <tr>
                                        <td>A.n</td>
                                        <td>:</td>
                                        <td><?= explode('-', $surat['rekening'])[1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Rekening</td>
                                        <td>:</td>
                                        <td><?= explode('-', $surat['rekening'])[2]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bank</td>
                                        <td>:</td>
                                        <td><?= explode('-', $surat['rekening'])[0]; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <span class="mb-1">
                                Bekasi, <?= tgl_indo(date('Y-m-d')); ?>
                            </span> <br>
                            <span>Hormat Kami</span> <br>
                            <img src="<?= PUBLICC; ?>/img/sci/SCI_Logo.png" style="width: 25%; margin-top: 2%; opacity: 0.95;"> <br>
                            <span><?= citra($surat['perusahaan']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= PUBLICC; ?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= PUBLICC; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        window.print();
        window.location.href = "<?= BASEURL . '/' . $data['perusahaan'] . '/detail/' . $surat['id']; ?>";
    </script>
</body>

</html>