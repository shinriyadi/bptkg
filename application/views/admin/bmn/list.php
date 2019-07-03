<script type="text/javascript">
function hapus(id) {
    bootbox.confirm("Apakah Anda Yakin Menghapus Data Ini?", function(result) {
        if(result) {
            window.location.href = "<?php echo site_url() . '/admin/bmn/delete' ?>/"+id;
        }
    }); 
}

function ubah(kode) {
    document.getElementById('editMhs').innerHTML = "";
    $.ajax({
        url: "<?php echo site_url() . '/admin/bmn/edit/'; ?>" + kode,
        success: function(msg) {
            $('#editMhs').html(msg);
        },
        dataType: "html"
    });
}
function detail(kode) {
    document.getElementById('detailMhs').innerHTML = "";
    $.ajax({
        url: "<?php echo site_url() . '/admin/bmn/detail/'; ?>" + kode,
        success: function(msg) {
            $('#detailMhs').html(msg);
        },
        dataType: "html"
    });
}
function detail(kode) {
    document.getElementById('detailMhs').innerHTML = "";
    $.ajax({
        url: "<?php echo site_url() . '/admin/bmn/detail/'; ?>" + kode,
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
        <b>BARANG MILIK NEGARA</b>
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
                  <a href="<?php echo site_url() . '/admin/bmn/cetak' ?>" target="blank">Cetak</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="editable-sample">
            <thead>
              <tr>
                <th>No</th>
                <th>No Inventaris</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Kondisi</th>
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
                        <td><?php echo $v['no_inventaris'] ?></td>
                        <td><?php echo $v['nama_bmn'] ?></td>
                        <td><?php echo $v['nama_satuan'] ?></td>
                        <td>
                          <label class="label 
                          <?php
                            if($v['kondisi']=="Baik") {
                              echo 'label-success';
                            } elseif ($v['kondisi']=="Rusak") {
                              echo 'label-warning';
                            } else {
                              echo 'label-danger';
                            }
                          ?>
                          ">
                             <?php echo $v['kondisi'] ?> 
                          </label>
                        </td>
                        <!-- <td align="center">
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" href="#detailModal" onclick="detail('<?php echo $v['no_inventaris'] ?>')">
                                <i class="icon-eye-open"></i>
                            </button>
                        </td> -->
                        <td align="center">
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" href="#editModal" onclick="ubah('<?php echo $v['no_inventaris'] ?>')" >
                                <i class="icon-edit"></i>
                            </button>
                        </td>
                        <td align="center">
                            <button type="button" class="btn btn-danger btn-xs" onclick="hapus('<?php echo $v['no_inventaris'] ?>')">
                                <i class="icon-remove"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" href="#detailModal" onclick="detail('<?php echo $v['no_inventaris'] ?>')" >
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
          <h4 class="modal-title">Tambah BMN</h4>
      </div>
      <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/bmn/addProses' ?>" enctype="multipart/form-data">
          <div class="modal-body">
             <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" autofocus name="no_inventaris"type="text" placeholder="No Inventaris" required />
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" name="nama_bmn"type="text" placeholder="Nama BMN" required />
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" name="asal" type="text" placeholder="Asal Perolehan BMN" required />
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <select name="kondisi" required class="form-control">
                        <option value="">-Pilih Kondisi</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Hilang">Hilang</option>
                      </select>
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <select name="satuan" required class="form-control">
                        <option value="">-Pilih Satuan</option>
                        <?php
                            foreach($lsSatuan as $vSatuan) {
                        ?>
                            <option value="<?php echo $vSatuan['kode_satuan'] ?>">
                                <?php echo $vSatuan['nama_satuan'] ?>
                            </option>
                        <?php
                            }
                        ?>
                      </select>
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <select name="gudang" required class="form-control">
                        <option value="">-Pilih Gudang</option>
                        <?php
                            foreach($lsGudang as $vGudang) {
                        ?>
                            <option value="<?php echo $vGudang['kode_gudang'] ?>">
                                <?php echo $vGudang['nama_gudang'] ?>
                            </option>
                        <?php
                            }
                        ?>
                      </select>
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-2">
                      <label class="label label-primary"><b>Foto BMN</b></label>
                  </div>
                  <div class="col-lg-10">
                      <input type="file" name="foto" class="form-control" required>
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
          <h4 class="modal-title">Edit BMN</h4>
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
          <h4 class="modal-title">Detail BMN</h4>
      </div>
      <div id="detailMhs">

      </div>
  </div>
</div>
</div>
<!-- modal -->

