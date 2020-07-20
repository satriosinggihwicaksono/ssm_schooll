<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?=$konfigurasi['data']['name']?></title>
  <script src="<?=base_url()?>components/assets/js/jquery-3.3.1.min.js"></script>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url()?>components/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <!--  data table -->
  <link rel="stylesheet" href="<?=base_url()?>components/assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>components/assets/css/select.dataTables.min.css">
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>components/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>components/assets/css/components.css">

  <!-- sweetalret -->
  <link href="<?=base_url()?>components/assets/css/sweetalert.min.css" rel="stylesheet"/> 
  <link href="<?=base_url()?>components/assets/css/sweetalert2.min.css" rel="stylesheet"/> 

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

  <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

  <!-- select2 -->
  <link href="<?=base_url()?>components/assets/css/select2.min.css" rel="stylesheet" />

</head>

<body>

  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><h4 style="color: white;">&nbsp;</h4></li>
            <li><h4 style="color: white;"><?= $menu ?></h4></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class=""><a href="<?= base_url('Auth/logout') ?>" class="dropdown">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"><?=$konfigurasi['data']['name']?></a>
          </div>
          <ul class="sidebar-menu">
          <li class="menu-header"><hr class="garis"></li>
              <li <?=$this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == '' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Dashboard')?>" class="nav-link"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header"><hr class="garis"></li>
              <li <?=$this->uri->segment(1) == 'Data_Kelas' || $this->uri->segment(1) == '' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Data_Kelas')?>" class="nav-link"><i class="fas fa-building"></i><span>Kelas</span></a>
              </li>
              <li class="menu-header"><hr class="garis"></li>
              <li <?=$this->uri->segment(1) == 'Data_Pengajar' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Data_Pengajar')?>" class="nav-link"><i class="fas fa-user-shield"></i> <span>Pengajar</span></a>
              </li>
              <li <?=$this->uri->segment(1) == 'Presensi_Pengajar' ? 'class="active"': '' ?>>
                <a class="nav-link" href="<?=site_url('Presensi_Pengajar/index/').date('m').'/'.date('Y')?>"><i class="fas fa-calendar-alt"></i> <span>Presensi</span></a>
              </li>
              <li <?=$this->uri->segment(1) == 'Gaji' ? 'class="active"': '' ?>>
                <a class="nav-link" href="<?=site_url('Gaji')?>"><i class="fas fa-money-bill"></i> <span>Gaji</span></a>
              </li>
              <li class="menu-header"><hr class="garis"></li>
              <li <?=$this->uri->segment(1) == 'Data_Murid' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Data_Murid')?>" class="nav-link"><i class="fas fa-users"></i> <span>Murid</span></a>
              </li>
              <li <?=$this->uri->segment(1) == 'Presensi_Murid' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Presensi_Murid')?>" class="nav-link"><i class="fas fa-calendar-week"></i> <span>Presensi</span></a>
              </li>
              <li <?=$this->uri->segment(1) == 'Verifikasi_Murid' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Verifikasi_Murid/index/'.date('m').'/'.date('Y').'/-/-')?>" class="nav-link"><i class="fas fa-star"></i> <span>Verifikasi</span></a>
              </li>
              <li class="menu-header"><hr class="garis"></li>
              <li <?=$this->uri->segment(1) == 'SPP' ? 'class="active"': '' ?>>
                <a href="<?=site_url('SPP')?>" class="nav-link"><i class="fas fa-money-check"></i> <span>SPP</span></a>
              </li>
              <li <?=$this->uri->segment(1) == 'Ujian' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Ujian')?>" class="nav-link"><i class="fas fa-book"></i> <span>Ujian</span></a>
              </li>
              <li <?=$this->uri->segment(1) == 'Private_page' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Private_page')?>" class="nav-link"><i class="fas fa-address-card"></i> <span>Private</span></a>
              </li>
              <li <?=$this->uri->segment(1) == 'Denda' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Denda')?>" class="nav-link"><i class="fas fa-exclamation"></i> <span>Denda</span></a>
              </li>
              <li class="menu-header"><hr class="garis"></li>
              <li <?=$this->uri->segment(1) == 'Kas' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Kas')?>" class="nav-link"><i class="fas fa-swatchbook"></i> <span>Kas</span></a>
              </li>
              <li <?=$this->uri->segment(1) == 'Laporan' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Laporan')?>" class="nav-link"><i class="fas fa-file"></i> <span>Laporan</span></a>
              </li>
              <li class="menu-header"><hr class="garis"></li>
              <li <?=$this->uri->segment(1) == 'Log' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Log/pengajar')?>" class="nav-link"><i class="fas fa-user-plus"></i> <span>Log Akun</span></a>
              </li>
              <li <?=$this->uri->segment(1) == 'Setting' ? 'class="active"': '' ?>>
                <a href="<?=site_url('Setting')?>" class="nav-link"><i class="fas fa-cogs"></i> <span>Pengaturan</span></a>
              </li>
        </aside>
      </div>      
    </div>
  </div>

<!-- Main Content -->
<div class="main-content">
      <?php echo $contents; ?>
</div>
 
<script src="<?=base_url()?>components/assets/js/jquery-ui.js"></script>

<?php include 'components/assets/js/'.$this->uri->segment(1).'/custom.php'; ?> 
  
  <script src="<?=base_url()?>components/assets/js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="<?=base_url()?>components/assets/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="<?=base_url()?>components/assets/js/jquery.nicescroll.min.js"></script>
  
  <script src="<?=base_url()?>components/assets/js/stisla.js"></script>
  
  <!-- Data Table JS -->
  <script src="<?=base_url()?>components/assets/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>components/assets/js/dataTables.bootstrap4.min.js"></script>  
  <script src="<?=base_url()?>components/assets/js/dataTables.select.min.js"></script>
  
  <!-- Template JS File -->
  <script src="<?=base_url()?>components/assets/js/scripts.js"></script>
  
  <!-- SweetAlert -->
  <script src="<?=base_url()?>components/assets/js/sweetalert2.js"></script> 
  <script src="<?=base_url()?>components/assets/js/sweetalert.min.js"></script> 

  <!-- select2 -->
  <script src="<?=base_url()?>components/assets/js/select2.min.js"></script>
  
  <script>
    $('.format_tanggal').datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
    $('.format_tanggal_2').datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
    $('.format_tanggal_3').datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
    $('.format_tanggal_4').datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
    $('.format_tanggal_5').datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
    $("#tgllahiredit_murid").datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
    $("#tgllahir_tambahmurid").datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
    $("#tglmasuk").datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
    $("#tglmasukujian").datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
    $("#datepayment").datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
    $(".datepayment2").datepicker({
      format: 'dd-mm-yyyy',
      dateFormat: 'dd-mm-yy',
      assumeNearbyYear: true
    });
  </script>

  <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>

</body>
</html>
