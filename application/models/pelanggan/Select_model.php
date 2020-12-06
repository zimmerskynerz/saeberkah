<?php defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    function getAllBarang()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tb_barang');
        $query  = $this->db->where('stok_barang >', 0);
        $query  = $this->db->get();
        return $query->result();
    }
    // Data Produk Terfavorit
    // SELECT *, sum(jumlah_beli) as jumlah_beli FROM `tb_barang` as `A` JOIN `tb_detail_pemesanan` as `B` ON `A`.`id_barang`=`B`.`id_barang` WHERE `A`.`stok_barang` > 0 GROUP BY `A`.id_barang ORDER BY sum(jumlah_beli) DESC
    function getAllBarangFavorit()
    {
        $query  = $this->db->select('*, sum(jumlah_beli) as jumlah_beli');
        $query  = $this->db->from('tb_barang as A');
        $query  = $this->db->join('tb_detail_pemesanan as B', 'A.id_barang=B.id_barang');
        $query  = $this->db->where('A.stok_barang >', 0);
        $query  = $this->db->group_by('A.id_barang');
        $query  = $this->db->order_by('sum(jumlah_beli)', 'desc');
        $query  = $this->db->get();
        return $query->result(); 
    }
    function cek_id_max()
    {
        $query  = $this->db->select('max(id_pelanggan) as max_kode');
        $query  = $this->db->from('tb_pelanggan');
        $query  = $this->db->get();
        return $query->row_array();
    }
    function getAllKategori()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tb_kategori');
        $query  = $this->db->get();
        return $query->result();
    }
}
