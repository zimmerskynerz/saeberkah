<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerKeranjang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan/insert_model');
        $this->load->model('pelanggan/select_model');
        $this->load->model('pelanggan/update_model');
    }
    public function index()
    {
        $cek_data = $this->db->get_where('tb_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            $id_pelanggan = $cek_data['id_pelanggan'];
            $data_trolly = $this->select_model->getDataTrolly($id_pelanggan);
            $total_belanaja = $this->select_model->getDataHargaTrolly($id_pelanggan);
            $kota     = $this->select_model->getAllCity();
            // echo "<pre>";
            // var_dump($kota);
            // die;
            $data = array(
                'folder'      => 'cart',
                'halaman'       => 'index',
                'data_pelanggan' => $cek_data,
                'data_trolly' => $data_trolly,
                'total_belanaja' => $total_belanaja,
                'data_kota' => $kota
            );
            $this->load->view('pelanggan/include/index', $data);
        else :
            redirect('/');
        endif;
    }
}
        
    /* End of file  ControllerKeranjang.php */
