<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdminGudang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/insert_model');
        $this->load->model('admin/select_model');
        $this->load->model('admin/update_model');
    }
    public function kategori()
    {
        $cek_data = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            $data_kategori = $this->select_model->getAllKategori();
            $jml_produk    = $this->select_model->getJmlProdukKategori();
            // echo '<pre>';
            // var_dump($data_kategori);
            // die;
            $data = array(
                'folder'  => 'gudang',
                'halaman' => 'data_kategori',
                // Halaman data kategori
                'data_kategori' => $data_kategori,
                'jml_produk' => $jml_produk
            );
            $this->load->view('admin/include/index', $data);
        else :
            $this->load->view('admin/login');
        endif;
    }
    public function produk()
    {
        $cek_data = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            $data_produk   = $this->select_model->getDataProduk();
            $data_kategori = $this->select_model->getAllKategori();
            $data = array(
                'folder'  => 'gudang',
                'halaman' => 'data_produk',
                // Halaman Data Produk
                'data_produk' => $data_produk,
                'data_kategori' => $data_kategori
            );
            $this->load->view('admin/include/index', $data);
        else :
            $this->load->view('admin/login');
        endif;
    }
    public function crudproduk()
    {
        if (isset($_POST['tambah_kategori'])) {
            $kd_kategori = $this->select_model->getKodeKategori();
            $max_code = $kd_kategori['max_kode'];
            $this->insert_model->tambah_kategori($max_code);
            redirect('admin/gudang/kategori');
            # code...
        }
        if (isset($_POST['ubah_kategori'])) {
            $this->update_model->ubah_kategori();
            redirect('admin/gudang/kategori');
            # code...
        }
        if (isset($_POST['tambah_produk'])) {
            # code...
            $kd_produk = $this->select_model->getKodeProduk();
            $max_code = $kd_produk['max_kode'];
            $this->insert_model->tambah_produk($max_code);
            redirect('admin/gudang/produk');
        }
        if (isset($_POST['ubah_produk'])) {
            # code...
            $this->update_model->ubah_produk();
            redirect('admin/gudang/produk');
        }
        if (isset($_POST['hapus_produk'])) {
            # code...
            $this->update_model->hapus_produk();
            redirect('admin/gudang/produk');
        }
    }
}
        
    /* End of file  ControllerAdminGudang.php */
