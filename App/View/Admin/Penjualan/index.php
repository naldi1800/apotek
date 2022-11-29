<?php

use App\Model\Penjualan;
use App\Contorller\Fungsi;

$no = 1;
$datas = Penjualan::GetAll($link);
$bulan = "";
if (isset($_POST['search'])) {
    if ($_POST['search'] !=  "" && !is_null($_POST['search'])) {
        $datas = Penjualan::GetAllWithFilter($link, $_POST['search']);
        $bulan = Fungsi::getMonthAndYear($_POST['search']);
    }
}
$_SESSION['print']['data'] = $datas;
$_SESSION['print']['bulan'] = $bulan;

?>

<h2 class="h2 text-center">
    Data Penjualan
</h2>
<a href="?page=penjualan&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<a href="?page=penjualan&c=print" class="btn btn-outline-success mb-3">Print</a>
<form class="row mb-3 col-6 g-3" method="post">
    <label for="search" class="col-2 col-form-label"> Berdasarkan</label>
    <div class="input-group col">
        <input id="search" require name="search" type="month" class="form-control" aria-describedby="searchButton">
        <button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
    </div>
</form>

<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>Total Beli</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php


        if ($datas != null) :
            foreach ($datas as $data) :

        ?>
                <tr>
                    <td width="10%" class="text-center"><?= $no ?></td>
                    <td width="25%" class="text-center"><?= $data['nama_obat'] ?></td>
                    <td width="25%" class="text-center"><?= $data['harga'] ?></td>
                    <td width="15%" class="text-center"><?= $data['diskon'] ?></td>
                    <td width="10%" class="text-center"><?= $data['totalbeli'] ?></td>
                    <td width="15%" class="">
                        <center>
                            <!-- <a href="?page=penjualan&c=ubah&id=<?= $data['Kode_MK'] ?>" class="text-center btn btn-info">
                        Edit
                    </a> -->
                            <a href="?page=penjualan&c=hapus&id=<?= $data['id_jual'] ?>" class="text-center btn btn-danger">
                                Hapus
                            </a>
                        </center>
                    </td>
                </tr>
            <?php $no++;
            endforeach;
        else : ?>
            <td class="text-center" colspan="6">Data Kosong</td>
        <?php endif; ?>
    </tbody>
</table>