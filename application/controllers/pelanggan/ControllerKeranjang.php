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
    public function raja_ongkir()
    {
        $kota_asal = '113';
        $id_kabupaten = $this->input->post('kab_id');;
        $kurir = $this->input->post('kurir');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $kota_asal . "&destination=" . $id_kabupaten . "&weight=10000&courier=" . $kurir . "",
            CURLOPT_HTTPHEADER => array(
                'content-type: application/x-www-form-urlencoded',
                'key: fddeab3d6d3e203bb4c1f16f74c6e6c0'
            ),
        ));
        $response = curl_exec($curl);
        $nilai = json_decode($response, true);
        $k = 0;
        $i = 1;
        $ongkir = $nilai['rajaongkir']['results'][$k]['costs'][$i]['cost'][$k]['value'];
        $hg_total  = $ongkir + 260000;
        echo $hg_total;
        // echo $ongkir;
    }
}
        
    /* End of file  ControllerKeranjang.php */
