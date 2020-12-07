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
            <div class="col-12 col-lg-8" style="padding-top: 1px;">
                <!-- cart -->
                <div class="cart">
                    <div class="table-responsive">
                        <table class="cart__table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Berat</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detail_beli as $Detail_beli) : ?>
                                    <tr>
                                        <td>
                                            <div class="cart__img">
                                                <img src="<?= base_url('assets/') ?>images/products/<?= $Detail_beli->gambar_barang ?>" alt="">
                                            </div>
                                        </td>
                                        <td><?= $Detail_beli->nama_barang ?></td>
                                        <td><span class="cart__price"><?= $Detail_beli->harga_barang ?></span></td>
                                        <td><?= $Detail_beli->jumlah_beli ?></td>
                                        <td><?= $Detail_beli->berat_barang ?> Kg</td>
                                        <td><span class="cart__price"><?= $Detail_beli->total_harga ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart__info">
                        <div class="cart__total">
                            <p>Total:</p>
                            <span>Rp <?= $data_pemesanan['total_bayar'] ?>,-</span>
                        </div>
                        <div class="cart__total">
                            <p>Ongkir:</p>
                            <span>Rp <?= $data_pemesanan['ongkir'] ?>,-</span>
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
            <div class="col-12 col-lg-4">
                <!-- checkout -->
                <?php echo form_open_multipart('pelanggan/konfirmasi/crudkonfirmasi'); ?>
                <div class="form form--checkout">
                    <h3>Konfirmasi Pembayaran</h3>
                    <input type="text" class="form__input" id="id_pelanggan" hidden value="<?= $data_pelanggan['id_pelanggan'] ?>" name="id_pelanggan" required>
                    <input type="text" class="form__input" id="id_pemesanan" hidden value="<?= $id_pemesanan ?>" name="id_pemesanan" required>
                    <input type="text" class="form__input" id="nama_bank" name="nama_bank" placeholder="Masukkan Nama Bank Anda" required>
                    <input type="text" class="form__input" id="nomor_rekening" name="nomor_rekening" placeholder="Masukkan Nomor Rekening Bank Anda" required>
                    <input type="text" class="form__input" id="atas_nama" name="atas_nama" placeholder="Masukkan Atas Nama Rekening" required>
                    <input type="file" class="form__input" id="bukti_pembayaran" name="bukti_pembayaran" placeholder="Masukkan Bukti Pembayaran" required>
                    <button type="submit" id="konfirmasi_bayar" name="konfirmasi_bayar" class="form__btn">Konfirmasi</button>
                </div>
                <?php echo form_close(); ?>
                <!-- end checkout -->
            </div>
        </div>
    </div>
</div>
<!-- end section -->