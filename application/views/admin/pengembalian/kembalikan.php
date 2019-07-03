<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="col-lg-6">
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
                    <a  href="<?php echo site_url() . '/admin/pengembalian' ?>">
                        <button id="editable-sample_new" class="btn green" >
                        <i class="icon-backward"></i> Batal 
                        </button>
                    </a>
                </div>
        </div>
        <div class="space15"></div>
        <br>
        <form method="POST" action="<?php echo site_url() . '/admin/pengembalian/editStatus' ?>">
        <table class="table">
            <tr>
                <td><b>NIP</b></td>
                <td><b>:</b></td>
                <td><?php echo $v['nip'] ?></td>
                <input type="hidden" name="kode" value="<?php echo $v['kode_peminjaman'] ?>">
            </tr>
            <tr>
                <td><b>Nama</b></td>
                <td><b>:</b></td>
                <td><?php echo $v['nama'] ?></td>
            </tr>
            <tr>
                <td><b>Telepon</b></td>
                <td><b>:</b></td>
                <td><?php echo $v['telepon'] ?></td>
            </tr>
            <tr>
                <td><b>Jabatan</b></td>
                <td><b>:</b></td>
                <td><?php echo $v['jabatan'] ?></td>
            </tr>
            <tr>
                <td><b>Kode Peminjaman</b></td>
                <td><b>:</b></td>
                <td><?php echo "BPPTKG-PJM-BMN-00".$v['kode_peminjaman'] ?></td>
            </tr>
            <tr>
                <td><b>No Dokumen</b></td>
                <td><b>:</b></td>
                <td><?php echo $v['no_dokumen'] ?></td>
            </tr>
            <tr>
                      <td><b>Tgl Peminjaman</b></td>
                      <td>:</td>
                      <td>
                        <?php
                          $bulan_angka = date('m', strtotime($v['tgl_pinjam']));
                          if ($bulan_angka == '01') {
                            $bulan = 'Januari';
                          } elseif ($bulan_angka == '02') {
                            $bulan = 'Februari';
                          } elseif ($bulan_angka == '03') {
                            $bulan = 'Maret';
                          } elseif ($bulan_angka == '04') {
                            $bulan = 'April';
                          } elseif ($bulan_angka == '05') {
                            $bulan = 'Mei';
                          } elseif ($bulan_angka == '06') {
                            $bulan = 'Juni';
                          } elseif ($bulan_angka == '07') {
                            $bulan = 'Juli';
                          } elseif ($bulan_angka == '08') {
                            $bulan = 'Agustus';
                          } elseif ($bulan_angka == '09') {
                            $bulan = 'September';
                          } elseif ($bulan_angka == '10') {
                            $bulan = 'Oktober';
                          } elseif ($bulan_angka == '11') {
                            $bulan = 'November';
                          } elseif ($bulan_angka == '12') {
                            $bulan = 'Desember';
                          }
                          echo date('d ', strtotime($v['tgl_pinjam'])) . $bulan . date(' Y', strtotime($v['tgl_pinjam']));
                          ?>
                      </td>
                  </tr>
                  <tr>
                      <td><b>Tgl Pengembalian</b></td>
                      <td>:</td>
                      <td>
                        <?php
                          $bulan_angka = date('m', strtotime($v['tgl_kembali']));
                          if ($bulan_angka == '01') {
                            $bulan = 'Januari';
                          } elseif ($bulan_angka == '02') {
                            $bulan = 'Februari';
                          } elseif ($bulan_angka == '03') {
                            $bulan = 'Maret';
                          } elseif ($bulan_angka == '04') {
                            $bulan = 'April';
                          } elseif ($bulan_angka == '05') {
                            $bulan = 'Mei';
                          } elseif ($bulan_angka == '06') {
                            $bulan = 'Juni';
                          } elseif ($bulan_angka == '07') {
                            $bulan = 'Juli';
                          } elseif ($bulan_angka == '08') {
                            $bulan = 'Agustus';
                          } elseif ($bulan_angka == '09') {
                            $bulan = 'September';
                          } elseif ($bulan_angka == '10') {
                            $bulan = 'Oktober';
                          } elseif ($bulan_angka == '11') {
                            $bulan = 'November';
                          } elseif ($bulan_angka == '12') {
                            $bulan = 'Desember';
                          }
                          echo date('d ', strtotime($v['tgl_kembali'])) . $bulan . date(' Y', strtotime($v['tgl_kembali']));
                          ?>
                      </td>
                  </tr>
            <tr>
                <td><b>Aksi</b></td>
                <td>:</td>
                <td>
                    <select class="form-control" name="jenis" required>
                        <option value=""></option>
                        <option value="Dikembalikan">Dikembalikan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    <button class="btn btn-primary" >
                        Simpan
                    </button>
                </td>
            </tr>
        </table>
        </form>
        
        
</div>
</div>
</section>
</div>

<div class="col-lg-6">
        <section class="panel">
          <header class="panel-heading">
            <b>BMN YANG DIPINJAM</b>
        </header>
        <div class="panel-body">
            <div class="adv-table editable-table ">

            <div class="clearfix">
                
            </div>
        <div class="space15"></div>
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
<!-- page end-->
</section>
</section>
<!--main content end-->