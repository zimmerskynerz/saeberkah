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
                                            <button class="cart__delete" type="button"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'>
                                                    <line x1='368' y1='368' x2='144' y2='144' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                                    <line x1='368' y1='144' x2='144' y2='368' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' /></svg>
                                            </button>
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
                <form action="#" class="form form--checkout">
                    <input type="number" class="form__input" id="berat_total" hidden value="<?= $total_belanaja['berat_total'] ?>" name="berat_total">
                    <input type="text" class="form__input" id="id_pelanggan" hidden value="<?= $data_pelanggan['id_pelanggan'] ?>" name="id_pelanggan">


                    <input type="text" class="form__input" placeholder="Penerima" id="nama_penerima" name="nama_penerima">
                    <input type="number" class="form__input" placeholder="Nomor Telepon" id="telepon_penerima" name="telepon_penerima">
                    <textarea type="text" class="form__input" placeholder="Alamat Lengkap" id="alamat_tujuan" name="alamat_tujuan"></textarea>
                    <select class="form__input" id="kota_tujuan" name="kota_tujuan" placeholder="Kota Tujuan" required>
                        <option>Pilih Kota</option>
                        <?php foreach ($data_kota as $Data_kota) : ?>
                            <option value="<?= $Data_kota->city_id ?>"><?= $Data_kota->city_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="number" class="form__input" placeholder="Kode Pos" id="kode_pos" name="kode_pos">
                    <select class="form__input" id="kurir" name="kurir" required>
                        <option value="">Pilih Jasa Pengiriman</option>
                        <option value="jne">JNE</option>
                        <option value="tiki">TIKI</option>
                    </select>
                    <input type="text" readonly class="form__input" id="hg_total" name="hg_total">
                    <button type="button" class="form__btn">Bayar</button>
                </form>
                <!-- end checkout -->
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<script>
    $('#kurir').change(function() {
        //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
        var kab = $('#kota_tujuan').val();
        var kurir = $('#kurir').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('pelanggan/raja_ongkir'); ?>',
            data: {
                'kab_id': kab,
                'kurir': kurir
            },
            success: function(data) {
                // console.log(data);
                //jika data berconsole.log(data);hasil didapatkan, tampilkan ke dalam element div ongkir
                $("#hg_total").val(data);
            }
        });
    });
</script>