<script type="text/javascript">
function hapus(id) {
    bootbox.confirm("Apakah Anda Yakin Menghapus Data Ini?", function(result) {
        if(result) {
            window.location.href = "<?php echo site_url() . '/admin/pegawai/delete' ?>/"+id;
        }
    }); 
}

function ubah(kode) {
    document.getElementById('editMhs').innerHTML = "";
    $.ajax({
        url: "<?php echo site_url() . '/admin/pegawai/edit/'; ?>" + kode,
        success: function(msg) {
            $('#editMhs').html(msg);
        },
        dataType: "html"
    });
}

function detail(kode) {
    document.getElementById('detailMhs').innerHTML = "";
    $.ajax({
        url: "<?php echo site_url() . '/admin/pegawai/detail/'; ?>" + kode,
        success: function(msg) {
            $('#detailMhs').html(msg);
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
        <b>PEGAWAI</b>
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
                <button id="editable-sample_new" class="btn green" data-toggle="modal" href="#tambahModal">
                    Tambah <i class="icon-plus"></i>
                </button>
            </div>
             <div class="btn-group pull-right">
              <button class="btn dropdown-toggle" data-toggle="dropdown">
                Tools <i class="icon-angle-down"></i>
              </button>
              <ul class="dropdown-menu pull-right">
                <li>
                  <a href="<?php echo site_url() . '/admin/pegawai/cetak' ?>" target="blank">Cetak</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="editable-sample">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Jabatan</th>
                <th></th>
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
                        <td><?php echo $v['nip'] ?></td>
                        <td><?php echo $v['nama'] ?></td>
                        <td><?php echo $v['jenis_kelamin'] ?></td>
                        <td><?php echo $v['telepon'] ?></td>
                        <td><?php echo $v['jabatan'] ?></td>
                        <td align="center">
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" href="#editModal" onclick="ubah('<?php echo $v['nip'] ?>')" >
                                <i class="icon-edit"></i>
                            </button>
                        </td>
                        <td align="center">
                            <button type="button" class="btn btn-danger btn-xs" onclick="hapus('<?php echo $v['nip'] ?>')">
                                <i class="icon-remove"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" href="#detailModal" onclick="detail('<?php echo $v['nip'] ?>')" >
                                <i class="icon-zoom-in"></i>
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
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Tambah Pegawai</h4>
      </div>
      <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/pegawai/addProses' ?>">
          <div class="modal-body">
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" autofocus name="nip"type="text" placeholder="NIP" required />
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" type="text" name="nama" placeholder="Nama" required />
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                    <select class="form-control" type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" required />
                        <option>-Pilih Jenis Kelamin-</option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <textarea class="form-control" type="text" name="alamat" placeholder="Alamat" required /></textarea>
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" type="text" name="jabatan" placeholder="Jabatan" required />
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" type="text" name="telepon" placeholder="Telepon" required />
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
              <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </form>
  </div>
</div>
</div>
<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Pegawai</h4>
      </div>
      <div id="editMhs">

      </div>
  </div>
</div>
</div>
<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Detail Pegawai</h4>
      </div>
      <div id="detailMhs">

      </div>
  </div>
</div>
</div>
<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Import Excel</h4>
      </div>
      <div id="detailMhs">

      </div>
  </div>
</div>
</div>
<!-- modal -->