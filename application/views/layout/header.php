<?php
$user = $this->Users_Model->get_user();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Dosen</title>
    <meta name="description" content="Buka obrolan yang tepat dengan Dosen Anda. Template pesan & pembuat pesan profesional. Gratis!">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/sw-custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
<script src="<?= base_url() ?>assets/js/jquery-3.4.1.min.js"></script>

</head>

<body>
    <div class="loading">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <div id="loader">
        <img src="<?= base_url() ?>assets/image/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <div class="appHeader bg-danger text-light">
        <div class="pageTitle">
            <h2 style="font-family: Black Ops One;color:#dbdada">Chat Dosen</h2>
        </div>
        <div class="right">
            <div class="headerButton" data-toggle="dropdown" id="dropdownMenuLink" aria-haspopup="true">
                <?php if($user['login_type'] == 'google'){ ?>
                <img src="<?= $user['image'] ?>" alt="image" class="imaged w32">
                <?php }else{ ?>
                <img src="<?= base_url('uploads/profile/'.$user['image']) ?>" alt="image" class="imaged w32">
                <?php } ?>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" onclick="location.href='<?= base_url('profile') ?>'" href="#"><ion-icon size="small" name="person-outline"></ion-icon>Profil</a>
                    <a class="dropdown-item" onclick="location.href='<?= base_url('logout') ?>'" href="#"><ion-icon size="small" name="log-out-outline"></ion-icon>Keluar</a>
                </div>
            </div>
        </div>
        <div class="progress" style="display:none;position:absolute;top:50px;z-index:4;left:0px;width: 100%">
            <div id="progressBar" class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                <span class="sr-only">0%</span>
            </div>
        </div>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>