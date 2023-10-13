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
            width: 95%;
            margin: 2% 2%;
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

        .cap-surat-kiri {
            width: 25%;
            float: left;
            margin-left: 2%;
        }

        .cap-surat-kanan {
            width: 25%;
            float: right;
        }

        .cap-surat {
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

        .terbilang {
            display: inline;
            border: 1px solid black;
            padding: 0.4% 0.8%;
        }

        hr.nama {
            border-top: 1px solid black;
            margin-left: 15%;
            margin-right: 10%;
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
                <span class="text-center">
                    <h3 style="text-decoration: underline; font-weight: bold;">INVOICE</h3>
                </span>
                <table cellspacing="0" class="mt-4">
                    <tr>
                        <td>Kepada Yth. </td>
                        <td class="right">No. Invoice : <?= $surat['no_seri']; ?></td>
                    </tr>
                    <tr>
                        <td><b><?= $surat['tujuan']; ?></b></td>
                        <td class="right"><?= tgl_indo($surat['tgl_surat']); ?></td>
                    </tr>
                    <tr>
                        <td>Jakarta</td>
                    </tr>
                    <tr>
                        <td>(081278931998)</td>
                    </tr>
                </table>
            </div>

            <div class="table-item ">
                <table class="mt-lg-5" cellspacing="0" cellpadding="2" align="center">
                    <thead>
                        <tr style="background-color: green;">
                            <td>NO.</td>
                            <td>NAMA BARANG</td>
                            <td>QTY</td>
                            <td>KETERANGAN</td>
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
                                <td><?= $barang['qty']; ?></td>
                                <td><?= $barang['ket']; ?></td>
                                <!-- <td style="width: 5%;"><?= $i; ?></td>
                                    <td style="width: 30%;">Wallpaper dinding</td>
                                    <td style="width: 10%;">4mx4m</td>
                                    <td style="width: 25%;">Rp. 25.000</td>
                                    <td style="width: 30%;">Rp. 400.000</td> -->
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="text-left" colspan="3">Catatan :</td>
                            <td class="text-left">PERHATIAN: <br>
                                <ol>
                                    <li>Surat Jalan Ini merupakan bukti pernerimaan barang.</li>
                                    <li>Surat Jalan ini bukan bukti penjualan.</li>
                                    <li>3. Surat Jalan ini akan dilengkapi invoice sebagai bukti penjualan.</li>
                                </ol>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <div class="mt-3">
                <span style="display:inline-block; width:8%;"></span>
                Demikian Surat ini kami sampaikan, besar harapan kami bapak/Ibu berminat dengan harga yang
                kami tawarkan. Atas perhatian dan kerjasamanya kami sampaikan terima kasih.
            </div> -->

            <br>
            <div class="mt-5">
                <div class="cap-surat-kiri"> <br>
                    Diterima Oleh
                    <hr style="border-top: 1px solid black; margin-top:65%; width: 70%; margin-left: 0px;">
                </div>
                <div class="cap-surat-kanan">
                    <div class="cap-surat">
                        <span class="jarak"><?= 'Bekasi, ' . explode(',', tgl_indo($surat['tgl_surat']))[1]; ?></span><br>
                        <span class="jarak">Hormat Kami</span>
                        <img class="jarak" align="center" src="<?= PUBLICC; ?>/img/sci/SCI_Logo.png" style="width: 70%; margin-left: 18%; margin-bottom: -8%;"><br>
                        <hr class="nama">
                        <span style="margin-left: auto;">PT. Sentral Citra Indonesia</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= PUBLICC; ?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= PUBLICC; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script>
            window.print();
            window.location.href = "<?= BASEURL . '/' . $data['perusahaan'] . '/detail/' . $surat['id']; ?>";
        </script> -->
</body>

</html>