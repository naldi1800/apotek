<?php

use  App\Model\Mid;


if (isset($_POST["ubah"])) {
    Mid::Update($link,  $_POST['id'],  $_POST);
    header("Location: index.php?page=mid&c=index");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Mid::GetWithId($link, $id);
    ?>
    <div class="col-lg-8 mx-auto border rounded-3 border-primary">
        <h2 class="h2 text-center mt-3">
            Form Ubah Mid
        </h2>
        <form class="row g-3 needs-validation p-3" method="post" novalidate>
            <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
        <div class="col-md-6">
            <label for="pasien" class="form-label">Pasien</label>
            <input type="text" value="<?= $data['pasien'] ?>" class="form-control" id="pasien" name="pasien" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter pasien
            </div>
        </div>

        <div class="col-md-6">
            <label for="keluhan" class="form-label">Keluhan</label>
            <input type="text" value="<?= $data['keluhan'] ?>" class="form-control" id="keluhan" name="keluhan" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter keluhan
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary col-12" type="submit" name="ubah">Save</button>
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
    <?php
} else {
    header("Location: " . BASEURL . "/index.php?page=obat&c=index");
    exit;
}
?>