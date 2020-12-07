<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/insert_model');
        $this->load->model('admin/select_model');
        $this->load->model('admin/update_model');
    }
    public function index()
    {
        $cek_data = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            $data_pesanan = $this->select_model->getDataPesanan();
            $jml_pesanan = count($this->select_model->getJmlPesanan());

            $data_pelanggan = $this->select_model->getAllPelanggan();
            $jumlah_pelanggan = count($data_pelanggan);
            $data = array(
                'folder'  => 'beranda',
                'halaman' => 'index',
                // Halaman Pesanan
                'data_pesanan' => $data_pesanan,
                'jumlah_pesanan' => $jml_pesanan,
                'jumlah_pelanggan' => $jumlah_pelanggan

            );
            $this->load->view('admin/include/index', $data);
        else :
            redirect('login-admin');
        endif;
    }
    public function profile()
    {
        $cek_data = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            $data = array(
                'folder'  => 'beranda',
                'halaman' => 'profile'
            );
            $this->load->view('admin/include/index', $data);
        else :
            redirect('login-admin');
        endif;
    }
    public function login()
    {
        $cek_data = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            redirect('admin');
        else :
            $this->load->view('admin/login');
        endif;
    }
    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $cek_login = $this->db->get_where('tb_admin', ['username' => $username, 'password' => $password])->row_array();
        if ($cek_login > 0) :
            $data_login = [
                'id_admin' => $cek_login['id_admin'],
                'username' => $cek_login['username'],
                'nm_lengkap' => $cek_login['nm_lengkap'],
                'email' => $cek_login['email'],
                'telepon' => $cek_login['telepon']
            ];
            $this->session->set_userdata($data_login);
            redirect('admin');
        else :
            redirect('login-admin');
        endif;
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login-admin');
    }
}
        
    /* End of file  ControllerAdmin.php */
