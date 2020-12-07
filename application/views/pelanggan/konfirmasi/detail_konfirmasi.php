<div class="modal fade" id="pembayaran_detail" tabindex="-1" role="dialog" aria-labelledby="pembayaran_detailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pembayaran_detailTitle">
                    Konfirmasi Pembayaran!
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
                    <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $data_pelanggan['id_pelanggan'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Bank</label>
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Masukkan Nama Bank Anda" required>
                </div>
                <div class="form-group">
                    <label for="">Nomor Rekening</label>
                    <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Masukkan Nomor Rekening Bank Anda" required>
                </div>
                <div class="form-group">
                    <label for="">Atas Nama Rekening</label>
                    <input type="text" class="form-control" id="atas_nama" name="atas_nama" placeholder="Masukkan Atas Nama Rekening" required>
                </div>
                <div class="form-group">
                    <label for="">Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="konfirmasi_pembayaran" name="konfirmasi_pembayaran" class="btn btn-primary">Proses Kirim</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Form Ajax Kategori Juri -->
<script type="text/javascript">
    $(document).on("click", "#detail_pembayaran", function() {
        var id_pemesanan = $(this).data('id_pemesanan');
        $(".modal-body#detail_body #id_pemesanan").val(id_pemesanan);
    })
</script>
