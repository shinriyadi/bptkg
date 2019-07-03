<script type="text/javascript">
function hapus(id) {
    bootbox.confirm("Apakah Anda Yakin Menghapus Data Ini?", function(result) {
        if(result) {
            window.location.href = "<?php echo site_url() . '/admin/gudang/delete' ?>/"+id;
        }
    }); 
}

function ubah(kode) {
    document.getElementById('editMhs').innerHTML = "";
    $.ajax({
        url: "<?php echo site_url() . '/admin/gudang/edit/'; ?>" + kode,
        success: function(msg) {
            $('#editMhs').html(msg);
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
        <b>GUDANG</b>
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
          </div>
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="editable-sample">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Gudang</th>
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
                        <td><?php echo $v['nama_gudang'] ?></td>
                        <td align="center">
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" href="#editModal" onclick="ubah('<?php echo $v['kode_gudang'] ?>')" >
                                <i class="icon-edit"></i>
                            </button>
                        </td>
                        <td align="center">
                            <button type="button" class="btn btn-danger btn-xs" onclick="hapus('<?php echo $v['kode_gudang'] ?>')">
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
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Tambah Gudang</h4>
      </div>
      <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/gudang/addProses' ?>">
          <div class="modal-body">
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" autofocus name="nama_gudang"type="text" placeholder="Nama Gudang" required />
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
          <h4 class="modal-title">Edit Gudang</h4>
      </div>
      <div id="editMhs">

      </div>
  </div>
</div>
</div>
<!-- modal -->

