<h2 class="h2 text-center">
    Data Obat
</h2>
<a href="?page=obat&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>No</th>
        <th>Barcode</th>
        <th>Nama Obat</th>
        <th>Harga</th>
        <th>Diskon</th>
        <th>Stok</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    use App\Model\Obat;
    $i = 0;
    $datas = Obat::GetAll($link);
    foreach ($datas as $data) :
$i++;
        ?>
        <tr>
            <td width="5%" class="text-center"><?= $i ?></td>
            <td width="25%" class="text-center"><?= $data['barcode'] ?></td>
            <td width="25%" class="text-center"><?= $data['nama_obat'] ?></td>
            <td width="10%" class="text-center"><?= $data['harga'] ?></td>
            <td width="10%" class="text-center"><?= $data['diskon'] ?></td>
            <td width="10%" class="text-center"><?= $data['stok'] ?></td>
            <td width="15%" class="">
                <center>
                    <a href="?page=obat&c=ubah&id=<?= $data['id_obat'] ?>" class="text-center btn btn-info">
                        Edit
                    </a>
                    <a href="?page=obat&c=hapus&id=<?= $data['id_obat'] ?>" class="text-center btn btn-danger">
                        Hapus
                    </a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>