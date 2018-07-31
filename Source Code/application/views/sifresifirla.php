<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-17 00:28:49
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   Asus
 * @Last Modified time: 2018-07-17 00:51:54
 */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Şifremi Unuttum</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/');?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/');?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/');?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/');?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/');?>css/style.css" rel="stylesheet">
</head>
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
      <div class="preloader">
        <div class="spinner-layer pl-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
            <div class="circle"></div>
        </div>
    </div>
</div>
<p>Lütfen Bekleyiniz...</p>
</div>
</div>
<!-- #END# Page Loader -->
<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">INN<b>CREA</b></a>
            <small>Innovation & Creativity</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST" action="<?=current_url()?>">
                    <div class="msg">
                        <?php echo isset($durum) ? $durum : NULL?>
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php if(!isset($durum)){ ?>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Şifre" autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                               <input type="password" class="form-control" name="repassword" placeholder="Şifre (Tekrar)" autofocus>
                           </div>
                       </div>
                       <button class="btn btn-block btn-lg bg-red waves-effect" type="submit">ŞİFREMİ SIFIRLA</button>
                   <?php } ?>
                   <div class="row m-t-20 m-b--5 align-center">
                    <a href="<?php echo base_url('giris') ?>">Giriş Yap !</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url('assets/');?>plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="<?php echo base_url('assets/');?>plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="<?php echo base_url('assets/');?>js/admin.js"></script>
<script src="<?php echo base_url('assets/');?>js/pages/examples/forgot-password.js"></script>
</body>

</html>