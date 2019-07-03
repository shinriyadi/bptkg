<html>
    <head>
        <link href="<?php echo base_url(); ?>themes/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>themes/css/style.css" rel="stylesheet">
    </head>
    <body>
        <table class="table">
            <tr>
                <th>UAPB</th>
                <th>:</th>
                <th>KEMENTERIAN ENERGI DAN SUMBER DAYA MINERAL</th>
            </tr>
            <tr>
                <th>UAPPB-E1</th>
                <th>:</th>
                <th>BADAN GEOLOGI</th>
            </tr>
            <tr>
                <th>UAPPB-W</th>
                <th>:</th>
                <th>PROP.D.I. YOGYAKARTA</th>
            </tr>
            <tr>
                <th>UAPKPB</th>
                <th>:</th>
                <th>Balai Penyelidikan dan Pengembangan Teknologi Kebencanaan Geologi</th>
            </tr>
        </table>
        <h4 align="center"><b>DETAIL PEGAWAI</b></h4>
        <br>
        <table class="table tabs">
            <tr>
                <td width="20%"><label for="no_ktp" class="col-lg-12 control-label">NIP</label></td>
                <td width="5%">:</td>
                <td><label for="no_ktp" class="col-lg-12 control-label"><?php echo $v['nip'] ?></label></td>
            </tr>
            <tr>
                <td><label for="no_ktp" class="col-lg-12 control-label">Nama</label></td>
                <td>:</td>
                <td><label for="no_ktp" class="col-lg-12 control-label"><?php echo $v['nama'] ?></label></td>
            </tr>
            <tr>
                <td><label for="no_ktp" class="col-lg-12 control-label">Jenis Kelamin</label></td>
                <td>:</td>
                <td><label for="no_ktp" class="col-lg-12 control-label"><?php echo $v['jenis_kelamin'] ?></label></td>
            </tr>
            <tr>
                <td><label for="no_ktp" class="col-lg-12 control-label">Alamat</label></td>
                <td>:</td>
                <td><label for="no_ktp" class="col-lg-12 control-label"><?php echo $v['alamat'] ?></label></td>
            </tr>
            <tr>
                <td><label for="no_ktp" class="col-lg-12 control-label">Jabatan</label></td>
                <td>:</td>
                <td><label for="no_ktp" class="col-lg-12 control-label"><?php echo $v['jabatan'] ?></label></td>
            </tr>
            <tr>
                <td><label for="no_ktp" class="col-lg-12 control-label">No Telepon</label></td>
                <td>:</td>
                <td><label for="no_ktp" class="col-lg-12 control-label"><?php echo $v['telepon'] ?></label></td>
            </tr>
        </table>
    </body>
</html>
