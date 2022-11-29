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
                <td width="10%" class="text-center">
                    <?= $data['stok'] ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Edit Stok
                    </button>
                </td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Stok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation p-3" method="post" novalidate>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" min="0" name="stok" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter in the Stok
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <input id="checklist" name="checklist" type="checkbox" class="form-check-input" onchange="isChecklist(this.checked);">
                        <label for="checklist" class="form-check-label">Ceklis jika ingin mengurangkan stok</label>
                    </div>
                    <div class="col-md-12" id="ketParent" hidden>
                        <label for="ket" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="ket" name="ket">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Wajib diisi
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="submitButton" type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function isChecklist(v){
        if(v){
            document.getElementById("ketParent").removeAttribute('hidden');
            document.getElementById("ket").setAttribute('required', 'true')
            document.getElementById("submitButton").innerHTML = "Kurang";
        }else{
            document.getElementById("ketParent").setAttribute('hidden','true');
            document.getElementById("ket").removeAttribute('required');
            document.getElementById("submitButton").innerHTML = "Tambah";
        }
    }
</script>

<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>