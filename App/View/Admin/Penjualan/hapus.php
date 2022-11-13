<?php
    if($_GET['id'])
        \App\Model\Penjualan::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=penjualan&c=index");
    exit;