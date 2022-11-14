<?php

use  App\Model\Penjualan;
use  App\Model\Obat;

if (isset($_POST["tambah"])) {
    Penjualan::Insert($link, $_POST);
    header("Location: index.php?page=kasir&c=index");
    exit;
}
?>
<div class="col-lg-8 mx-auto border rounded-3 border-primary">
    <h2 class="h2 text-center mt-3">
        KASIR APOTEK
    </h2>
    <form class="row g-3 needs-validation p-3" method="post" novalidate>
        <div class="col-md-4">
            <label for="id_obat" class="form-label">Obat</label>
            <select id="id_obat" name="id_obat" class="form-select" onchange="getObat(this)" require>
                <option>Pilih</option>
                <?php
                $obats = Obat::GetAll($link);
                foreach ($obats as $obat) :
                ?>
                    <option value="<?= $obat['id_obat'] ?>" data-nama="<?= $obat['nama_obat'] ?>" data-diskon="<?= $obat['diskon'] ?>" data-stok="<?= $obat['stok'] ?>" data-harga="<?= $obat['harga'] ?>">
                        <?= $obat['barcode'] ?> | <?= $obat['nama_obat'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <!-- <input type="text" class="form-control" id="barcode" name="barcode" maxlength="5" minlength="5"
                   required> -->
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter a obat
            </div>
        </div>

        <div class="col-md-3">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" class="form-control" id="nama_obat" name="nama_obat" minlength="3" required readonly>
        </div>
        <div class="col-md-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" minlength="3" required readonly>
        </div>
        <div class="col-md-2">
            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control" id="stok" name="stok" minlength="3" required readonly>
        </div>
        <div class="col-md-4">
            <label for="totalbeli" class="form-label">Total Beli</label>
            <input type="number" class="form-control" id="totalbeli" name="totalbeli" min="1" value="1" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the student's name and at least 3 letters
            </div>
        </div>
        <div class="col-md-4">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="total_harga" name="total_harga" required readonly>
        </div>
        <div class="col-md-4">
            <label for="diskon" class="form-label">Diskon</label>
            <input type="text" class="form-control" id="diskon" name="diskon" required readonly>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit" name="tambah">Save</button>
        </div>
    </form>
</div>

<script>
    function getObat(e) {
        document.getElementById("nama_obat").value = e.options[e.selectedIndex].dataset.nama;
        document.getElementById("harga").value = e.options[e.selectedIndex].dataset.harga;
        document.getElementById("stok").value = e.options[e.selectedIndex].dataset.stok;
    }


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
    })
</script>