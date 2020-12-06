<!-- home -->
<section class="section section--bg section--carousel section--first" data-bg="<?= base_url('assets/') ?>img/bg.jpg">
    <div class="container">
        <div class="row">
            <!-- title -->
            <div class="col-12">
                <div class="section__title-wrap">
                    <h2 class="section__title section__title--title"><b>Semua Produk</b> Saeberkah Furniture</h2>
                    <div class="section__nav-wrap">
                        <button class="section__nav section__nav--bg section__nav--prev" type="button" data-nav="#carousel0">
                            <svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='328 112 184 256 328 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
                        </button>

                        <button class="section__nav section__nav--bg section__nav--next" type="button" data-nav="#carousel0">
                            <svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='184 112 328 256 184 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- end title -->
        </div>
    </div>

    <!-- carousel -->
    <div class="owl-carousel section__carousel section__carousel--big" id="carousel0">
        <!-- big card -->
        <?php foreach ($data_barang as $Data_barang) : ?>
        <div class="card card--big">
            <a href="<?= base_url('detail_barang/'.$Data_barang->id_barang.'') ?>" class="card__cover">
                <img src="<?= base_url('assets/') ?>images/products/<?= $Data_barang->gambar_barang ?>" alt="">
            </a>
            <div class="card__wrap">
                <div class="card__title">
                    <h3><a href="<?= base_url('detail_barang/'.$Data_barang->id_barang.'') ?>"><?= $Data_barang->nama_barang ?></a></h3>
                </div>

                <!-- <div class="card__price">
                    <span>$17.99</span><s>$29.99</s><b>40% OFF</b>
                </div> -->
                <div class="card__price">
                    <span>Rp <?= $Data_barang->harga_barang ?>,-</span>
                </div>
                <div class="card__actions">
                <a class="card__buy" href="<?= base_url('detail_barang/'.$Data_barang->id_barang.'') ?>">Lihat</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- big card -->
    </div>
    <!-- end carousel -->
</section>
<!-- end home -->
<!-- section -->
<section class="section section--carousel">
    <div class="container">
        <div class="row">
            <!-- title -->
            <div class="col-12">
                <div class="section__title-wrap">
                    <h2 class="section__title">Produk Favorit</h2>
                    <div class="section__nav-wrap">
                        <button class="section__nav section__nav--prev" type="button" data-nav="#carousel1">
                            <svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='328 112 184 256 328 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
                        </button>

                        <button class="section__nav section__nav--next" type="button" data-nav="#carousel1">
                            <svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='184 112 328 256 184 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- end title -->
        </div>
    </div>

    <!-- carousel -->
    <div class="owl-carousel section__carousel section__carousel--catalog" id="carousel1">
        <!-- big card -->
        <?php foreach ($data_barang_teratas as $Data_barang_teratas) : ?>
        <div class="card card--big">
            <a href="<?= base_url('detail_barang/'.$Data_barang_teratas->id_barang.'') ?>" class="card__cover">
                <img src="<?= base_url('assets/') ?>images/products/<?= $Data_barang_teratas->gambar_barang ?>" alt="">
            </a>
            <div class="card__wrap">
                <div class="card__title">
                    <h3><a href="<?= base_url('detail_barang/'.$Data_barang_teratas->id_barang.'') ?>"><?= $Data_barang_teratas->nama_barang ?></a></h3>
                </div>

                <!-- <div class="card__price">
                    <span>$17.99</span><s>$29.99</s><b>40% OFF</b>
                </div> -->
                <div class="card__price">
                    <span>Rp <?= $Data_barang_teratas->harga_barang ?>,-</span>
                </div>
                <div class="card__actions">
                    <a class="card__buy" href="<?= base_url('detail_barang/'.$Data_barang_teratas->id_barang.'') ?>">Lihat</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- big card -->
    </div>
    <!-- end carousel -->
</section>
<!-- end section -->

<!-- section -->
<div class="section section--last">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="partners owl-carousel">
                    <a href="#" class="partners__img">
                        <img src="<?= base_url('assets/') ?>img/partners/3docean-light-background.png" alt="">
                    </a>

                    <a href="#" class="partners__img">
                        <img src="<?= base_url('assets/') ?>img/partners/activeden-light-background.png" alt="">
                    </a>

                    <a href="#" class="partners__img">
                        <img src="<?= base_url('assets/') ?>img/partners/audiojungle-light-background.png" alt="">
                    </a>

                    <a href="#" class="partners__img">
                        <img src="<?= base_url('assets/') ?>img/partners/codecanyon-light-background.png" alt="">
                    </a>

                    <a href="#" class="partners__img">
                        <img src="<?= base_url('assets/') ?>img/partners/photodune-light-background.png" alt="">
                    </a>

                    <a href="#" class="partners__img">
                        <img src="<?= base_url('assets/') ?>img/partners/themeforest-light-background.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->