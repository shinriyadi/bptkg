<form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/pegawai/editProses' ?>">
          <div class="modal-body">
              <table class="table">
                  <tr>
                      <td>No Inventaris</td>
                      <td>:</td>
                      <td><?php echo $v['no_inventaris']; ?></td>
                  </tr>  
                  <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><?php echo $v['nama_bmn']; ?></td>
                  </tr>
                  <tr>
                      <td>Asal Perolehan</td>
                      <td>:</td>
                      <td><?php echo $v['asal_perolehan_bmn']; ?></td>
                  </tr>
                  <tr>
                      <td>Kondisi</td>
                      <td>:</td>
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
                  </tr>
                  <tr>
                      <td>Satuan</td>
                      <td>:</td>
                      <td><?php echo $v['nama_satuan']; ?></td>
                  </tr>
                  <tr>
                      <td>Gudang</td>
                      <td>:</td>
                      <td><?php echo $v['nama_gudang']; ?></td>
                  </tr>
                  <tr>
                      <td>Foto</td>
                      <td>:</td>
                      <td>
                        <img src="<?php echo base_url() . 'upload/bmn/'.$v['foto'] ?>" width="180px">
                      </td>
                  </tr>
              </table>
          </div>
          <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
                <!-- <a href="<?php echo site_url() . '/admin/pegawai/cetakDetail/'.$v['nip'] ?>" target="blank">
                    <button data-dismiss="modal" class="btn btn-primary" type="button">Cetak</button>
                </a> -->
          </div>
      </form>