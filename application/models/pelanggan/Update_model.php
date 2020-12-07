<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    function terima_rekomendasi()
    {
        $id_rekomendasi = htmlentities($this->input->post('id_rekomendasi'));
        $data = array(
            'status_rekomendasi' => 'KABID'
        );
        $this->db->where('id_rekomendasi', $id_rekomendasi);
        $this->db->update('tbl_rekomendasi', $data);
    }
    function terima_rekomendasi_perpanjang()
    {
        $id_rekomendasi = htmlentities($this->input->post('id_rekomendasi'));
        $data = array(
            'status_rekomendasi' => 'P_KABID'
        );
        $this->db->where('id_rekomendasi', $id_rekomendasi);
        $this->db->update('tbl_rekomendasi', $data);
    }
    function validasiSip()
    {
        $status_validasi = htmlentities($this->input->post('status_validasi'));
        if ($status_validasi == 'P_KASI') :
            // echo 'P_KASI';
            $id_sip = htmlentities($this->input->post('id_sip'));
            $data = array(
                'status_sip' => 'P_KABID'
            );
            $this->db->where('id_sip', $id_sip);
            $this->db->update('tbl_sip', $data);
        else :
            // echo 'KASI';
            $id_sip = htmlentities($this->input->post('id_sip'));
            $data = array(
                'status_sip' => 'KABID'
            );
            $this->db->where('id_sip', $id_sip);
            $this->db->update('tbl_sip', $data);
        endif;
    }
    function ubah_trolly($id_trolly, $jml_barang)
    {
        $harga_barang   = $this->input->post('harga_barang');
        $jml_beli       = $this->input->post('jml_beli');
        $jml_sekarang   = $jml_barang + $jml_beli;
        $total_sekarang = $jml_sekarang * $harga_barang;
        $data = array(
            'jumlah'      => $jml_sekarang,
            'total_harga' => $total_sekarang
        );
        $this->db->where('id_trolly', $id_trolly);
        $this->db->update('tb_trolly', $data);
    }
}
