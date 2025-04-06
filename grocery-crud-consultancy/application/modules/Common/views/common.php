<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <?php $siteSetting = $this->db->get_where('site_setting', array('site_id'=>1))->row();?>

  <title><?=$siteSetting->site_name; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Walkers Hive Admin & Dashboard" name="description" />
  <meta content="Themesbrand" name="Walkers Hive" />


  <!-- App favicon -->
  <link rel="shortcut icon" href="<?=base_url('uploads/site/').$siteSetting->fav_icon;?>">

  <script src="<?=base_url();?>assets/libs/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="<?=base_url(); ?>public/app.js"></script>
  <script src="<?=base_url();?>assets/js/validator.js" type="text/javascript"></script>

  <!-- Custom Style css -->
  <link href="<?=base_url(); ?>assets/css/layout.css" rel="stylesheet">


  <!-- Bootstrap Css -->

  <?php if (!empty($output['css_files'])): ?>

    <?php foreach ($output['css_files'] as $file): ?>

      <link type="text/css" rel="stylesheet" href="<?=$file; ?>" />

    <?php endforeach ?>

  <?php endif ?>


  <link href="<?=base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />


  <!-- Icons Css -->
  <link href="<?=base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?=base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


  <script src="<?= base_url();?>/assets/ckeditor/ckeditor.js"></script>


  <!-- PNotify -->
  <link href="<?= base_url();?>assets/plugins/pnotify/dist/pnotify.css" rel="stylesheet">
  <link href="<?= base_url();?>assets/plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
  <link href="<?= base_url();?>assets/plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">


  <script src="<?= base_url();?>assets/plugins/pnotify/dist/pnotify.js"></script>
  <script src="<?= base_url();?>assets/plugins/pnotify/dist/pnotify.buttons.js"></script>
  <script src="<?= base_url();?>assets/plugins/pnotify/dist/pnotify.nonblock.js"></script>


</head>

<body data-sidebar="dark">


  <div id="loader"></div>
  <!-- Begin page -->

  <div id="layout-wrapper">
    <header id="page-topbar">
      <div class="navbar-header">
        <div class="d-flex">
          <!-- LOGO -->
          <div class="navbar-brand-box">
            <a href="<?=site_url('Dashboard')?>" class="logo logo-dark">
              <span class="logo-sm">
                <img src="<?=base_url('uploads/site/').$siteSetting->site_logo;?>" alt="" height="22">
              </span>
              <span class="logo-lg">
                <img src="<?=base_url('uploads/site/').$siteSetting->site_logo;?>" alt="" height="17">
              </span>
            </a>

            <a href="<?=site_url('Dashboard')?>" class="logo logo-light">
              <span class="logo-sm">
                <img src="<?=base_url('uploads/site/').$siteSetting->site_logo;?>" alt="" height="22">
              </span>
              <span class="logo-lg">
                <img src="<?=base_url('uploads/site/').$siteSetting->site_logo;?>" alt="" style="max-width: 100%;">
              </span>
            </a>
          </div>

          <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
          </button>
        </div>

        <div class="d-flex">
          <div class="dropdown d-none d-lg-inline-block ml-1">
            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
              <i class="bx bx-fullscreen"></i>
            </button>
          </div>

          <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php $this->load->helper('common');?>
              <img class="rounded-circle header-profile-user" src="<?=getProfilePhotoPath();?>"
              alt="Header Avatar">
              <span class="d-none d-xl-inline-block ml-1"><?=$this->session->userdata('full_name')?></span>
              <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-right">

              <a class="dropdown-item" href="<?=site_url('Dashboard/changeUserPassword')?>">
                <i class="bx bx-wallet font-size-16 align-middle mr-1"></i> Change Password
              </a>

              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="<?=site_url('Login/logout')?>"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ========== Left Sidebar Start ========== -->

    <div class="vertical-menu">
      <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
              <a href="<?=site_url('Dashboard')?>" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span>Dashboard</span>
              </a>
            </li>

            <?=populateMenu(); ?>

            <li>
              <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-layout"></i>
                <span>System Setting</span>
              </a>
              <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?=site_url('MenuSetup')?>">Menu Setup</a></li>
              </ul>
            </li>

          </ul>
        </div>
        <!-- Sidebar -->
      </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-flex align-items-center justify-content-between">

                <?php if (!empty($data['main_title'])): ?>

                  <h4 class="mb-0 font-size-18"><?=$data['main_title'] ?>
                  <small><?=$data['title_small'] ?></small>
                </h4>

              <?php else: ?>

                <h4 class="mb-0 font-size-18"><?=$main_title; ?> <small><?=$title_small; ?></small></h4>

              <?php endif ?>

            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">

                <?php if (!empty($output['output'])): ?>

                  <?=$output['output'];?>

                <?php else: ?>

                  <?php $this->load->view($inner_template);?>

                <?php endif ?>

              </div>
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- End Page-content -->

      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="text-sm-right d-none d-sm-block">
                Copyright © <?=date('Y')?>. Designed and Developed by <a href="https://walkershive.com" target="_blank">W-Hive IT Professionals Pvt. Ltd.</a> All Rights reserved.
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- end main content-->
  </div>
  <!-- END layout-wrapper -->

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>



  <script src="<?=base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

  <?php if (!empty($output['js_files'])): ?>

    <?php foreach ($output['js_files'] as $file): ?>
      <script src="<?=$file; ?>"></script>
    <?php endforeach ?>

  <?php endif ?>



  <script src="<?=base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
  <script src="<?=base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
  <script src="<?=base_url();?>assets/libs/node-waves/waves.min.js"></script>
  <script src="<?=base_url();?>assets/js/app.js"></script>


  <script type="text/javascript">
    $(document).ready(function(){

      init_validator();
      validator.defaults.alerts = false;

      $('.modal').modal({
        show:false,
        backdrop:'static',
        keyboard:false,
      });
    });
  </script>

</body>

</html>
