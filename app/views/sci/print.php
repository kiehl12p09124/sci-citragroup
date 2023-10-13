<?php $surat = $data['surat']; ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= $surat['tujuan'] . ' ' . $data['perusahaan']; ?></title>
    <link rel="stylesheet" href="<?= PUBLICC; ?>/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PUBLICC; ?>/bootstrap/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= PUBLICC; ?>/bootstrap/dist/css/bootstrap-reboot.min.css">
    <style>
        body .margin {
            width: 98%;
            margin: 2% 2% 1%;
            font-size: 115%;
            font-family: 'Times New Roman';
        }

        .main {
            width: 90%;
            margin-top: 1%;
            margin-left: 3%;
            margin-right: 4%;
        }

        .kop img {
            width: 100%;
        }

        .header-surat table {
            font-size: 100%;
            width: 100%;
        }

        .right {
            text-align: right;
        }

        .header-surat table tr td {
            padding: 0.5%;
            width: 50%;
        }

        .table-item {
            width: 100%;
            margin-top: 3%;
        }

        .table-item table {
            width: 90%;
            margin: 2% 5%;
            border-collapse: collapse;
            text-align: center;
            font-size: 100%;
        }

        .table-item table thead tr td {
            font-weight: bold;
            background-color: #92D14F;
            padding: 0.7%;
        }

        .table-item table td {
            padding: 0.2%;
            border: 1px solid black;


        }

        #logo {
            width: 50%;
        }

        .cap-surat-main {
            width: 25%;
            float: right;
        }

        .cap-surat {
            float: right;
            text-align: center;

        }

        .cap-surat img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .jarak {
            margin-top: 10%;
        }

        ol li {
            margin-top: 0.5%;
        }
    </style>

</head>

<body>
    <div class="margin">
        <div class="kop">
            <img src="<?= PUBLICC; ?>/img/sci/SCI_Kop.png">
        </div>

        <div class="main">
            <div class="header-surat">
                <table cellspacing="0">
                    <tr>
                        <td>Hal : <?= $surat['hal']; ?></td>
                        <td class="right">No. Seri Nota : <?= $surat['no_seri']; ?></td>
                    </tr>
                    <tr>
                        <td>Kepada Yth. <b><?= strlen($surat['tujuan']) > 25 ? '<br>' . $surat['tujuan'] : $surat['tujuan']; ?></b></td>
                        <td class="right"><?= tgl_indo($surat['tgl_surat']); ?></td>
                    </tr>
                </table>
            </div>

            <div class="table-item ">
                <table class="mt-lg-5" cellspacing="0" cellpadding="2" align="center">
                    <thead>
                        <tr style="background-color: green;">
                            <td>NO.</td>
                            <td>NAMA BARANG</td>
                            <td>KET</td>
                            <td>QTY</td>
                            <td>HARGA SATUAN</td>
                            <td>JUMLAH</td>
                            <!--                             <tr style="background-color: green;">
                                <td style="width: 5%;">NO.</td>
                                <td style="width: 30%;">NAMA ITEM</td>
                                <td style="width: 10%;">VOLUME</td>
                                <td style="width: 25%;">HARGA/METER</td>
                                <td style="width: 30%;">JUMLAH</td> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $jumlah = 0;
                        foreach ($data['barang'] as $barang) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td class="text-left"><span class="ml-2"><?= strtoupper($barang['nama_barang']); ?></span></td>
                                <td><?= $barang['ket']; ?></td>
                                <td><?= $barang['qty']; ?></td>
                                <td>
                                    <span class="float-left ml-3">Rp.</span>
                                    <span class="float-right"><?= format_ribuan($barang['harga']); ?></span>
                                </td>
                                <td>
                                    <span class="float-left ml-3">Rp.</span>
                                    <span class="float-right"><?= format_ribuan($barang['qty'] * $barang['harga']); ?></span>
                                </td>
                                <!-- <td style="width: 5%;"><?= $i; ?></td>
                                    <td style="width: 30%;">Wallpaper dinding</td>
                                    <td style="width: 10%;">4mx4m</td>
                                    <td style="width: 25%;">Rp. 25.000</td>
                                    <td style="width: 30%;">Rp. 400.000</td> -->
                            </tr>
                            <?php $jumlah += $barang['qty'] * $barang['harga']; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="5">Total</td>
                            <td>
                                <span class="float-left ml-3">Rp.</span>
                                <span class="float-right"><?= format_ribuan($jumlah); ?></span>
                            </td>
                        </tr>
                        <?php if ($surat['diskon'] > 0) : ?>
                            <tr>
                                <td colspan="5">Diskon</td>
                                <td>
                                    <span class="float-left ml-3">Rp.</span>
                                    <span class="float-right"><?= format_ribuan($surat['diskon']); ?></span>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $ppn = $surat['ppn'] > 0 ? (($jumlah - $surat['diskon']) * $surat['ppn'] / 100) / 1000 * 1000 : 0; ?>
                        <?php if ($ppn != 0) : ?>
                            <tr>
                                <td colspan="5" class="text-center">PPN <?= $surat['ppn']; ?>%</td>
                                <td>
                                    <span class="float-left ml-3">Rp.</span>
                                    <span class="float-right"><?= format_ribuan($ppn); ?></span>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <tr style="font-weight:bold;">
                            <td colspan="5" class="text-center">SUBTOTAL</td>
                            <td style="background-color: #FFFF00;">
                                <span class="float-left ml-3">Rp.</span>
                                <span class="float-right"><?= format_ribuan((int)$jumlah - (int)$surat['diskon'] + (int)$ppn); ?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                Note :
                <ol>
                    <li>Harga <?= $surat['ppn'] > 0 ? 'Termasuk PPN ' . $surat['ppn'] . '%' : 'Tidak Termasuk PPN'; ?></li>
                    <li>Harga <?= $_POST['formOngkir'] . ' & ' . $_POST['formInstalasi']; ?></li>
                    <!-- <li>Harga Sudah Termasuk Ongkos Kirim dan Biaya Instalasi</li> -->
                    <li>Pembayaran <?= $surat['tempo'] < 1 ? "Sesuai Kesepakatan" : 'dengan Tempo ' . $surat['tempo'] . ' hari'; ?>
                        <?php if (strlen($surat['catatan']) > 4) { ?>
                            <br>Catatan: <?= $surat['catatan']; ?>
                        <?php }; ?>
                    </li>
                    <li>Pembayaran Mohon ditransfer Ke Rekening : <br>
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
                    </li>
                </ol>
            </div>
            <div class="mt-3">
                <span style="display:inline-block; width:8%;"></span>
                Demikian Surat ini kami sampaikan, besar harapan kami bapak/Ibu berminat dengan harga yang
                kami tawarkan. Atas perhatian dan kerjasamanya kami sampaikan terima kasih.
            </div>
            <div class="cap-surat-main mt-5">
                <div class="cap-surat">
                    <span class="jarak"><?= 'Bekasi, ' . explode(',', tgl_indo($surat['tgl_surat']))[1]; ?></span><br>
                    <span class="jarak">Hormat Kami</span>
                    <img class="jarak" align="center" src="<?= PUBLICC; ?>/img/sci/SCI_Logo.png" style="width: 70%; margin-left: 18%; margin-bottom: -8%;"><br>
                    <span style="margin-left: auto;"><?= citra($surat['perusahaan']); ?></span>
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