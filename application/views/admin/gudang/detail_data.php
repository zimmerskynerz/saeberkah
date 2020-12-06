<!-- Tambah Kategori -->
<div class="modal fade" id="kategori_detail">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renew_detailLabel">Detail Kategori Produk!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/gudang/crudproduk'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label for="">Nama Kategori</label>
                    <input type="text" class="form-control" id="id_kategori" name="id_kategori" hidden required placeholder="Nama Kategori, Mis. Meja Tidur">
                    <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" required placeholder="Nama Kategori, Mis. Meja Tidur">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-warning" id="ubah_kategori" name="ubah_kategori">Perbarui Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_kategori", function() {
        var id_kategori = $(this).data('id_kategori');
        var nm_kategori = $(this).data('nama_kategori');
        $(".modal-body#detail_body #id_kategori").val(id_kategori);
        $(".modal-body#detail_body #nm_kategori").val(nm_kategori);
    })
</script>
<!-- Tambah Produk -->
<div class="modal fade" id="produk_detail">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renew_detailLabel">Detail Produk!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/gudang/crudproduk'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label for="">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required placeholder="Nama Produk, Mis. Meja Ukir Jepara" required>
                    <input type="text" class="form-control" id="id_produk" name="id_produk" hidden placeholder="Nama Produk, Mis. Meja Ukir Jepara" required>
                    <input type="text" class="form-control" id="foto_lama" name="foto_lama" hidden placeholder="Nama Produk, Mis. Meja Ukir Jepara" required>
                </div>
                <div class="form-group mb-4">
                    <label for="">Jenis Produk</label>
                    <select type="text" class="form-control" id="id_kategori" name="id_kategori" required placeholder="Nama Produk, Mis. Meja Ukir Jepara" required>
                        <option>Pilih Kategori Produk</option>
                        <?php foreach ($data_kategori as $Data_kategori) : ?>
                            <option value="<?= $Data_kategori->id_kategori ?>"><?= $Data_kategori->nama_kategori ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="">Ukuran Produk</label>
                    <input type="text" class="form-control" id="ukuran_barang" name="ukuran_barang" required placeholder="Berat Barang, Mis. 1 kg" required>
                </div>
                <div class="form-group mb-4">
                    <label for="">Berat Produk</label>
                    <input type="number" class="form-control" id="berat_barang" name="berat_barang" required placeholder="Berat Barang, Mis. 1 kg" required>
                </div>
                <div class="form-group mb-4">
                    <label for="">Stok Produk</label>
                    <input type="number" class="form-control" id="stok_barang" name="stok_barang" required placeholder="Stok Barang, Mis. 10" required>
                </div>
                <div class="form-group mb-4">
                    <label for="">Harga Produk</label>
                    <input type="number" class="form-control" id="harga_barang" name="harga_barang" required placeholder="Harga Barang, Mis. 10000" required>
                </div>
                <div class="form-group mb-4">
                    <label for="">Keterangan Produk</label>
                    <textarea type="text" class="form-control" id="ket_barang" name="ket_barang" required placeholder="Keterangan Barang" required></textarea>
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
                <button type="submit" class="btn btn-danger" id="hapus_produk" name="hapus_produk">Hapus</button>
                <button type="submit" class="btn btn-warning" id="ubah_produk" name="ubah_produk">Perbarui</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_produk", function() {
        var id_barang = $(this).data('id_barang');
        var nama_barang = $(this).data('nama_barang');
        var jenis_barang = $(this).data('jenis_barang');
        var ukuran_barang = $(this).data('ukuran_barang');
        var berat_barang = $(this).data('berat_barang');
        var ket_barang = $(this).data('ket_barang');
        var harga_barang = $(this).data('harga_barang');
        var gambar_barang = $(this).data('gambar_barang');
        var stok_barang = $(this).data('stok_barang');
        $(".modal-body#detail_body #id_produk").val(id_barang);
        $(".modal-body#detail_body #nama_barang").val(nama_barang);
        $(".modal-body#detail_body #id_kategori").val(jenis_barang);
        $(".modal-body#detail_body #ukuran_barang").val(ukuran_barang);
        $(".modal-body#detail_body #berat_barang").val(berat_barang);
        $(".modal-body#detail_body #ket_barang").val(ket_barang);
        $(".modal-body#detail_body #harga_barang").val(harga_barang);
        $(".modal-body#detail_body #foto_lama").val(gambar_barang);
        $(".modal-body#detail_body #stok_barang").val(stok_barang);
    })
</script>