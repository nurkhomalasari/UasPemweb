<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Kita</title>

    <!-- Asset -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo/'); ?>logo-pb.png">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/bootstrap.css">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>datatables/datatables.css" rel="stylesheet" type="text/css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,400;1,500;1,700&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: linear-gradient(50deg, var(--white), #faebd7);
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: linear-gradient(var(--warning), var(--indigo)); */
            background: url("<?= base_url('assets/'); ?>img/background/bg.jpg");
        }
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(var(--cyan), var(--danger));
            opacity: 0.3;
            z-index: 0;
        }
        .container { 
            max-width: 100%; 
            width: 96%; 
            margin: 0 2%;
        }
        nav.navbar {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 100;
            background-color: var(--orange) !important;
            box-shadow: 0 3px 15px var(--orange);
        }
        .container .navbar-nav a.nav-item,
        .container .navbar-nav .user-box span.nav-item {
            color: #fff;
            font-weight: 500;
            padding: 7px 14px;
        }
        .container .navbar-nav a.booking {
            padding-right: 20px;
        }
        .container .navbar-nav a.booking span {
            position: absolute;
            font-size: 12px;
            font-weight: 600;
            border: 2px solid var(--danger);
            min-width: 20px;
            height: 20px;
            text-align: center;
            padding-right: 1px;
            border-radius: 50%;
            background: var(--primary);
            margin-top: -5px;
            transform: translateX(-20%);
        }
        .navbar-brand, .nav-item {
            z-index: 1;
        }
        .navbar-nav .user-box span {
            cursor: default;
            font-size: 1.2em;
        }
        @media (min-width: 1000px) {
            .navbar-nav .user-box span {
                position: absolute;
                right: 5vw;
            }
        }
        .container .navbar-nav .nav-item:link,
        .container .navbar-nav .nav-item:visited,
        .container .navbar-nav .nav-item:hover,
        .container .navbar-nav .nav-item:active,
        .navbar-toggler {
            color: #fff;
        }
        .container .navbar-nav .nav-item:hover {
            color: #113450;
        }
        .navbar-toggler,
        .navbar-toggler:focus {
            background: none;
            border: none;
            outline: none;
        }
        .navbar-toggler span {
            color: #fff;
            font-size: 1.8em;
            font-weight: 700;
        }
        .container.mt-six {
            margin-top: 6em !important;
            position: relative;
            z-index: 11;
        }
        .modal.fade {
            margin-top: 4rem !important;
        }
        .modal-backdrop {
            z-index: 10 !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>" style="color: #fff; font-weight: 800;">Perpustakaan Kita</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fw fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link xxx" href="<?= base_url(); ?>">Home<span class="sr-only">(current)</span></a>
                    
                    <?php
                    if (!empty($this->session->userdata('email'))) { ?>
                        <?php 
                        if ($this->session->userdata("role_id") == 1) { ?>
                            <a href="<?= base_url('admin'); ?>" class="nav-item nav-link">Admin</a>
                        <?php
                        }?>
                        <a href="<?= base_url('member/myprofil'); ?>" class="nav-item nav-link">Profil Saya</a>
                        <a href="<?= base_url('member/logout'); ?>" class="nav-item nav-link">Log out</a>

                        <a href="<?= base_url('booking'); ?>" class="nav-item nav-link booking"><i class="fas fw fa-shopping-cart"></i><span><?= $this->ModelBooking->getDataWhere('temp', ['email_user' => $this->session->userdata('email')])->num_rows(); ?></span></a>
                    <?php } else { ?>
                        <a href="#" data-toggle="modal" onclick="loginShow()" data-target="#daftarModal" class="nav-item nav-link">Daftar</a>
                        <a href="#" data-toggle="modal" onclick="daftarShow()" data-target="#loginModal" class="nav-item nav-link">Login</a>
                    <?php } ?>
                    <div class="user-box">
                        <span class="nav-item nav-link" id="username" data-username="<?= $user; ?>"></span>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script>
        let link = document.querySelectorAll(".container .navbar-nav a");
        let nav_collapse = document.querySelector(".container .navbar-collapse");
        
        for (let c = 0; c < link.length; c++) {
            link[c].onclick = function() {
                nav_collapse.classList.remove("show");
            }
        }
    </script>
    <script>
        let user = document.querySelector(".container .navbar-nav span#username");
        var text = "Selamat Datang " + user.dataset.username;
        var speed = 100;
        let x = 0;
        
        // type writing effect
        function userTypeWriter() {
            if (x < text.length) {
                user.innerHTML += text.charAt(x);
                x++;
                setTimeout(userTypeWriter, speed);
            } else {
                user.innerHTML = user.dataset.username;
            }
        }
        window.addEventListener("load", userTypeWriter);
        // end type writing effect

        // notif booking
        let notif = document.querySelector(".container .navbar-nav a.booking span");
        
        if (notif.innerHTML == 0) {
            notif.style.display = "none";
        }

        // navbar
    </script>
    <div class="container mt-six">