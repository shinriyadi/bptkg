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
                      <td>Telepon</td>
                      <td>:</td>
                      <td><?php echo $v['telepon']; ?></td>
                  </tr>
                  <tr>
                      <td>Kode Peminjaman</td>
                      <td>:</td>
                      <td><?php echo "BPPTKG-PJM-BMN-00".$v['kode_peminjaman'] ?></td>
                  </tr>
                  <tr>
                      <td>No Dokumen</td>
                      <td>:</td>
                      <td><?php echo $v['no_dokumen'] ?></td>
                  </tr>
                  <tr>
                      <td>Tanggal Peminjaman</td>
                      <td>:</td>
                      <td>
                        <?php
                          $bulan_angka = date('m', strtotime($v['tgl_pinjam']));
                          if ($bulan_angka == '01') {
                            $bulan = 'Januari';
                          } elseif ($bulan_angka == '02') {
                            $bulan = 'Februari';
                          } elseif ($bulan_angka == '03') {
                            $bulan = 'Maret';
                          } elseif ($bulan_angka == '04') {
                            $bulan = 'April';
                          } elseif ($bulan_angka == '05') {
                            $bulan = 'Mei';
                          } elseif ($bulan_angka == '06') {
                            $bulan = 'Juni';
                          } elseif ($bulan_angka == '07') {
                            $bulan = 'Juli';
                          } elseif ($bulan_angka == '08') {
                            $bulan = 'Agustus';
                          } elseif ($bulan_angka == '09') {
                            $bulan = 'September';
                          } elseif ($bulan_angka == '10') {
                            $bulan = 'Oktober';
                          } elseif ($bulan_angka == '11') {
                            $bulan = 'November';
                          } elseif ($bulan_angka == '12') {
                            $bulan = 'Desember';
                          }
                          echo date('d ', strtotime($v['tgl_pinjam'])) . $bulan . date(' Y', strtotime($v['tgl_pinjam']));
                          ?>
                      </td>
                  </tr>
                  <tr>
                      <td>Tanggal Pengembalian</td>
                      <td>:</td>
                      <td>
                        <?php
                          $bulan_angka = date('m', strtotime($v['tgl_kembali']));
                          if ($bulan_angka == '01') {
                            $bulan = 'Januari';
                          } elseif ($bulan_angka == '02') {
                            $bulan = 'Februari';
                          } elseif ($bulan_angka == '03') {
                            $bulan = 'Maret';
                          } elseif ($bulan_angka == '04') {
                            $bulan = 'April';
                          } elseif ($bulan_angka == '05') {
                            $bulan = 'Mei';
                          } elseif ($bulan_angka == '06') {
                            $bulan = 'Juni';
                          } elseif ($bulan_angka == '07') {
                            $bulan = 'Juli';
                          } elseif ($bulan_angka == '08') {
                            $bulan = 'Agustus';
                          } elseif ($bulan_angka == '09') {
                            $bulan = 'September';
                          } elseif ($bulan_angka == '10') {
                            $bulan = 'Oktober';
                          } elseif ($bulan_angka == '11') {
                            $bulan = 'November';
                          } elseif ($bulan_angka == '12') {
                            $bulan = 'Desember';
                          }
                          echo date('d ', strtotime($v['tgl_kembali'])) . $bulan . date(' Y', strtotime($v['tgl_kembali']));
                          ?>
                      </td>
                  </tr>
              </table>
              <h5 align="center"><b>Peminjaman BMN</b></h5>
              <table class="table table-striped table-hover table-bordered" >
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Invetaris</th>
                    <th>Nama Barang</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach($lsPinjam as $vPinjam) {
                    ?>
                    <tr class="">
                      <td><?php echo $i++ ?></td>
                      <td>
                        <?php echo $vPinjam['no_inventaris'] ?>
                      </td>
                      <td>
                        <?php echo $vPinjam['nama_bmn'] ?>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
          </div>
          <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
                <a href="<?php echo site_url() . '/admin/peminjaman/cetak/'.$v['kode_peminjaman'] ?>" target="blank">
                    <button class="btn btn-primary" type="button">Cetak</button>
                    <!-- Cetak -->
                </a>
          </div>
      </form>