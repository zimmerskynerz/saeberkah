<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Data Laporan Transaksi
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
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_pesanan?></h3>

                            <p>Jumlah Pesanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlah_pelanggan?></h3>

                            <p>Jumlah Pelanggan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Rp <?=$total_sub_bayar['total_sub_bayar']?>,-</h3>

                            <p>Jumlah Pemasukan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Tampil Laporan</h3>
                        </div>
                        <div class="card-body">
                        <?php echo form_open_multipart('admin/menu_admin/laporan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="form-row">
                                <div class="col col-sm-6">
                                    <label for="bulan" class="form-control-label">Bulan</label>
                                    <select class="form-control" name="bulan" id="bulan">
                                        <option>-- Bulan --</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">Nopember</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col col-sm-6">
                                    <label for="tahun" class="form-control-label">Tahun</label>
                                    <select class="form-control" name="tahun" id="tahun">
                                        <option>-- Tahun --</option>
                                        <?php
                                        $now = date('Y');
                                        for ($tahun = $now; $tahun >= $now - 20; $tahun--) {
                                            echo '
											<option value="' . $tahun . '">' . $tahun . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" id="cetak" name="cetak">Cetak</button>
                                    <button type="submit" class="btn btn-primary" id="cek_laporan" name="cek_laporan">Lihat</button>
                                </div>
            <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Laporan Transaksi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
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
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_laporan as $Data_laporan) : ?>
                                        <tr>
                                            <td style="width: 12px; text-align: center;"><?= $no ?></td>
                                            <td><?= date('d F Y', strtotime($Data_laporan->tgl_pesan)) ?></td>
                                            <td><?= $Data_laporan->id_pemesanan ?></td>
                                            <td><?= $Data_laporan->nama_penerima ?></td>
                                            <td><?= $Data_laporan->no_resi ?></td>
                                            <td><?= $Data_laporan->sub_bayar ?></td>
                                            <td><?= $Data_laporan->ongkir ?></td>
                                            <td><?= $Data_laporan->total_bayar ?></td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url('admin/menu_admin/detail_laporan/'.$Data_laporan->id_pemesanan.'')?>" href="javascript:void(0);" class="bs-tooltip" data-placement="top" title="" data-original-title="Detail">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg>
                                                </a>
                                            </td>
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