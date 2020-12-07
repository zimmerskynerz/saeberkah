<?php defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    // 
    function tambah_pelanggan($max_kode)
    {
        $max_id = $max_kode;
        $max_fix = (int) substr($max_id, 1, 4);
        $max_id_pelanggan = $max_fix + 1;
        $id_pelanggan = "U" . sprintf("%04s", $max_id_pelanggan);
        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'username'     => $this->input->post('username'),
            'password'     => md5($this->input->post('password')),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email'        => $this->input->post('email'),
            'telepon' => $this->input->post('nomer_hp'),
            'alamat' => $this->input->post('alamat')
        );
        $this->db->insert('tb_pelanggan', $data);
    }
    function tambah_trolly()
    {
        $harga_barang = $this->input->post('harga_barang');
        $jml_beli     = $this->input->post('jml_beli');
        $total_harga  = $harga_barang * $jml_beli;
        $data = array(
            'id_trolly' => '',
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_barang' => $this->input->post('id_barang'),
            'jumlah' => $jml_beli,
            'total_harga' => $total_harga
        );
        $this->db->insert('tb_trolly', $data);
    }
}
