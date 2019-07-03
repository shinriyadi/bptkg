<form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/pegawai/editProses' ?>">
          <div class="modal-body">
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" value="<?php echo $v['nip'] ?>" autofocus name="nip" type="text" placeholder="NIP" required />
                      <input type="hidden" name="kode" value="<?php echo $v['nip'] ?>">
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" value="<?php echo $v['nama'] ?>" type="text" name="nama" placeholder="Nama" required />
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                    <select class="form-control" name="jenis_kelamin" required>
                        <option 
                        <?php
                            if($v['jenis_kelamin']=='Laki-Laki') {
                                echo 'selected';
                            }
                        ?>
                        >Laki-Laki</option>
                        <option 
                        <?php
                            if($v['jenis_kelamin']=='Perempuan') {
                                echo 'selected';
                            }
                        ?>
                        >Perempuan</option>
                    </select>
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <!-- <textarea class="form-control" name="alamat" placeholder="Alamat" required />
                        <?php echo $v['alamat'] ?>
                      </textarea> -->
                      <textarea class="form-control" name="alamat" placeholder="Alamat" required><?php echo $v['alamat'] ?></textarea>
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" type="text" value="<?php echo $v['jabatan'] ?>" name="jabatan" placeholder="Jabatan" required />
                  </div>
              </div>
              <div class="form-group ">
                  <div class="col-lg-12">
                      <input class="form-control" type="text" value="<?php echo $v['telepon'] ?>" name="telepon" placeholder="Telepon" required />
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
              <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </form>