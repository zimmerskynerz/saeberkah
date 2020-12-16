<?php defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    function getAllPelanggan()
    {
        $query  = $this->db->select('*, count(A.id_pelanggan) as jml_transaksi, A.id_pelanggan as kd_pelanggan');
        $query  = $this->db->from('tb_pelanggan as A');
        $query  = $this->db->join('tb_pemesanan as B', 'A.id_pelanggan=B.id_pelanggan');
        $query  = $this->db->group_by('A.id_pelanggan');
        $query  = $this->db->get();
        return  $query->result();
    }
    function getDataPesanan()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tb_pemesanan as A');
        $query  = $this->db->join('tb_konfirmasi as B', 'A.id_pemesanan=B.id_pemesanan');
        $query  = $this->db->get();
        return  $query->result();
    }
    function getJmlPesanan()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tb_pemesanan as A');
        $query  = $this->db->join('tb_konfirmasi as B', 'A.id_pemesanan=B.id_pemesanan');
        $query  = $this->db->where('A.status', 'Konfirmasi');
        $query  = $this->db->get();
        return  $query->result();
    }
    function getAllKategori()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tb_kategori');
        $query  = $this->db->get();
        return $query->result();
    }
    function getJmlProdukKategori()
    {
        $query  = $this->db->select('jenis_barang, count(*) as jml_barang');
        $query  = $this->db->from('tb_barang as A');
        $query  = $this->db->join('tb_kategori as B', 'A.jenis_barang=B.id_kategori');
        $query  = $this->db->group_by('A.jenis_barang');
        $query  = $this->db->get();
        return $query->result();
    }
    function getKodeKategori()
    {
        $query  = $this->db->select('max(id_kategori) as max_kode');
        $query  = $this->db->from('tb_kategori');
        $query  = $this->db->get();
        return $query->row_array();
    }
    function getDataProduk()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tb_barang');
        $query  = $this->db->get();
        return $query->result();
    }
    function getKodeProduk()
    {
        $query  = $this->db->select('max(id_barang) as max_kode');
        $query  = $this->db->from('tb_barang');
        $query  = $this->db->get();
        return $query->row_array();
    }
    function getKodeAdmin()
    {
        $query  = $this->db->select('max(id_admin) as max_kode');
        $query  = $this->db->from('tb_admin');
        $query  = $this->db->get();
        return $query->row_array();
    }
    function getDataAdmin($id_admin)
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tb_admin');
        $query  = $this->db->where('id_admin !=', $id_admin);
        $query  = $this->db->get();
        return $query->result();
    }
    // Ambil Data Laporan
    // SELECT SUM(sub_bayar) AS total_sub_bayar, SUM(ongkir) AS total_ongkir, SUM(total_bayar) AS total_sum_bayar FROM tb_pemesanan WHERE MONTH(tgl_pesan)='$bulan' AND YEAR(tgl_pesan)='$tahun'
    function getLaporanBulan($bulan, $tahun)
    {
        $query  = $this->db->select('*, SUM(sub_bayar) AS total_sub_bayar, SUM(ongkir) AS total_ongkir, SUM(total_bayar) AS total_sum_bayar');
        $query  = $this->db->from('tb_pemesanan');
        $query  = $this->db->where('no_resi !=', null);
        $query  = $this->db->where('MONTH(tgl_pesan)', $bulan);
        $query  = $this->db->where('YEAR(tgl_pesan)', $tahun);
        $query  = $this->db->group_by('id_pemesanan');
        $query  = $this->db->get();
        return $query->result();
    }
    function getRinciLaporan($id)
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tb_detail_pemesanan as A');
        $query  = $this->db->join('tb_barang as B', 'A.id_barang=B.id_barang');
        $query  = $this->db->where('id_pemesanan', $id);
        $query  = $this->db->get();
        return $query->result();
    }
    function getTotalPemasukkan($bulan, $tahun)
    {
        $query  = $this->db->select('SUM(sub_bayar) AS total_sub_bayar');
        $query  = $this->db->from('tb_pemesanan');
        $query  = $this->db->where('no_resi !=', null);
        $query  = $this->db->where('MONTH(tgl_pesan)', $bulan);
        $query  = $this->db->where('YEAR(tgl_pesan)', $tahun);
        $query  = $this->db->get();
        return $query->row_array();
    }
    function akhir_bayar($bulan, $tahun)
    {
        $query  = $this->db->select('SUM(sub_bayar) AS total_sub_bayar, SUM(ongkir) AS total_ongkir, SUM(total_bayar) as total_sum_bayar');
        $query  = $this->db->from('tb_pemesanan');
        $query  = $this->db->where('MONTH(tgl_pesan)', $bulan);
        $query  = $this->db->where('YEAR(tgl_pesan)', $tahun);
        $query  = $this->db->get();
        return $query->row_array();
    }
}
