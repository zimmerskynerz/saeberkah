<div class="header__wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <button class="header__menu" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <a href="<?= base_url('/') ?>" class="header__logo">
                        <img src="<?= base_url('assets/') ?>dist/img/sae-logo.png" alt="">
                    </a>

                    <ul class="header__nav">
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="<?= base_url('/') ?>">Home</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>

                            <ul class="dropdown-menu header__nav-menu" aria-labelledby="dropdownMenu1">
                                <?php foreach ($data_kategori as $Data_kategori) : ?>
                                    <li><a href="<?= base_url('pelanggan/kategori/' . $Data_kategori->id_kategori . '') ?>"><?= $Data_kategori->nama_kategori ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <?php if ($data_pelanggan > 0) : ?>
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
                                <ul class="dropdown-menu header__nav-menu" aria-labelledby="dropdownMenu2">
                                    <li><a href="article.html">Keranjang</a></li>
                                    <li><a href="interview.html">Transaksi</a></li>
                                    <li><a href="interview.html">Profile</a></li>
                                    <li><a href="<?= base_url('pelanggan-logout') ?>">Logout</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <div class="header__actions">
                        <div class="header__actions header__actions--2">
                            <?php if ($data_pelanggan > 0) : ?>
                                <a href="<?= base_url('pelanggan/cart') ?>" class="header__link">
                                    <svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'>
                                        <circle cx='176' cy='416' r='16' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                        <circle cx='400' cy='416' r='16' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                        <polyline points='48 80 112 80 160 352 416 352' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                        <path d='M160,288H409.44a8,8,0,0,0,7.85-6.43l28.8-144a8,8,0,0,0-7.85-9.57H128' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' /></svg>
                                    <span>Rp
                                        <?php if ($total_belanaja['total_belanaja'] == null) :
                                            echo '0';
                                        else :
                                            echo $total_belanaja['total_belanaja'];
                                        endif; ?>,</span>
                                </a>
                            <?php else : ?>
                                <a href="<?= base_url('login-pelanggan') ?>" class="header__login">
                                    <svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'>
                                        <path d='M192,176V136a40,40,0,0,1,40-40H392a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H240c-22.09,0-48-17.91-48-40V336' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                        <polyline points='288 336 368 256 288 176' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                        <line x1='80' y1='256' x2='352' y2='256' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' /></svg>
                                    <span>Sign in</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>