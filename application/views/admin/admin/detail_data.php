<!-- Tambah Kategori -->
<div class="modal fade" id="admin_detail">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renew_detailLabel">Detail Admin!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/menu_admin/crudadmin'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan Username Admin" readonly>
                    <input type="text" class="form-control" id="id_admin" name="id_admin" required hidden>
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
                <button type="submit" class="btn btn-danger" id="hapus_admin" name="hapus_admin">Hapus</button>
                <button type="submit" class="btn btn-warning" id="reset_pass" name="reset_pass">Reset Password</button>
                <button type="submit" class="btn btn-primary" id="ubah_admin" name="ubah_admin">Perbarui</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_admin", function() {
        var username = $(this).data('username');
        var id_admin = $(this).data('id_admin');
        var nama_lengkap = $(this).data('nama_lengkap');
        var email = $(this).data('email');
        var telepon = $(this).data('telepon');
        $(".modal-body#detail_body #username").val(username);
        $(".modal-body#detail_body #id_admin").val(id_admin);
        $(".modal-body#detail_body #nama_lengkap").val(nama_lengkap);
        $(".modal-body#detail_body #email").val(email);
        $(".modal-body#detail_body #telepon").val(telepon);
    })
</script>