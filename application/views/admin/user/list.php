<script type="text/javascript">
function hapus(id) {
    bootbox.confirm("Apakah Anda Yakin Menghapus Data Ini?", function(result) {
        if(result) {
            window.location.href = "<?php echo site_url() . '/admin/user/delete' ?>/"+id;
        }
    }); 
}

</script>
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <section class="panel">
      <header class="panel-heading">
        <b>USER</b>
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
                <th>Nama User</th>
                <th>Role</th>
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
                        <td><?php echo $v['username'] ?></td>
                        <td><?php echo $v['role'] ?></td>
                        <td align="center">
                            <button type="button" class="btn btn-danger btn-xs" onclick="hapus('<?php echo $v['kode_user'] ?>')">
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
          <h4 class="modal-title">Tambah User</h4>
      </div>
      <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/user/addProses' ?>">
          <div class="modal-body">
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" autofocus name="username"type="text" placeholder="Username" required />
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" name="password"type="password" placeholder="Password" required />
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <select class="form-control" name="role" required />
                        <option value="">-Pilih Role-</option>
                        <option value="Kepala Gudang">Kepala Gudang</option>
                        <option value="Pengelola Gudang">Pengelola Gudang</option>
                      </select>
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
          <h4 class="modal-title">Edit Satuan</h4>
      </div>
      <div id="editMhs">

      </div>
  </div>
</div>
</div>
<!-- modal -->

