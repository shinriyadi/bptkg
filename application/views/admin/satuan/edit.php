<form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/satuan/editProses' ?>">
  <div class="modal-body">
      <div class="form-group ">
          <div class="col-lg-12">
            <input class="form-control" value="<?php echo $v['nama_satuan'] ?>" autofocus name="nama_satuan"type="text" placeholder="Nama Satuan" required />
            <input type="hidden" name="kode" value="<?php echo $v['kode_satuan'] ?>">
          </div>
      </div>
  </div>
  <div class="modal-footer">
      <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
      <button class="btn btn-primary" type="submit">Simpan</button>
  </div>
</form>