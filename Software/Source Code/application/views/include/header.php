<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title><?=$sayfaAdi?></title>
  <!-- Favicon-->
  <link rel="icon" href="<?php echo base_url('assets/'); ?>favicon.ico" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  <!-- Bootstrap Core Css -->
  <link href="<?php echo base_url('assets/'); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Sweetalert Css -->
  <link href="<?php echo base_url('assets/'); ?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
  <!-- Waves Effect Css -->
  <link href="<?php echo base_url('assets/'); ?>plugins/node-waves/waves.css" rel="stylesheet" />
  <!-- Bootstrap Select Css -->
  <link href="<?php echo base_url('assets/'); ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
  <!-- Animation Css -->
  <link href="<?php echo base_url('assets/'); ?>plugins/animate-css/animate.css" rel="stylesheet" />
  <!-- JQuery DataTable Css -->
  <link href="<?php echo base_url('assets/'); ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  <!-- Custom Css -->
  <link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>css/custom.css" rel="stylesheet">

  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
  <!-- Jquery Core Js -->
  <script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>js/alert.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <script src="<?php echo base_url('assets/'); ?>js/script.js"></script>
  <!-- Bootstrap Core Js -->
  <script src="<?php echo base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.js"></script>

  <!-- SweetAlert Plugin Js -->
  <script src="<?php echo base_url('assets/'); ?>plugins/sweetalert/sweetalert.min.js"></script>

  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="<?php echo base_url('assets/'); ?>css/theme-blue-grey.css" rel="stylesheet" />
</head>

<body class="theme-blue-grey">
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

  
  <!-- Search Bar -->
  <div class="search-bar">
    <div class="search-icon">
      <i class="material-icons">search</i> 
    </div>
    <input type="text" placeholder="Aranacak kelimeyi giriniz...">
    <div class="close-search">
      <i class="material-icons">close</i>
    </div>
  </div>
  <!-- #END# Search Bar -->


  <!-- Top Bar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="<?php echo base_url('panel'); ?>"> INNCREALİFT - ASANSÖR YÖNETİM SİSTEMİ </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <!-- Call Search -->
        <!--  <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
          <!-- #END# Call Search -->
          <li>
            <a href="<?php echo base_url('panel/logout'); ?>">
              <i class="material-icons">exit_to_app </i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- #Top Bar -->
  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info">
        <div class="image">
          <img src="<?php echo base_url('assets/'); ?>images/user.png" width="50" height="50" alt="User" />
        </div>
        <?php $kullanici = $this->session->userdata('isim'); ?>
        <?php $mail = $this->session->userdata('mail'); ?>
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $kullanici; ?></div>
          <div class="email"><?php echo $mail; ?></div>

        </div>
      </div>