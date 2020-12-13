<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
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
    function konfirmasiBayar()
    {
        $data = array(
            'status' => 'Konfirmasi',
            'tgl_bayar' => date('Y-m-d')
        );
        $this->db->where('id_pemesanan', $this->input->post('id_pemesanan'));
        $this->db->update('tb_pemesanan', $data);
    }
    function konfirmasiTerima()
    {
        $data = array(
            'status' => 'Diterima',
            'tgl_terima' => date('Y-m-d')
        );
        $this->db->where('id_pemesanan', $this->input->post('id_pemesanan'));
        $this->db->update('tb_pemesanan', $data);
    }
}
