<h2 class="h2 text-center">
    Data Penjualan
</h2>
<a href="?page=penjualan&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>



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

    use App\Model\Penjualan;
    $no = 1;
    $datas = Penjualan::GetAll($link);
    if($datas != null):
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
    <?php $no++; endforeach; else: ?>
        <td class="text-center" colspan="6">Data Kosong</td>
        <?php endif; ?>
    </tbody>
</table>

