<form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/gudang/editProses' ?>">
  <div class="modal-body">
      <div class="form-group ">
          <div class="col-lg-12">
            <input class="form-control" value="<?php echo $v['nama_gudang'] ?>" autofocus name="nama_gudang"type="text" placeholder="Nama gudang" required />
            <input type="hidden" name="kode" value="<?php echo $v['kode_gudang'] ?>">
          </div>
      </div>
  </div>
  <div class="modal-footer">
      <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
      <button class="btn btn-primary" type="submit">Simpan</button>
  </div>
</form>