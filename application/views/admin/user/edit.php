<form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" 
  action="<?php echo site_url() . '/admin/user/editProses' ?>">
  
  <div class="modal-body">
      <div class="form-group ">
          <div class="col-lg-12">
            <input class="form-control" value="<?php echo $vUser['username'] ?>" autofocus name="username" 
                type="text" placeholder="Username" required readonly />
            <input type="hidden" name="kode_user" value="<?php echo $vUser['kode_user'] ?>">
          </div>
      </div>
      <div class="form-group ">
          <div class="col-lg-12">
            <input class="form-control" value="<?php echo $vUser['password'] ?>" autofocus name="password_lama_benar" 
                type="hidden" placeholder="Masukkan Password Lama" required />

            <input class="form-control"  autofocus name="password_lama" 
                type="password" placeholder="Masukkan Password Lama" required />
          </div>
      </div>
      <div class="form-group ">
          <div class="col-lg-12">
            <input class="form-control" autofocus name="password_baru1" 
                type="password" placeholder="Masukkan Password Baru" required />
          </div>
      </div>
      <div class="form-group ">
          <div class="col-lg-12">
            <input class="form-control" autofocus name="password_baru2" 
                type="password" placeholder="Ulangi Password Baru" required />
          </div>
      </div>
  </div>
  <div class="modal-footer">
      <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
      <button class="btn btn-primary" type="submit">Simpan</button>
  </div>
</form>