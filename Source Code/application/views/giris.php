<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Giriş Yap</title>
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
<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">INN<b>CREA</b></a>
            <small>Innovation & Creativity</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?php echo base_url('giris/login'); ?>">
                    <div class="msg">Oturumunuzu başlatmak için giriş yapınız.</div>
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('hata'); ?>
                    <?php

                    /** Beni Hatirla için gerekli olan cookie işlemleri... */
                    $this->load->helper("cookie");
                    $remember_me = get_cookie("remember_me");
                    if($remember_me){
                        $member = json_decode($remember_me);
                    }
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı" value="<?php echo (isset($member)) ? 
                            $member->username : "" ?>" autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" value="<?php echo (isset($member)) ? 
                            $member->password : "" ?>" placeholder="Şifre">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" <?php echo (isset($member)) ? "checked" : "" ?> class="filled-in chk-col-red">
                            <label for="rememberme">Beni Hatırla</label>
                        </div>
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-red waves-effect" type="submit">GİRİŞ YAP</button>
                        </div>
                    </div>
                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="<?php echo base_url('sifremi-unuttum') ?>">Şifremi Unuttum ?</a>
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
</body>

</html>