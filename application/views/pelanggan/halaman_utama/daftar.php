<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/magnific-popup.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/nouislider.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/paymentfont.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" />


	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>DAFTAR | TOKO ONLINE SAEBERKAH FURNITURE</title>

</head>

<body>
	<!-- sign in -->
	<div class="sign section--full-bg" data-bg="img/bg2.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form class="sign__form" action="<?= base_url('pelanggan-cruddaftar') ?>" method="POST">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
							<a href="<?= base_url('/') ?>" class="sign__logo">
								<img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="">
							</a>
							<div class="sign__group">
								<input type="text" class="sign__input" style="color: black;" id="username" name="username" placeholder="Username">
							</div>
							<div class="sign__group">
								<input type="password" class="sign__input" style="color: black;" id="password" name="password" placeholder="Password">
							</div>
							<div class="sign__group">
								<input type="text" class="sign__input" style="color: black;" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
							</div>
							<div class="sign__group">
								<input type="email" class="sign__input" style="color: black;" id="email" name="email" placeholder="Email Aktif">
							</div>
							<div class="sign__group">
								<input type="number" class="sign__input" style="color: black;" id="nomer_hp" name="nomer_hp" placeholder="Nomor HP">
							</div>
							<div class="sign__group">
								<textarea type="text" class="sign__input" style="color: black;" id="alamat" name="alamat" placeholder="Alamat Lengkap"></textarea>
							</div>
							<button class="sign__btn" type="submit">Sign up</button>
							<span class="sign__text">Sudah Punya Akun? <a href="login-pelanggan">Log in!</a></span>
						</form>
						<!-- registration form -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end sign in -->

	<!-- JS -->
	<script src="<?= base_url('assets/') ?>js/jquery-3.5.1.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/wNumb.js"></script>
	<script src="<?= base_url('assets/') ?>js/nouislider.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/jquery.mousewheel.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/jquery.mCustomScrollbar.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/main.js"></script>
</body>

</html>