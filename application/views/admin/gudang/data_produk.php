<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Data Produk
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">admin</a></li>
                        <li class="breadcrumb-item active">gudang</li>
                        <li class="breadcrumb-item active">produk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Produk Saeberkah Furniture</h3>
                            <button type="button" style="position: absolute; right: 20px; top: 3px;" class="btn btn-primary mb-1" data-toggle="modal" data-target="#tambah_produk" id="#tambahFakultasScroll">
                                <i class="fas fa-plus-circle"></i>
                                Tambah
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 12px; text-align: center;">No</th>
                                        <th style="text-align: center;">Kode</th>
                                        <th style="text-align: center;">Gambar</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Jenis</th>
                                        <th style="text-align: center;">Ukuran</th>
                                        <th style="text-align: center;">Berat</th>
                                        <th style="text-align: center;">Stok</th>
                                        <th style="text-align: center;">Harga</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_produk as $Data_produk) : ?>
                                        <tr>
                                            <td style="width: 12px; text-align: center;"><?= $no ?></td>
                                            <td><?= $Data_produk->id_barang ?></td>
                                            <td style="text-align: center;"><img class="avatar zoom" src="<?= base_url('assets/') ?>images/products/<?= $Data_produk->gambar_barang ?>" width="25%" alt="avatar"></td>
                                            <td><?= $Data_produk->nama_barang ?></td>
                                            <td style="text-align: center;">
                                                <?php foreach ($data_kategori as $Data_kategori) : ?>
                                                    <?php if ($Data_produk->jenis_barang == $Data_kategori->id_kategori) :
                                                        echo $Data_kategori->nama_kategori;
                                                    endif; ?>
                                                <?php endforeach; ?>
                                            </td>
                                            <td style="text-align: center;"><?= $Data_produk->ukuran_barang ?></td>
                                            <td style="text-align: center;"><?= $Data_produk->berat_barang ?></td>
                                            <td style="text-align: center;"><?= $Data_produk->stok_barang ?></td>
                                            <td style="text-align: center;"><?= $Data_produk->harga_barang ?></td>
                                            <td style="text-align: center;">
                                                <a id="detail_produk" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#produk_detail" data-placement="top" title="" data-original-title="Detail" 
                                                data-id_barang="<?= $Data_produk->id_barang ?>" 
                                                data-nama_barang="<?= $Data_produk->nama_barang ?>" 
                                                data-jenis_barang="<?= $Data_produk->jenis_barang ?>" 
                                                data-ukuran_barang="<?= $Data_produk->ukuran_barang ?>" 
                                                data-berat_barang="<?= $Data_produk->berat_barang ?>"
                                                data-ket_barang="<?= $Data_produk->ket_barang ?>"
                                                data-harga_barang="<?= $Data_produk->harga_barang ?>"
                                                data-gambar_barang="<?= $Data_produk->gambar_barang ?>"
                                                data-stok_barang="<?= $Data_produk->stok_barang ?>" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- ./row -->
        </div><!-- /.container-fluid -->
        <?php $this->load->view('admin/gudang/tambah_data') ?>
        <?php $this->load->view('admin/gudang/detail_data') ?>
    </section>
    <!-- /.content -->
</div>