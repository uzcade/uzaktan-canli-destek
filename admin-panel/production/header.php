<?php require $config['init']; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?=BASE_URL?>/landing/img/core-img/favicon.ico">

    <title>Firma Yönetim Panel</title>

    <!-- Bootstrap -->
    <link href="<?=BASE_URL?>/admin-panel/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=BASE_URL?>/admin-panel/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=BASE_URL?>/admin-panel/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=BASE_URL?>/admin-panel/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?=BASE_URL?>/admin-panel/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASE_URL?>/admin-panel/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASE_URL?>/admin-panel/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASE_URL?>/admin-panel/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASE_URL?>/admin-panel/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASE_URL?>/admin-panel/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=BASE_URL?>/admin-panel/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
      <div class="container body">
        <div class="main_container">
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="" class="site_title"><i class="fa fa-home"></i> <span>Yönetim Paneli</span></a>
              </div>
  
              <div class="clearfix"></div>
  
              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="<?=BASE_URL?>/admin-panel/production/images/img.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Hoşgeldiniz,</span>
                  <h2>Optus Loop Live</h2>
                </div>
              </div>
              <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Genel</h3>
                <ul class="nav side-menu">
                  <?php if (isset($_SESSION['supporter_session_control']) == TRUE) { ?>
                    <li><a href="<?=base_url('panel/supporter')?>"><i class="fa fa-home"></i> Anasayfa</a></li>
                    <li><a href="<?=base_url('panel/supporter/requests')?>"><i class="fa fa-home"></i> Açılan Talepler</a></li>
                    <li><a href="<?=base_url('panel/supporter/all/customers')?>"><i class="fa fa-user"></i> Müşteriler</a></li>
                    <li><a href="<?=base_url('panel/supporter/chat')?>"><i class="fa fa-send"></i> Mesajlaşma</a></li>
                  <?php } elseif (isset($_SESSION['customer_session_control']) == TRUE) {  ?>
                    <li><a href="<?=base_url('panel/customer')?>"><i class="fa fa-home"></i> Anasayfa</a></li>
                    <li><a href="<?=base_url('panel/customer/chat')?>"><i class="fa fa-send"></i> Mesajlaşma</a></li>
                    <li><a href="<?=base_url('panel/customer/requests')?>"><i class="fa fa-eye"></i> Talep Oluştur</a></li>
                  <?php } else { ?>
                    <li><a href="<?=base_url('panel/admin')?>"><i class="fa fa-home"></i> Anasayfa</a></li>
                    <li><a href="<?=base_url('panel/admin/support-team')?>"><i class="fa fa-eye"></i> Bakım Ekibi</a></li>
                    <li><a href="<?=base_url('panel/admin/customers')?>"><i class="fa fa-user"></i> Müşteriler</a></li>
                    <li><a href="<?=base_url('panel/admin/licence/keys')?>"><i class="fa fa-key"></i> Lisans Anahtarları</a></li>
                  <?php } ?>
                </ul>  
              </div>
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

         <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=BASE_URL?>/admin-panel/production/images/img.jpg" alt="">
                    <?php if (isset($_SESSION['customer_session_control']) == TRUE) {
                      echo $_SESSION['customer_name'];    
                    } else if (isset($_SESSION['supporter_session_control']) == TRUE) {
                      echo $_SESSION['supporter_name']; 
                    } else if (isset($_SESSION['admin_session_control']) == TRUE){
                      echo $_SESSION['admin_name'];
                    } else {
						echo "Yetkisiz Giriş!";
					}?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=BASE_URL?>/logout"><i class="fa fa-sign-out pull-right"></i>Çıkış yap</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
