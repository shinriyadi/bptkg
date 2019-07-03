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
        <h4 align="center"><b>DAFTAR PEGAWAI</b></h4>
        
        <table class="table table-bordered table-striped table-hover" padding="50px">
            <thead>
                <tr class="warning">
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">NO</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">NAMA</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">NIP</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">JABATAN</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">NO TELEPON</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($ls as $v) {
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $v['nama'] ?></td>
                        <td><?php echo $v['nip'] ?></td>
                        <td><?php echo $v['jabatan'] ?></td>
                        <td><?php echo $v['telepon'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
