<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Data Transaksi <?=$id?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">admin</a></li>
                        <li class="breadcrumb-item active">menu_admin</li>
                        <li class="breadcrumb-item active">laporan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Barang Transaksi <?= $id?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 12px; text-align: center;">No</th>
                                        <th style="text-align: center;">Kode Barang</th>
                                        <th style="text-align: center;">Nama Barang</th>
                                        <th style="text-align: center;">Jumlah Beli</th>
                                        <th style="text-align: center;">Harga Beli</th>
                                        <th style="text-align: center;">Harga Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($detail_laporan as $Detail_laporan) : ?>
                                        <tr>
                                            <td style="width: 12px; text-align: center;"><?= $no ?></td>
                                            <td><?= $Detail_laporan->id_barang ?></td>
                                            <td><?= $Detail_laporan->nama_barang ?></td>
                                            <td style="text-align: center;"><?= $Detail_laporan->jumlah_beli ?></td>
                                            <td><?= $Detail_laporan->harga_barang ?></td>
                                            <td><?= $Detail_laporan->total_harga ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- ./row -->
        </div><!-- /.container-fluid -->
        <?php $this->load->view('admin/admin/tambah_data') ?>
        <?php $this->load->view('admin/admin/detail_data') ?>
    </section>
    <!-- /.content -->
</div>