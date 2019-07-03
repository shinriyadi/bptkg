<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="col-lg-6">
        <section class="panel">
          <header class="panel-heading">
            <b>BMN YANG DIPINJAM</b>
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
                    <a  href="<?php echo site_url() . '/admin/peminjaman/add/'.$vPegawai['nip'] ?>">
                        <button id="editable-sample_new" class="btn green" >
                        <i class="icon-backward"></i> Kembali 
                        </button>
                    </a>
                </div>
        </div>
        <div class="space15"></div>
        <br>
        <table class="table">
            <tr>
                <td><b>NIP</b></td>
                <td><b>:</b></td>
                <td><?php echo $vPegawai['nip'] ?></td>
            </tr>
            <tr>
                <td><b>Nama</b></td>
                <td><b>:</b></td>
                <td><?php echo $vPegawai['nama'] ?></td>
            </tr>
            <tr>
                <td><b>Jabatan</b></td>
                <td><b>:</b></td>
                <td><?php echo $vPegawai['jabatan'] ?></td>
            </tr>
            <tr>
                <td colspan="3"></td>
            </tr>
        </table>
        <br>
        <table class="table table-striped table-hover table-bordered" >
            <thead>
              <tr>
                <th>No</th>
                <th>No Invetaris</th>
                <th>Nama Barang</th>
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

<div class="col-lg-6">
        <section class="panel">
          <header class="panel-heading">
            <b>DATA PEMINJAMAN BMN</b>
        </header>
        <div class="panel-body">
            <div class="adv-table editable-table ">

            <div class="clearfix">
                
            </div>
        <div class="space15"></div>
        <form method="POST" action="<?php echo site_url() . '/admin/peminjaman/addProses' ?>">
            <div class="form-group ">
                <div class="col-lg-12">
                    <input type="hidden" name="nip" value="<?php echo $vPegawai['nip'] ?>">
                    <input class="form-control" name="no_dokumen" type="text"  placeholder="No Dokumen" required />
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-12" >
                    <textarea class="form-control" name="keperluan" placeholder="Keperluan"  required></textarea>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-12">
                    <input class="form-control" name="tgl_pinjam" readonly value="<?php echo date('Y-m-d') ?>" type="hidden"  placeholder="Tanggal Pinjam" required />
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-12 input-append date" >
                    <input class="form-control" name="tgl_kembali" id="tgl" readonly type="text"  data-date-format="yyyy-mm-dd"  placeholder="Tanggal Kembali" required />
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-12">
                    <button class="btn btn-primary pull-right" type="submit">Simpan</button>
                </div>
            </div>
        </form>
            
</div>
</div>
</section>
</div>
<!-- page end-->
</section>
</section>
<!--main content end-->