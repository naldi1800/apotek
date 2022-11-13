<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= BASEURL ?>/TP/css/bootstrap.min.css" rel="stylesheet">
<!--    <script src="--><?//= BASEURL ?><!--/TP/js/bootstrap.bundle.min.js"></script>-->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 -->
    <link href="<?= BASEURL ?>/TP/Select2/css/select2.min.css" rel="stylesheet"/>
    <script src="<?= BASEURL ?>/TP/Select2/js/select2.min.js"></script>

    <!-- Dselect -->
    <script src="<?= BASEURL ?>/TP/dselect.js"></script>

    <!-- <title>Admin | <?= $page ?></title> -->
    <title>Karyawan - <?= $nama; ?></title>
</head>
<body>


<div class="container-fluid">
    <div class=" shadow p-3 mb-5 mt-2 bg-light rounded">
        <?php require_once "App\Image\Icon\Svg File.php" ?>
        <?= \App\Contorller\Alert::Get(); ?>



