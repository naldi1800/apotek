<?php

use App\Model\History;

?>
<link href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>


<h2 class="position-relative">
    History Stok Obat
</h2>


<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Stok Awal</th>
            <th>Jumlah Perubahan</th>
            <th>Total</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $i = 0;

        $datas = History::GetAll($link);
        foreach ($datas as $data) :
            $i++;
        ?>
            <tr>
                <td width="5%" class="text-center"><?= $i ?></td>
                <td width="25%" class="text-center"><?= $data['nama_obat'] ?></td>
                <td width="10%" class="text-center" ><?= $data['stokawal'] ?></td>
                <td width="25%" class="text-center" ><?= ($data['tambah']==1 ? "Tambah " : "Kurang " ).$data['qyt'] ?></td>
                <td width="10%" class="text-center" ><?= ($data['tambah']==1 ? $data['stokawal']+$data['qyt'] : $data['stokawal']-$data['qyt'] )  ?></td>
                <td width="25%" class="text-center" ><?= $data['keterangan'] ?></td>
                
            </tr>


        <?php
        endforeach;
        if ($datas == null) :
        ?>
            <tr>
                <td class="text-center" colspan="5">
                    DATA MASIH KOSONG
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>