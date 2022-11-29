<!DOCTYPE html>
<html lang="en">
<?php

use App\Contorller\Fungsi;

$datas = $_SESSION['print']['data'];
$bulan = $_SESSION['print']['bulan'];
//  unset($_SESSION['print']);
?>


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= BASEURL ?>/TP/css/bootstrap.min.css" rel="stylesheet">
    <!--    <script src="--><? //= BASEURL 
                            ?>
    <!--/TP/js/bootstrap.bundle.min.js"></script>-->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 -->
    <link href="<?= BASEURL ?>/TP/Select2/css/select2.min.css" rel="stylesheet" />
    <script src="<?= BASEURL ?>/TP/Select2/js/select2.min.js"></script>

    <!-- Dselect -->
    <script src="<?= BASEURL ?>/TP/dselect.js"></script>

    <!-- <title>Admin | <?= $page ?></title> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
        }

        .xheader,
        .xsub-header {
            text-transform: uppercase;
        }

        .xheader {
            font-size: 24pt;
        }

        .xsub-header {
            font-size: 18pt;
        }

        /* @media print{@page {size: landscape}} */
    </style>
</head>

<body>
    <div class="text-center xheader">Data Penjualan</div>
    <div class="text-center xsub-header"><?= $bulan != "" ? "bulan : $bulan" : ""  ?></div>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th width="5%">No</th>
                <th width="25%">Nama Obat</th>
                <th width="10%">Jumlah Beli</th>
                <th width="15%">Harga Satuan</th>
                <th width="10%">Diskon</th>
                <th width="15%">Tanggal Beli</th>
                <th width="20%">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($datas != null) :
                $no = 1;
                $totalsemua = 0;
                foreach ($datas as $data) :
                    $totAwal = $data['totalbeli'] * $data['harga'];
                    $total = ($totAwal) - (($totAwal) * $data['diskon']);
                    $totalsemua += $total;
            ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td class="text-center"><?= $data['nama_obat'] ?></td>
                        <td class="text-center"><?= $data['totalbeli'] ?></td>
                        <td class="text-end"><?= Fungsi::rupiah($data['harga']) ?></td>
                        <td class="text-center"><?= $data['diskon'] . "%" ?></td>
                        <td class="text-center"><?= $data['soldtime'] ?></td>
                        <td class="text-end"><?= Fungsi::rupiah($total) ?></td>
                    </tr>
                <?php
                    $no++;
                endforeach;
                ?>
                <tr>
                <td class="text-center" colspan="6">Total</td>
                <td class="text-end"><?= Fungsi::rupiah($totalsemua) ?></td>
                </tr>
            <?php else : ?>
                <td class="text-center" colspan="7">Data Kosong</td>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>