<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="col-lg-5">
        <section class="panel">
          <header class="panel-heading">
            <b>DATA PEMINJAMAN</b>
        </header>
        <div class="panel-body">
            <?php
            if ($msg != "") {
                echo $msg;
            }
            ?>
            <div class="adv-table editable-table ">
              <div class="clearfix">
              <div class="btn-group">
                    <a  href="<?php echo site_url() . '/admin/peminjaman/lsPegawai' ?>">
                        <button id="editable-sample_new" class="btn green" >
                        <i class="icon-backward"></i> Kembali 
                        </button>
                    </a>
                </div>
        </div>
        <div class="space15"></div>
        <br>
        <table class="table table-striped table-hover table-bordered" >
            <thead>
              <tr>
                <th>No</th>
                <th>No Invetaris</th>
                <th>Nama Barang</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (count($lsPinjam[0]) > 1) {
                    $i = 1;
                    $j = 0;
                foreach($lsPinjam as $vPinjam) {
            ?>
            <tr class="">
                <td><?php echo $i++ ?></td>
                <td>
                    <?php echo $vPinjam['no_inventaris'] ?>
                </td>
                <td>
                    <?php echo $vPinjam['nama_bmn'] ?>
                </td>
                <td>
                    <a href="<?php echo site_url() . '/admin/peminjaman/deleteBMN/'.$vPegawai['nip'].'/'.$j++ ?>">
                        <button type="button" class="btn btn-danger btn-xs">
                            <i class="icon-remove"></i>
                        </button>
                    </a>
                </td>
            </tr>
            <?php
                }
                }
            ?>
        </tbody>
    </table>
</div>
</div>
</section>
</div>

<div class="col-lg-7">
        <section class="panel">
          <header class="panel-heading">
            <b>PILIH BMN</b>
        </header>
        <div class="panel-body">
            <div class="adv-table editable-table ">

            <div class="clearfix">
                
            </div>
        <div class="space15"></div>
        <table class="table table-striped table-hover table-bordered" id="editable-sample">
            <thead>
              <tr>
                <th>No Invetaris</th>
                <th>Nama Barang</th>
                <th>Kondisi</th>
                <th>
                    
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($lsBMN as $vBMN) {
            ?>
            <tr class="">
                <td><?php echo $vBMN['no_inventaris'] ?></td>
                <td><?php echo $vBMN['nama_bmn'] ?></td>
                <td>
                    <label class="label 
                          <?php
                            if($vBMN['kondisi']=="Baik") {
                              echo 'label-success';
                            } elseif ($vBMN['kondisi']=="Rusak") {
                              echo 'label-warning';
                            } else {
                              echo 'label-danger';
                            }
                          ?>
                          ">
                             <?php echo $vBMN['kondisi'] ?> 
                    </label>
                </td>
                <td>
                    <a href="<?php echo site_url() . '/admin/peminjaman/addBMN/'.$vPegawai['nip'].'/'.$vBMN['no_inventaris'] ?>">
                        <button type="button" class="btn btn-primary btn-xs">
                            <i class="icon-plus"></i>
                        </button>
                    </a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
</div>
</section>
</div>
<a  href="<?php echo site_url() . '/admin/peminjaman/add2/'.$vPegawai['nip'] ?>" class="pull-right btn btn-primary
    <?php
        if (!isset($_SESSION['barang']) || $_SESSION['barang'] == "") {
            echo 'disabled';
        }
     ?>
">
    Lanjutkan <i class="icon-forward"></i>
</a>
<!-- page end-->
</section>
</section>
<!--main content end-->