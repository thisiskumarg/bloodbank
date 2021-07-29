<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/js/bootstrap.bundle.min.js'); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a href="<?php echo site_url('Welcome/index/'); ?>" class="navbar-brand"><img src="<?php echo base_url('images/logo.png'); ?>" alt="Logo" class="img-fluid ml-3" style="height: 80px; width: 180px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active px-4 py-2">
                    <a href="<?php echo site_url('Welcome/index/'); ?>" class="nav-link text-danger font-weight-bold">HOME</a>
                </li>
                <?php 
                if(isset($_SESSION['uid']))
                {
                    echo '
                    <li class="nav-item active px-4 py-2">
                        <a class="nav-link text-danger font-weight-bold" href="'.site_url('Welcome/profile/').'">MY ACCOUNT</a>
                    </li>
                    <li class="nav-item active px-4 py-2">
                        <a class="nav-link text-danger font-weight-bold" href="'.site_url('Welcome/logout/').'">LOGOUT</a>
                    </li>
                    ';
                }
                else
                {
                    echo '
                    <li class="nav-item active px-4 py-2">
                        <a class="nav-link text-danger font-weight-bold" href="'.site_url('Welcome/login/').'">LOGIN</a>
                    </li>
                    <li class="nav-item active px-4 py-2">
                        <a class="nav-link text-danger font-weight-bold" href="'.site_url('Welcome/register/').'">REGISTER</a>
                    </li>
                    ';
                }
                ?>
            </ul>
        </div>
    </nav>
