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
        <h4 align="center"><b>DAFTAR BARANG MILIK NEGARA</b></h4>

        <table class="table table-bordered table-striped table-hover" pading="50px">
            <thead>
                <tr class="warning">
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">NO</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">NO INVENTARIS</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">NAMA BARANG</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">ASAL</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">SATUAN</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">GUDANG</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">KONDISI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($ls as $v) {
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <th><?php echo $v['no_inventaris'] ?></th>
                        <td><?php echo $v['nama_bmn'] ?></td>
                        <td><?php echo $v['asal_perolehan_bmn'] ?></td>
                        <td><?php echo $v['nama_satuan'] ?></td>
                        <td><?php echo $v['nama_gudang'] ?></td>
                        <td><?php echo $v['kondisi'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
