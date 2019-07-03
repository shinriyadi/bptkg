<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <section class="panel">
      <header class="panel-heading">
        <b>PILIH PEGAWAI</b>
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
                <a  href="<?php echo site_url() . '/admin/peminjaman' ?>">
                    <button id="editable-sample_new" class="btn green" >
                        <i class="icon-backward"></i> Kembali 
                    </button>
              </a>
            </div>
          </div>
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="editable-sample">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Telepon</th>
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
                        <td><?php echo $v['nama'] ?></td>
                        <td><?php echo $v['nip'] ?></td>
                        <td><?php echo $v['jabatan'] ?></td>
                        <td><?php echo $v['telepon'] ?></td>
                        <td align="center">
                          <a href="<?php echo site_url() . '/admin/peminjaman/add/'.$v['nip'] ?>">
                            <button type="button" class="btn btn-success btn-xs">
                                PILIH
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
          <h4 class="modal-title">Tambah Satuan</h4>
      </div>
      <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/satuan/addProses' ?>">
          <div class="modal-body">
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" autofocus name="nama_satuan"type="text" placeholder="Nama Satuan" required />
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

