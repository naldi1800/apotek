<h2 class="h2 text-center">
    MID (192111)
</h2>
<a href="?page=mid&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>No</th>
        <th>Nama Pasien</th>
        <th>Keluhan</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    use App\Model\Mid;
    $i = 0;
    $datas = Mid::GetAll($link);
    foreach ($datas as $data) :
$i++;
        ?>
        <tr>
            <td width="15%" class="text-center"><?= $i ?></td>
            <td width="30%" class="text-center"><?= $data['pasien'] ?></td>
            <td width="30%" class="text-center"><?= $data['keluhan'] ?></td>
            <td width="25%" class="">
                <center>
                    <a href="?page=mid&c=ubah&id=<?= $data['id'] ?>" class="text-center btn btn-info">
                        Edit
                    </a>
                    <a href="?page=mid&c=hapus&id=<?= $data['id'] ?>" class="text-center btn btn-danger">
                        Hapus
                    </a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>