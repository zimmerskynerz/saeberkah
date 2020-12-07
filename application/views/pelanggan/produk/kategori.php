<section class="section section--last section--catalog">
    <div class="container">
        <!-- catalog -->
        <div class="row">
            <!-- content wrap -->
            <div class="col-12">
                <div class="row">
                    <!-- card -->
                    <?php foreach ($data_kategori_barang as $Data_kategori_barang) : ?>
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="card">
                                <a href="<?= base_url('detail_barang/' . $Data_kategori_barang->id_barang . '') ?>" class="card__cover">
                                    <img src="<?= base_url('assets/') ?>images/products/<?= $Data_kategori_barang->gambar_barang ?>" alt="">
                                </a>
                                <div class="card__title">
                                    <h3><a href="<?= base_url('detail_barang/' . $Data_kategori_barang->id_barang . '') ?>"><?= $Data_kategori_barang->nama_barang ?></a></h3>
                                    <span>Rp <?= $Data_kategori_barang->harga_barang ?>,-</span>
                                </div>
                                <div class="card__actions">
                                    <a class="card__buy" href="<?= base_url('detail_barang/' . $Data_kategori_barang->id_barang . '') ?>">Lihat</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- end card -->
                </div>
            </div>
            <!-- end content wrap -->
        </div>
        <!-- end catalog -->
    </div>
</section>
<!-- end section -->