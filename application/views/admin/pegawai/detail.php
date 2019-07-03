<form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/pegawai/editProses' ?>">
          <div class="modal-body">
              <table class="table">
                  <tr>
                      <td>NIP</td>
                      <td>:</td>
                      <td><?php echo $v['nip']; ?></td>
                  </tr>  
                  <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><?php echo $v['nama']; ?></td>
                  </tr>
                  <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td><?php echo $v['jenis_kelamin']; ?></td>
                  </tr>
                  <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><?php echo $v['alamat']; ?></td>
                  </tr>
                  <tr>
                      <td>Jabatan</td>
                      <td>:</td>
                      <td><?php echo $v['jabatan']; ?></td>
                  </tr>
                  <tr>
                      <td>Telepon</td>
                      <td>:</td>
                      <td><?php echo $v['telepon']; ?></td>
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