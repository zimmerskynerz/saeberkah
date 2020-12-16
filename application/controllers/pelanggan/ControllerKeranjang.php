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
        $data_kategori = $this->select_model->getAllKategori();
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
                'data_kategori' => $data_kategori,
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
        $berat = $this->input->post('berat');
        $total_belanaja = $this->input->post('total_belanaja');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $kota_asal . "&destination=" . $id_kabupaten . "&weight=" . $berat . "&courier=" . $kurir . "",
            CURLOPT_HTTPHEADER => array(
                'content-type: application/x-www-form-urlencoded',
                'key: fddeab3d6d3e203bb4c1f16f74c6e6c0'
            ),
        ));
        $response = curl_exec($curl);
        $nilai = json_decode($response, true);
        $k = 0;
        $i = 1;
        if ($kurir == 'tiki') :
            $ongkir = $nilai['rajaongkir']['results'][$k]['costs'][$k]['cost'][$k]['value'];
        else :
            $ongkir = $nilai['rajaongkir']['results'][$k]['costs'][$i]['cost'][$k]['value'];
        endif;
        $hg_total  = $ongkir + $total_belanaja;
        echo $hg_total;
        // echo $ongkir;
    }
    public function bayar()
    {
        if (isset($_POST['bayar'])) :
            $cek_id = $this->select_model->getKodeTransaksi();
            $max_id = $cek_id['max_code'];
            $max_fix = (int) substr($max_id, -4);
            $max_id_pemesanan = $max_fix + 1;
            // var_dump($max_fix);
            // var_dump($cek_id);
            // var_dump($max_id_pemesanan);
            // die;
            $tahun = date('Y');
            $bulan = date('m');
            $tgl = date('d');
            $id_pemesanan = $tahun . $bulan . $tgl . "P" . sprintf("%04s", $max_id_pemesanan);
            $this->insert_model->tambah_transaksi($id_pemesanan);
            $cek_trolly = $this->db->get_where('tb_trolly', ['id_pelanggan' => $this->input->post('id_pelanggan')])->result();
            foreach ($cek_trolly as $Cek_trolly) :
                $data = array(
                    'id_pemesanan' => $id_pemesanan,
                    'id_barang'    => $Cek_trolly->id_barang,
                    'jumlah_beli'    => $Cek_trolly->jumlah,
                    'total_harga'    => $Cek_trolly->total_harga
                );
                $this->db->insert('tb_detail_pemesanan', $data);
            endforeach;
            $this->db->delete('tb_trolly', ['id_pelanggan' => $this->input->post('id_pelanggan')]);
            redirect('pelanggan/konfirmasi');
        endif;
    }
}
        
    /* End of file  ControllerKeranjang.php */
