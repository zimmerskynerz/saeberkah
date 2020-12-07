<!-- page title -->
<section class="section section--first section--last section--head" data-bg="img/bg.jpg" style="padding-top: 110px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <!-- section title -->
                    <h2 class="section__title">Checkout</h2>
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
            <div class="col-12 col-lg-8">
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
                                <?php foreach ($data_trolly as $Data_trolly) : ?>
                                    <tr>
                                        <td>
                                            <div class="cart__img">
                                                <img src="<?= base_url('assets/') ?>images/products/<?= $Data_trolly->gambar_barang ?>" alt="">
                                            </div>
                                        </td>
                                        <td><?= $Data_trolly->nama_barang ?></td>
                                        <td><span class="cart__price"><?= $Data_trolly->harga_barang ?></span></td>
                                        <td><?= $Data_trolly->jumlah ?></td>
                                        <td><?= $Data_trolly->berat_barang ?> Kg</td>
                                        <td><span class="cart__price"><?= $Data_trolly->total_harga ?></span></td>
                                        <td>
                                            <a class="cart__delete" type="submit" href="<?= base_url('pelanggan/hapuscart/' . $Data_trolly->id_trolly . '') ?>">
                                                <svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'>
                                                    <line x1='368' y1='368' x2='144' y2='144' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                                    <line x1='368' y1='144' x2='144' y2='368' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' /></svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="cart__info">
                        <div class="cart__total">
                            <p>Total:</p>
                            <span>Rp <?= $total_belanaja['total_belanaja'] ?>,-</span>
                        </div>
                        <div class="cart__total">
                            <p>Berat:</p>
                            <span><?= $total_belanaja['berat_total'] ?> Kg</span>
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
                <?php echo form_open_multipart('pelanggan/bayar'); ?>
                <div class="form form--checkout">
                    <input type="number" class="form__input" id="berat" hidden value="<?= $total_belanaja['berat_total'] * 1000 ?>" name="berat" required>
                    <input type="text" class="form__input" id="id_pelanggan" hidden value="<?= $data_pelanggan['id_pelanggan'] ?>" name="id_pelanggan" required>
                    <input type="text" class="form__input" id="total_belanaja" hidden value="<?= $total_belanaja['total_belanaja'] ?>" name="total_belanaja" required>
                    <input type="text" class="form__input" placeholder="Penerima" id="nama_penerima" name="nama_penerima" required>
                    <input type="number" class="form__input" placeholder="Nomor Telepon" id="telepon_penerima" name="telepon_penerima" required>
                    <textarea type="text" class="form__input" placeholder="Alamat Lengkap" id="alamat_tujuan" name="alamat_tujuan" required></textarea>
                    <select class="form__input" id="kota_tujuan" name="kota_tujuan" placeholder="Kota Tujuan" required>
                        <option>Pilih Kota</option>
                        <?php foreach ($data_kota as $Data_kota) : ?>
                            <option value="<?= $Data_kota->city_id ?>"><?= $Data_kota->city_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="number" class="form__input" placeholder="Kode Pos" id="kode_pos" name="kode_pos" required>
                    <select class="form__input" id="kurir" name="kurir" required>
                        <option value="">Pilih Jasa Pengiriman</option>
                        <option value="jne">JNE</option>
                        <option value="tiki">TIKI</option>
                    </select>
                    <input type="text" readonly class="form__input" id="hg_total" placeholder="Total Bayar" name="hg_total" required>
                    <button type="submit" id="bayar" name="bayar" class="form__btn">Bayar</button>
                </div>
                <?php echo form_close(); ?>
                <!-- end checkout -->
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<?php $this->load->view('pelanggan/cart/footer') ?>