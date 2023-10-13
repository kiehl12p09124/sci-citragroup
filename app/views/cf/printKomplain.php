<?php $surat = $data['surat']; ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width' />
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
    </style>

</head>

<body>
    <div class="margin">
        <div class="kop">
            <img src="<?= PUBLICC; ?>/img/cf/CF_Kop.png">
        </div>

        <div class="main">

        </div>
        lorem
    </div>
    <script src="<?= PUBLICC; ?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= PUBLICC; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        // window.print();
        // window.location.href = "<?= BASEURL . '/' . $data['perusahaan'] . '/detail/' . $surat['id']; ?>";
    </script>
</body>

</html>