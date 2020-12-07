<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerBarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan/insert_model');
        $this->load->model('pelanggan/select_model');
        $this->load->model('pelanggan/update_model');
    }
    public function kategori($id)
    {
        $cek_data = $this->db->get_where('tb_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
        $data_kategori_barang = $this->db->get_where('tb_barang', ['jenis_barang' => $id])->result();
        $data_kategori = $this->select_model->getAllKategori();
        if ($cek_data > 0) :
            $id_pelanggan = $cek_data['id_pelanggan'];
            $data_trolly = $this->select_model->getDataTrolly($id_pelanggan);
            $total_belanaja = $this->select_model->getDataHargaTrolly($id_pelanggan);
            $data = array(
                'folder'      => 'produk',
                'halaman'       => 'kategori',
                'data_pelanggan' => $cek_data,
                'data_kategori_barang' => $data_kategori_barang,
                'data_kategori' => $data_kategori,
                'data_trolly' => $data_trolly,
                'total_belanaja' => $total_belanaja
            );
            $this->load->view('pelanggan/include/index', $data);
        else :
            $data = array(
                'folder'      => 'produk',
                'halaman'       => 'kategori',
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
        $detail_barang = $this->db->get_where('tb_barang', ['id_barang' => $id])->row_array();
        if ($cek_data > 0) :
            $id_pelanggan = $cek_data['id_pelanggan'];
            $data_trolly = $this->select_model->getDataTrolly($id_pelanggan);
            $total_belanaja = $this->select_model->getDataHargaTrolly($id_pelanggan);
            $data = array(
                'folder'      => 'produk',
                'halaman'       => 'produk',
                'data_pelanggan' => $cek_data,
                'data_kategori' => $data_kategori,
                'detail_barang' => $detail_barang,
                'data_trolly' => $data_trolly,
                'total_belanaja' => $total_belanaja
            );
            $this->load->view('pelanggan/include/index', $data);
        else :
            $data = array(
                'folder'      => 'produk',
                'halaman'       => 'produk',
                'data_pelanggan' => $cek_data,
                'data_kategori' => $data_kategori,
                'detail_barang' => $detail_barang
            );
            $this->load->view('pelanggan/include/index', $data);
        endif;
    }
    public function crudcart()
    {
        if (isset($_POST['tambah_trolly'])) :
            $id_pelanggan = $this->input->post('id_pelanggan');
            $id_barang    = $this->input->post('id_barang');
            $cek_trolly   = $this->db->get_where('tb_trolly', ['id_pelanggan' => $id_pelanggan, 'id_barang' => $id_barang])->row_array();
            if ($cek_trolly > 0) :
                $id_trolly  = $cek_trolly['id_trolly'];
                $jml_barang = $cek_trolly['jumlah'];
                $this->update_model->ubah_trolly($id_trolly, $jml_barang);
                redirect('detail_barang/' . $id_barang . '');
            else :
                $this->insert_model->tambah_trolly();
                redirect('detail_barang/' . $id_barang . '');
            endif;
        endif;
    }

    public function hapuscart($id)
    {
        $this->db->delete('tb_trolly', array('id_trolly' => $id));
        redirect('pelanggan/cart');
    }
}
        
    /* End of file  ControllerBarang.php */
