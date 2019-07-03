<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SI BPPTKG</title>
        <!-- Bootstrap core CSS -->
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>/themes/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/themes/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url(); ?>/themes/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/themes/assets/data-tables/DT_bootstrap.css" />
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>/themes/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/themes/css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>/themes/css/datepicker.css" rel="stylesheet" />
        <script type="text/javascript">
          function rubah(kode) {
            document.getElementById('editUser').innerHTML = "";
            $.ajax({
              url: "<?php echo site_url() . '/admin/user/edit/' ?>" + kode,
              success: function(msg) {
                $('#editUser').html(msg);
              },
              dataType: "html"
            });
          }
        </script>
    </head>
    <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="<?php echo base_url() ?>" class="logo" ><span>SISTEM INFORMASI PENGGUNAAN BARANG MILIK NEGARA</span></a>
          <!--logo end-->
          
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">                          
                          <img alt="" src="<?php echo base_url() ?>themes/img/avatar1_small.jpg">
                          <span class="username"><?php echo $vUser['username'] ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <li>
                            <a data-toggle="modal" href="#modalUser" onclick="rubah('<?php echo $vUser['kode_user'] ?>')" >
                              <i class="icon-user"></i> 
                                Edit User
                            </a>
                          </li>

                          <li><a href="<?php echo site_url() . '/login/logout' ?>"><i class="icon-off"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <?php
              if(isset($_SESSION['kepala'])) {
              ?>
              <ul class="sidebar-menu" id="nav-accordion">

                  <li>
                      <a href="<?php echo site_url(). '/admin/home' ?>" 
                      <?php
                        if($url=='home') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-home"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url(). '/admin/pegawai' ?>"
                        <?php
                        if($url=='pegawai') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-male"></i>
                          <span>Pegawai</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url(). '/admin/bmn' ?>"
                        <?php
                        if($url=='bmn') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-suitcase"></i>
                          <span>Barang Milik Negara</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url(). '/admin/peminjaman' ?>"
                        <?php
                        if($url=='peminjaman') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-calendar"></i>
                          <span>Peminjaman BMN</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url(). '/admin/pengembalian' ?>"
                        <?php
                        if($url=='pengembalian') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-mail-reply"></i>
                          <span>Pengembalian BMN</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url(). '/admin/satuan' ?>"
                        <?php
                        if($url=='satuan') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-tag"></i>
                          <span>Master Satuan</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url(). '/admin/gudang' ?>"
                        <?php
                        if($url=='gudang') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-folder-open"></i>
                          <span>Master Gudang</span>
                      </a>
                  </li>
                  <!-- <li>
                      <a href="<?php echo site_url(). '/admin/lokasi' ?>"
                        <?php
                        if($url=='lokasi') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-map-marker"></i>
                          <span>Master Lokasi</span>
                      </a>
                  </li> -->
                  <li>
                      <a href="<?php echo site_url(). '/admin/user' ?>"
                        <?php
                        if($url=='user') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-user"></i>
                          <span>Master User</span>
                      </a>
                  </li>
              </ul>
              <?php
                }
              ?>


              <?php
              if(isset($_SESSION['pengelola'])) {
              ?>
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="<?php echo site_url(). '/admin/home' ?>" 
                      <?php
                        if($url=='home') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-home"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url(). '/admin/bmn' ?>"
                        <?php
                        if($url=='bmn') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-suitcase"></i>
                          <span>Barang Milik Negara</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url(). '/admin/peminjaman' ?>"
                        <?php
                        if($url=='peminjaman') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-calendar"></i>
                          <span>Peminjaman BMN</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url(). '/admin/pengembalian' ?>"
                        <?php
                        if($url=='pengembalian') {
                          echo 'class="active"';
                        }
                      ?>
                      >
                          <i class="icon-mail-reply"></i>
                          <span>Pengembalian BMN</span>
                      </a>
                  </li>
              </ul>
              <?php
                }
              ?>

          </div>
      </aside>
      <!--sidebar end-->

      <!-- Modal -->
      <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit User</h4>
            </div>
            <div id="editUser">

            </div>
        </div>
      </div>
      </div>
<!-- modal -->
      