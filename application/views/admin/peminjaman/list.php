<script type="text/javascript">
function hapus(id) {
    bootbox.confirm("Apakah Anda Yakin Menghapus Data Ini?", function(result) {
        if(result) {
            window.location.href = "<?php echo site_url() . '/admin/peminjaman/delete' ?>/"+id;
        }
    }); 
}

function detail(kode) {
    document.getElementById('detailMhs').innerHTML = "";
    $.ajax({
        url: "<?php echo site_url() . '/admin/peminjaman/detail/'; ?>" + kode,
        success: function(msg) {
            $('#detailMhs').html(msg);
        },
        dataType: "html"
    });
}
function detail_pegawai(kode) {
    document.getElementById('detailPgw').innerHTML = "";
    $.ajax({
        url: "<?php echo site_url() . '/admin/pegawai/detail/'; ?>" + kode,
        success: function(msg) {
            $('#detailPgw').html(msg);
        },
        dataType: "html"
    });
}
</script>
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <section class="panel">
      <header class="panel-heading">
        <b>PEMINJAMAN</b>
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
                    Tambah <i class="icon-plus"></i>
                </button>
              </a>
            </div>
          </div>
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="editable-sample">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>No Dokumen</th>
                <th>Tanggal Pinjam</th>
                <th>Jumlah</th>
                <th>Data Peminjam</th>
                <th>Status</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach ($ls as $v) {
                ?>
                    <tr class="">
                        <td><?php echo $i++ ?></td>
                        <td><?php echo "BPPTKG-PJM-BMN-00".$v['kode_peminjaman'] ?></td>
                        <td><?php echo $v['no_dokumen'] ?></td>
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
                        <td><?php echo $v['jml'] ?></td>
                        <td>
                          <a data-toggle="modal" href="#detailPegawai" onclick="detail_pegawai('<?php echo $v['nip'] ?>')">
                            <?php echo $v['nama'] ?>
                          </a>
                        </td>
                        <td><label class="label label-primary"><?php echo $v['jenis'] ?></label></td>
                        <td align="center">
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" href="#detailModal" onclick="detail('<?php echo $v['kode_peminjaman'] ?>')" >
                                <i class="icon-zoom-in"></i>
                            </button>
                        </td>
                        <td align="center">
                            <button type="button" class="btn btn-danger btn-xs" onclick="hapus('<?php echo $v['kode_peminjaman'] ?>')">
                                <i class="icon-remove"></i>
                            </button>
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
    <!-- page end-->
  </section>
</section>
<!--main content end-->


<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Detail Peminjaman</h4>
      </div>
      <div id="detailMhs">

      </div>
  </div>
</div>
</div>
<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="detailPegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Detail Pegawai</h4>
      </div>
      <div id="detailPgw">

      </div>
  </div>
</div>
</div>
<!-- modal -->