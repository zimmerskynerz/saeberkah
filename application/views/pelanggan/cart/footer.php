<script>
    $.ajaxSetup({
        beforeSend: function(jqXHR, Obj) {
            var value = "; " + document.cookie;
            var parts = value.split("; csrf_cookie_name=");
            if (parts.length == 2)
                Obj.data += '&<?= $this->security->get_csrf_token_name(); ?>=' + parts.pop().split(";").shift();
        }
    });
    $('#kurir').change(function() {
        //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
        var kab = $('#kota_tujuan').val();
        var kurir = $('#kurir').val();
        var berat = $('#berat').val();
        var total_belanaja = $('#total_belanaja').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('pelanggan/raja_ongkir'); ?>',
            data: {
                'kab_id': kab,
                'kurir': kurir,
                'berat': berat,
                'total_belanaja': total_belanaja
            },
            success: function(data) {
                // console.log(data);
                //jika data berconsole.log(data);hasil didapatkan, tampilkan ke dalam element div ongkir
                $("#hg_total").val(data);
            }
        });
    });
</script>