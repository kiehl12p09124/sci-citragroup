<?php

$memo = $data['Memo'];
$no = 1;
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Memo <?= $memo['jenis'] . ' Barang ' . $memo['tujuan']; ?></title>
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
            width: 30%;
        }

        .table-item {
            width: 100%;
        }

        .table-item table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 100%;
        }

        .utama {
            width: 95%;
            margin-left: auto;
            margin-right: auto;
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
            <img src="<?= PUBLICC . '/img/' . $memo['perusahaan'] . '/' . $memo['perusahaan'] . '_Kop.png'; ?>">
        </div>
        <div class="main">
            <div class="header-surat">
                <table cellspacing="0" class="mt-4">
                    <tr>
                        <td>Hal : Memo <?= $memo['jenis']; ?> Barang</td>
                        <td></td>
                        <td class="text-right">Bekasi, <?= tgl_indo(date('Y-m-d')); ?></td>
                    </tr>
                    <tr>
                        <td>
                            Kepada Yth: <br> <?= $memo['tujuan']; ?> <br>
                            <?= $memo['alamat']; ?>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="utama mt-5">
                <span class="ml-n2">
                    Bersama dengan memo ini, kami ingin memberitahukan perihal <?= strtolower($memo['jenis']);?> barang pada hari <?= tgl_indo($memo['tanggal']); ?>
                </span>
                <div class="table-item mt-1">
                    <table cellspacing="0" cellpadding="2" align="center">
                        <thead>
                            <tr style="background-color: green;">
                                <td>NO.</td>
                                <td>NAMA BARANG</td>
                                <td>KET</td>
                                <td>UKURAN</td>
                                <td>QTY</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['barang'] as $barang) : ?>
                                <tr class="text-uppercase">
                                    <td><?= $no++; ?></td>
                                    <td class="text-center"><span class="m-0"><?= $barang['nama_barang']; ?></span></td>
                                    <td class="text-center"><span class="m-0"><?= $barang['keterangan']; ?></span></td>
                                    <td><?= $barang['ukuran']; ?></td>
                                    <td><?= $barang['qty']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <span class="ml-2">
                        Barang-barang tersebut akan kami <?= $memo['jenis'] == "Pengiriman" ? "kirim": "ambil";?> dengan data kendaraan sebagai berikut :
                    </span> 
                </div>
                <table class="ml-5" cellpadding="2">
                    <tr>
                        <td>Nama Supir</td>
                        <td>:</td>
                        <td><?= $memo['nama_driver']; ?></td>
                    </tr>
                    <tr>
                        <td>No. Kendaraan</td>
                        <td>:</td>
                        <td><?= $memo['no_kendaraan']; ?></td>
                    </tr>
                    <tr>
                        <td>No. Hp Supir</td>
                        <td>:</td>
                        <td><?= $memo['no_driver']; ?></td>
                    </tr>
                </table>
                <div class="mt-3">
                    Demikian informasi dari kami, mohon dapat dibantu untuk proses <?= strtolower($memo['jenis']); ?> barang
                    tersebut. Atas perhatianya kami ucapkan terima kasih.
                </div>
            </div>

            <div class="mt-5">
                <div class="cap-surat-kanan">
                    <div class="cap-surat">
                        <span class="jarak"><?= tgl_indo(date('Y-m-d')); ?></span><br>
                        <span class="jarak">Hormat Kami</span>
                        <img class="jarak" align="center" src="<?= PUBLICC . '/img/' . $memo['perusahaan'] . '/' . $memo['perusahaan'] . '_Logo.png'; ?>" style="width: 70%; margin-left: 18%; margin-bottom: -8%;"><br>
                        <span style="margin: auto;"><?= citra($memo['perusahaan']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= PUBLICC; ?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= PUBLICC; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        window.print();
        window.addEventListener('afterprint', event =>{
        window.location.href = "<?= BASEURL . '/Memo/detail/' . $memo['id']; ?>";
        })
    </script>
</body>

</html>