<?php
    if($_GET['id'])
        \App\Model\Obat::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=obat&c=index");
    exit;