<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdminPelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/insert_model');
        $this->load->model('admin/select_model');
        $this->load->model('admin/update_model');
    }
    public function pelanggan()
    {
        $cek_data = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            $data_pelanggan = $this->select_model->getAllPelanggan();
            // echo '<pre>';
            // var_dump($data_pelanggan);
            // die;
            $jml_pelanggan = count($data_pelanggan);
            $data = array(
                'folder'  => 'pelanggan',
                'halaman' => 'data_pelanggan',
                // Halaman Pelanggan
                'data_pelanggan' => $data_pelanggan,
                'jml_pelanggan'  => $jml_pelanggan
            );
            $this->load->view('admin/include/index', $data);
        else :
            $this->load->view('admin/login');
        endif;
    }
    public function pesanan()
    {
        $cek_data = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            $data_pesanan = $this->select_model->getDataPesanan();
            $jml_pesanan = count($this->select_model->getJmlPesanan());
            // echo '<pre>';
            // var_dump($jml_pesanan);
            // die;
            $data = array(
                'folder'  => 'pelanggan',
                'halaman' => 'data_pesanan',
                // Halaman Pesanan
                'data_pesanan' => $data_pesanan,
                'jml_pesanan' => $jml_pesanan
            );
            $this->load->view('admin/include/index', $data);
        else :
            $this->load->view('admin/login');
        endif;
    }
    public function crudpelanggan()
    {
        if (isset($_POST['proses_kirim'])) :
            $this->update_model->kirimBarang();
            redirect('admin/pelanggan/pesanan');
        endif;
    }
}
        
    /* End of file  ControllerAdminPelanggan.php */
