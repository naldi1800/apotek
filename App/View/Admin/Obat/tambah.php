<?php

use  App\Model\Obat;

if (isset($_POST["tambah"])) {
    Obat::Insert($link, $_POST);
    header("Location: index.php?page=obat&c=index");
    exit;
}
?>
<div class="col-lg-8 mx-auto border rounded-3 border-primary">
    <h2 class="h2 text-center mt-3">
        Form Obat
    </h2>
    <form class="row g-3 needs-validation p-3" method="post" novalidate>
        <div class="col-md-4">
            <label for="barcode" class="form-label">Barcode</label>
            <input type="text" class="form-control" id="barcode" name="barcode" maxlength="12" minlength="12"
                   required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the barcode, a minimum of 12 digits
            </div>
        </div>

        <div class="col-md-8">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" class="form-control" id="nama_obat" name="nama_obat" minlength="3" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter at least 3 letters
            </div>
        </div>
        <div class="col-md-4">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the Harga
            </div>
        </div>
        <div class="col-md-4">
            <label for="diskon" class="form-label">Diskon</label>
            <input type="number" class="form-control" id="diskon" min="0" max="100" name="diskon" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
            Please enter in the Diskon
            </div>
        </div>
        <div class="col-md-4">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" min="0" name="stok" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the Stok
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit" name="tambah">Save</button>
        </div>
    </form>
</div>

<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()

</script>
