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
        <table class="table">
            <tr>
                <td>Kepada</td>
                <td rowspan="3">
                    <div style="border: solid 0.1px; padding: 30px 30px 30px 30px">
                        <h3><b>PEMINJAMAN BARANG MILIK NEGARA</b></h3>
                    </div>
                </td>
            </tr>
            <tr>
                <td><b>Ka Subbag Tata Usaha</b></td>
            </tr>
            <tr>
                <td>Up. Pengelola BMN</td>
            </tr>
            <tr>
                <td>
                    Tanggal :
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
                <td>Keperluan : <?php echo $v['keperluan'] ?></td>
            </tr>
        </table>

        <table class="table table-bordered table-striped table-hover" pading="50px">
            <thead>
                <tr class="warning">
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">NO</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">NAMA BMN</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">NO INVENTARIS</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">JUMLAH</th>
                    <th style="vertical-align:middle;text-align:center;" style="text-transform: uppercase; text-align: center">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($ls as $v) {
                    ?>
                    <tr>
                        <td align="center"><?php echo $i++ ?></td>
                        <td><?php echo $v['nama_bmn'] ?></td>
                        <td align="center"><?php echo $v['no_inventaris'] ?></td>
                        <td align="center"><?php echo '1' ?></td>
                        <td align="left"></td>
                    </tr>
                <?php } ?>
                <?php
                for ($j = $i; $j <= 21; $j++) {
                    ?>
                    <tr>
                        <td style="height: 20px"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <table class="table tab">
            <tr>
                <td width="60%">
                </td>
                <td>
                    <?php
                    $bulan_angka = date('m');
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
                    echo 'Yogyakarta, '.date('d ') . $bulan . date(' Y');
                    ?>
                </td>
            </tr>
            <tr>
                <td width="60%">
                    <b>Yang menyerahkan Barang</b><br>
                    Pengelola Gudang
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?php echo '( Ponaryo Setiadi, MT )' ?><br>
                    NIP. <?php echo '19600929 199012 2 001' ?>
                </td>
                <td>
                    <b>Yang mengajukan peminjaman Barang</b><br>
                    Peminjam
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?php echo '( ' . $vPegawai['nama'] . ' )' ?><br>
                    NIP. <?php echo $vPegawai['nip'] ?>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
			<tr>
				<td></td>
			</tr>
            <tr>
                <td width="60%">
                    <b>Menyetujui,</b> <br>
                    Ka Subbag TU
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                <?php echo '( Sri Utami, S.Pd )' ?><br>
                    NIP. 19701231 200012 1 001
                </td>
                <td>
                    <b>Menyetujui,</b><br>
                    Kepala Seki
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?php echo '( Ir. Sukarwo Efendi )' ?><br>
                    NIP. 19550131 198012 1 003
                </td>
            </tr>
        </table>
    </body>
</html>
