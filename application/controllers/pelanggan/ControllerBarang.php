<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class ControllerBarang extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/insert_model');
        $this->load->model('admin/select_model');
        $this->load->model('admin/update_model');
    }
    public function kategori($id)
    {
        $cek_data = $this->db->get_where('tb_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
        $data_kategori_barang = $this->db->get_where('tb_barang',['jenis_barang'=>$id])->result();
        $data_kategori = $this->select_model->getAllKategori();
        if ($cek_data > 0) :
		$data = array(
			'folder'      => 'produk',
            'halaman' 	  => 'kategori',
            'data_pelanggan' => $cek_data,
            'data_kategori_barang' => $data_kategori_barang,
			'data_kategori' => $data_kategori
		);
		$this->load->view('pelanggan/include/index', $data);
		else :
			$data = array(
                'folder'      => 'produk',
                'halaman' 	  => 'kategori',
                'data_pelanggan' => $cek_data,
                'data_kategori_barang' => $data_kategori_barang,
                'data_kategori' => $data_kategori
			);
			$this->load->view('pelanggan/include/index', $data);
        endif;
    }
    public function detail_barang($id)
    {
        $cek_data = $this->db->get_where('tb_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
        $data_kategori = $this->select_model->getAllKategori();
        $detail_barang = $this->db->get_where('tb_barang', ['id_barang'=>$id])->row_array();
        if ($cek_data > 0) :
		$data = array(
			'folder'      => 'produk',
            'halaman' 	  => 'produk',
            'data_pelanggan' => $cek_data,
            'data_kategori' => $data_kategori,
            'detail_barang' => $detail_barang
		);
		$this->load->view('pelanggan/include/index', $data);
		else :
			$data = array(
                'folder'      => 'produk',
                'halaman' 	  => 'produk',
                'data_pelanggan' => $cek_data,
                'data_kategori' => $data_kategori,
                'detail_barang' => $detail_barang
			);
			$this->load->view('pelanggan/include/index', $data);
        endif;
    }
        
}
        
    /* End of file  ControllerBarang.php */
        
                            