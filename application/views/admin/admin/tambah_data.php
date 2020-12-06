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
                <button type="submit" class="btn btn-warning" id="tambah_kategori" name="tambah_kategori">Perbarui Data</button>
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
                <?php echo form_open_multipart('admin/menu_admin/crudadmin'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan Username Admin">
                </div>
                <div class="form-group mb-4">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan Password Admin">
                </div>
                <div class="form-group mb-4">
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required placeholder="Masukkan Nama Lengkap Admin">
                </div>
                <div class="form-group mb-4">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan Email Admin">
                </div>
                <div class="form-group mb-4">
                    <label for="">Telepon</label>
                    <input type="number" class="form-control" id="telepon" name="telepon" required placeholder="Masukkan No Telepon Admin">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-primary" id="tambah_admin" name="tambah_admin">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>