<!-- page title -->
<section class="section section--first section--last section--head" data-bg="img/bg.jpg" style="padding-top: 110px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <!-- section title -->
                    <h2 class="section__title">Konfirmasi Transaksi</h2>
                    <!-- end section title -->
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12" style="top: 0px;">
                <!-- cart -->
                <div class="cart">
                    <div class="table-responsive">
                        <table class="cart__table">
                            <thead>
                                <tr>
                                    <th style="width: 12px; text-align: center;">No</th>
                                    <th style="text-align: center;">Kode Pesanan</th>
                                    <th style="text-align: center;">Nomor Resi</th>
                                    <th style="text-align: center;">Penerima</th>
                                    <th style="text-align: center;">Alamat</th>
                                    <th style="text-align: center;">Total</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data_transaksi as $Data_transaksi) : ?>
                                    <tr>
                                        <td style="width: 12px; text-align: center;"><?= $no ?></td>
                                        <td><?= $Data_transaksi->id_pemesanan ?></td>
                                        <td><?= $Data_transaksi->no_resi ?></td>
                                        <td><?= $Data_transaksi->nama_penerima ?></td>
                                        <td><?= $Data_transaksi->alamat_tujuan ?></td>
                                        <td>Rp <?= $Data_transaksi->total_bayar ?>,-</td>
                                        <td><?= $Data_transaksi->status ?></td>
                                        <td>
                                            <?php if ($Data_transaksi->status == 'Belum Bayar') : ?>
                                                <a href="<?= base_url('pelanggan/konfirmasi/detail/' . $Data_transaksi->id_pemesanan . '') ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg>
                                                </a>
                                            <?php elseif ($Data_transaksi->status == 'Konfirmasi') : ?>
                                                Menunggu Konfirmasi
                                            <?php elseif ($Data_transaksi->status == 'Dikirim') : ?>
                                                <a href="<?= base_url('pelanggan/konfirmasi/detail/' . $Data_transaksi->id_pemesanan . '') ?>">
                                                    Terima Barang
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class=" cart__info">
                        <div class="cart__total">
                            <table>
                                <tr>
                                    <th>Nama Bank </th>
                                    <th>: </th>
                                    <th>Bank Central Asia (BCA)</th>
                                </tr>
                                <tr>
                                    <th>Atas Nama </th>
                                    <th>: </th>
                                    <th>Syaiful Bachri</th>
                                </tr>
                                <tr>
                                    <th>No Rekening </th>
                                    <th>: </th>
                                    <th>0329893898</th>
                                </tr>
                            </table>
                        </div>
                        <div class="cart__systems">
                            <i class="pf pf-visa"></i>
                            <i class="pf pf-mastercard"></i>
                            <i class="pf pf-paypal"></i>
                        </div>
                    </div>
                </div>
                <!-- end cart -->
            </div>
        </div>
    </div>
</div>
<!-- end section -->