<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('pelanggan/include/head') ?>
<body>
	<!-- header -->
	<header class="header">
		<?php $this->load->view('pelanggan/include/top_bar') ?>
	</header>
	<!-- end header -->

    <?php $this->load->view('pelanggan/'.$folder.'/'.$halaman.'') ?>

    <?php $this->load->view('pelanggan/include/footer')?>
</body>
</html>