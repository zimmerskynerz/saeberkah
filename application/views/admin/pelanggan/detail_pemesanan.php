<div class="modal fade" id="pemesanan_detail" tabindex="-1" role="dialog" aria-labelledby="pemesanan_detailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pemesanan_detailTitle">
                    Konfirmasi Pemesanan!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/pelanggan/crudpelanggan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label for="">Kode Pemesanan</label>
                    <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" placeholder="Masukkan Username" readonly>
                </div>
                <div class="form-group">
                    <label for="">No Resi</label>
                    <input type="text" class="form-control" id="no_resi" name="no_resi" placeholder="Masukkan Nomor Resi" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="proses_kirim" name="proses_kirim" class="btn btn-primary">Proses Kirim</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Form Ajax Kategori Juri -->
<script type="text/javascript">
    $(document).on("click", "#detail_pemesanan", function() {
        var id_pemesanan = $(this).data('id_pemesanan');
        $(".modal-body#detail_body #id_pemesanan").val(id_pemesanan);
    })
</script>