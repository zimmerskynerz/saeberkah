<?php defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
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
    function tambah_transaksi($id_pemesanan)
    {
        $total_belanaja = $this->input->post('total_belanaja');
        $hg_total       = $this->input->post('hg_total');
        $ongkir         = $hg_total - $total_belanaja;
        $data = array(
            'id_pemesanan'  => $id_pemesanan,
            'id_pelanggan'  => $this->input->post('id_pelanggan'),
            'nama_penerima'  => $this->input->post('nama_penerima'),
            'telepon_penerima'  => $this->input->post('telepon_penerima'),
            'alamat_tujuan'  => $this->input->post('alamat_tujuan'),
            'kode_pos'  => $this->input->post('kode_pos'),
            'berat_total'  => $this->input->post('berat'),
            'ekspedisi'  => $this->input->post('kurir'),
            'no_resi' => null,
            'ongkir'  => $ongkir,
            'sub_bayar' => $total_belanaja,
            'total_bayar' => $hg_total,
            'status' => 'Belum Bayar',
            'tgl_pesan' => date('Y-m-d'),
            'tgl_bayar' => null,
            'tgl_konfirmasi' => null,
            'tgl_terima' => null
        );
        $this->db->insert('tb_pemesanan', $data);
    }
    function konfirmasiBayar()
    {
        $config['upload_path']   = './assets/images/bukti';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('bukti_pembayaran')) {
            $_FILES['file']['name'] = $_FILES['bukti_pembayaran']['name'];
            $_FILES['file']['type'] = $_FILES['bukti_pembayaran']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['bukti_pembayaran']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['bukti_pembayaran']['size'];
            $uploadData = $this->upload->data();
            $data = array(
                'id_konfirmasi' => '',
                'id_pemesanan' => htmlspecialchars($this->input->post('id_pemesanan')),
                'id_pelanggan' => htmlspecialchars($this->input->post('id_pelanggan')),
                'nama_bank' => htmlspecialchars($this->input->post('nama_bank')),
                'nomor_rekening' => htmlspecialchars($this->input->post('nomor_rekening')),
                'atas_nama' => htmlspecialchars($this->input->post('atas_nama')),
                'bukti_pembayaran' => $uploadData['file_name']
            );
            $this->db->insert('tb_konfirmasi', $data);
        }
    }
}
