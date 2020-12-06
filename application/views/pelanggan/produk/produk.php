	<!-- section -->
	<section class="section section--first section--carousel section--bg" data-bg="img/bg.jpg" style="padding-top: 110px;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="details">
						<div class="details__head">
							<div class="details__cover">
								<img src="<?=base_url('assets/images/products/'.$detail_barang['gambar_barang'].'')?>" width="400px" height="180px" alt="">
							</div>

							<div class="details__wrap">
								<h1 class="details__title"><?= $detail_barang['nama_barang']?></h1>

								<ul class="details__list">
									<li><span>Ukuran Barang:</span> <?= $detail_barang['ukuran_barang']?></a></li>
									<li><span>Berat Barang:</span> <?= $detail_barang['berat_barang']?> Kg</a></li>
									<li><span>Harga Barang:</span> Rp <?= $detail_barang['harga_barang']?>,-</li>
								</ul>
							</div>
						</div>

						<div class="details__text">
                            <h3>Penjelasan Barang</h3>
                            <h5>Ukuran Barang</h5>
                                <p><?= $detail_barang['ukuran_barang']?></p>    
                            <h5>Berat Barang</h5>
                                <p><?= $detail_barang['berat_barang']?> Kg</p>    
                            <h5>Harga Barang</h5>
                                <p>Rp <?= $detail_barang['harga_barang']?>,-</p>
                            <h3>Keterangan Barang</h3>    
                            <p><?= $detail_barang['ket_barang']?></p>
                        </div>

						<div class="details__cart">
                                <ul class="details__list" style="top: 12px; position:absolute;">
                                    <li><h3>Kode Barang : <?= $detail_barang['id_barang']?></h3></li>
									<li><span>Ukuran Barang:</span> <?= $detail_barang['ukuran_barang']?></a></li>
									<li><span>Berat Barang:</span> <?= $detail_barang['berat_barang']?> Kg</a></li>
								</ul>
							<span class="details__cart-title">Harga</span>
							<div class="details__price">
								<span>Rp Rp <?= $detail_barang['harga_barang']?>,-</span>
							</div>

							<div class="details__actions">
								<button class="details__buy" type="button">Beli</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end section -->