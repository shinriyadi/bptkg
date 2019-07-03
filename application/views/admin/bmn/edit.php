<form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo site_url() . '/admin/bmn/editProses' ?>" enctype="multipart/form-data">
  <div class="modal-body">
   <div class="form-group ">
    <div class="col-lg-12">
      <input class="form-control" autofocus name="no_inventaris"type="text" value="<?php echo $v['no_inventaris'] ?>" placeholder="No Inventaris" required />
      <input type="hidden" name="kode" value="<?php echo $v['no_inventaris'] ?>">
      </div>
  </div>
  <div class="form-group ">
    <div class="col-lg-12">
      <input class="form-control" name="nama_bmn"type="text" value="<?php echo $v['nama_bmn'] ?>" placeholder="Nama BMN" required />
    </div>
  </div>
  <div class="form-group ">
    <div class="col-lg-12">
      <input class="form-control" name="asal" type="text" value="<?php echo $v['asal_perolehan_bmn'] ?>" placeholder="Asal Perolehan BMN" required />
    </div>
  </div>
  <div class="form-group ">
    <div class="col-lg-12">
      <select name="kondisi" required class="form-control">
        <option value="Baik"
        <?php
          if($v['kondisi']=="Baik") {
            echo 'selected';
          }
        ?>
        >Baik</option>
        <option value="Rusak"
        <?php
          if($v['kondisi']=="Rusak") {
            echo 'selected';
          }
        ?>
        >Rusak</option>
        <option value="Hilang"
        <?php
          if($v['kondisi']=="Hilang") {
            echo 'selected';
          }
        ?>
        >Hilang</option>
      </select>
    </div>
  </div>
  <div class="form-group ">
    <div class="col-lg-12">
      <select name="satuan" required class="form-control">
        <?php
        foreach($lsSatuan as $vSatuan) {
          ?>
          <option value="<?php echo $vSatuan['kode_satuan'] ?>"
          <?php
            if($vSatuan['kode_satuan']==$v['kode_satuan']) {
              echo 'selected';
            }
          ?>
          >
            <?php echo $vSatuan['nama_satuan'] ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group ">
    <div class="col-lg-12">
      <select name="gudang" required class="form-control">
        <?php
        foreach($lsGudang as $vGudang) {
          ?>
          <option value="<?php echo $vGudang['kode_gudang'] ?>"
            <?php
            if($vGudang['kode_gudang']==$v['kode_gudang']) {
              echo 'selected';
            }
          ?>
          >
            <?php echo $vGudang['nama_gudang'] ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group ">
    <div class="col-lg-12">
      <img src="<?php echo base_url() . 'upload/bmn/'.$v['foto'] ?>" width="180px">
    </div>
  </div>
  <div class="form-group ">
    <div class="col-lg-2">
      <label class="label label-primary"><b>Foto BMN</b></label>
    </div>
    <div class="col-lg-10">
      <input type="file" name="foto" class="form-control" >
      <input type="hidden" name="foto_asli" value="<?php echo $v['foto'] ?>">
    </div>
  </div>
</div>
<div class="modal-footer">
  <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
  <button class="btn btn-primary" type="submit">Simpan</button>
</div>
</form>