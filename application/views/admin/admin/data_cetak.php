<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Admin | Sae.Berkah Furniture</title>
    <link rel="shortcut icon" href="<?=base_url('assets/')?>img/sae-icon.png">

    <!-- Fontfaces CSS-->
    <link href="<?=base_url('assets/')?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=base_url('assets/')?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?=base_url('assets/')?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=base_url('assets/')?>css/theme.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>css/w3.css" rel="stylesheet" media="all">

    <!-- Data Tables CSS-->
    <link href="<?=base_url('assets/')?>datatables/datatables.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="all">    
    <link href="<?=base_url('assets/')?>datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="all">

</head>
<body>

    <section class="alert-wrap p-t-50 p-b-30">
        <div class="container">
            <img src="<?=base_url('assets/')?>/dist/img/sae-logo.png" style="width: 200px; position: absolute;">
            <h4 align="center"><b>LAPORAN PENJUALAN</b></h4>
            <br>
            <table class="table">
            <thead>
                                    <tr>
                                        <th style="width: 12px; text-align: center;">No</th>
                                        <th style="text-align: center;">Tgl Pemesanan</th>
                                        <th style="text-align: center;">Kode Pesan</th>
                                        <th style="text-align: center;">Pemesan</th>
                                        <th style="text-align: center;">No Resi</th>
                                        <th style="text-align: center;">Harga</th>
                                        <th style="text-align: center;">Ongkir</th>
                                        <th style="text-align: center;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_laporan as $Data_laporan) : ?>
                                        <tr>
                                            <td style="width: 12px; text-align: center;"><?= $no ?></td>
                                            <td style="text-align: center;"><?= date('d F Y', strtotime($Data_laporan->tgl_pesan)) ?></td>
                                            <td style="text-align: center;"><?= $Data_laporan->id_pemesanan ?></td>
                                            <td style="text-align: center;"><?= $Data_laporan->nama_penerima ?></td>
                                            <td style="text-align: center;"><?= $Data_laporan->no_resi ?></td>
                                            <td style="text-align: center;"><?= $Data_laporan->sub_bayar ?></td>
                                            <td style="text-align: center;"><?= $Data_laporan->ongkir ?></td>
                                            <td style="text-align: center;"><?= $Data_laporan->total_bayar ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" align="center"><b>TOTAL</b></td>
                        <th>Rp <?= $akhir_bayar['total_sub_bayar']; ?></th>
                        <th>RP <?= $akhir_bayar['total_ongkir']; ?></th>
                        <th>RP <?= $akhir_bayar['total_sum_bayar']; ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>