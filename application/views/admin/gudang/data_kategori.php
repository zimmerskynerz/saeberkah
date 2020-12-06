<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Data Kategori Produk
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">admin</a></li>
                        <li class="breadcrumb-item active">gudang</li>
                        <li class="breadcrumb-item active">kategori</li>
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
                            <h3 class="card-title">Daftar Kategori Produk</h3>
                            <button type="button" style="position: absolute; right: 20px; top: 3px;" class="btn btn-primary mb-1" data-toggle="modal" data-target="#tambah_kategori" id="#tambahFakultasScroll">
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
                                        <th style="text-align: center;">Kode Kategori</th>
                                        <th style="text-align: center;">Nama Kategori</th>
                                        <th style="text-align: center;">Jumlah Produk</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_kategori as $Data_kategori) : ?>
                                        <tr>
                                            <td style="width: 12px; text-align: center;"><?= $no ?></td>
                                            <td><?= $Data_kategori->id_kategori ?></td>
                                            <td><?= $Data_kategori->nama_kategori ?></td>
                                            <td style="text-align: center;">
                                                <?php foreach ($jml_produk as $Jml_produk) : ?>
                                                    <?php if ($Data_kategori->id_kategori == $Jml_produk->jenis_barang) :
                                                        echo $Jml_produk->jml_barang;
                                                    endif; ?>
                                                <?php endforeach; ?> Produk
                                            </td>
                                            <td style="text-align: center;">
                                                <a id="detail_kategori" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#kategori_detail" data-placement="top" title="" data-original-title="Detail" 
                                                data-id_kategori="<?= $Data_kategori->id_kategori ?>" 
                                                data-nama_kategori="<?= $Data_kategori->nama_kategori ?>">
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