<!-- Tambah Kategori -->
<div class="modal fade" id="tambah_kategori">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renew_detailLabel">Tambah Kategori Produk!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/gudang/crudproduk'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label for="">Nama Kategori</label>
                    <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" required placeholder="Nama Kategori, Mis. Meja Tidur">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-primary" id="tambah_kategori" name="tambah_kategori">Tambah Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Tambah Produk -->
<div class="modal fade" id="tambah_produk">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renew_detailLabel">Tambah Produk!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/gudang/crudproduk'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label for="">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required placeholder="Nama Produk, Mis. Meja Ukir Jepara">
                </div>
                <div class="form-group mb-4">
                    <label for="">Jenis Produk</label>
                    <select type="text" class="form-control" id="id_kategori" name="id_kategori" required placeholder="Nama Produk, Mis. Meja Ukir Jepara">
                        <option>Pilih Kategori Produk</option>
                        <?php foreach ($data_kategori as $Data_kategori) : ?>
                            <option value="<?= $Data_kategori->id_kategori ?>"><?= $Data_kategori->nama_kategori ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Panjang</label>
                        <input type="number" class="form-control" id="panjang" name="panjang" placeholder="satuan cm">
                        <input type="number" class="form-control" id="satuan" name="satuan" value="cm" hidden placeholder="satuan cm">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCity">Lebar</label>
                        <input type="number" class="form-control" id="lebar" name="lebar" placeholder="satuan cm">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCity">Tinggi</label>
                        <input type="number" class="form-control" id="tinggi" name="tinggi" placeholder="satuan cm">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="">Berat Produk</label>
                    <input type="number" class="form-control" id="berat_barang" name="berat_barang" required placeholder="Berat Barang, Mis. 1 kg">
                </div>
                <div class="form-group mb-4">
                    <label for="">Stok Produk</label>
                    <input type="number" class="form-control" id="stok_barang" name="stok_barang" required placeholder="Stok Barang, Mis. 10">
                </div>
                <div class="form-group mb-4">
                    <label for="">Harga Produk</label>
                    <input type="number" class="form-control" id="harga_barang" name="harga_barang" required placeholder="Harga Barang, Mis. 10000">
                </div>
                <div class="form-group mb-4">
                    <label for="">Keterangan Produk</label>
                    <textarea type="text" class="form-control" id="ket_barang" name="ket_barang" required placeholder="Keterangan Barang"></textarea>
                </div>
                <div class="form-group">
                    <label for="customFile">Foto Produk</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-primary" id="tambah_produk" name="tambah_produk">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>