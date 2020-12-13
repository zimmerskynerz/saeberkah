<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerKonfirmasi extends CI_Controller
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
        $data_kategori = $this->select_model->getAllKategori();
        if ($cek_data > 0) :
            $id_pelanggan = $cek_data['id_pelanggan'];
            $data_trolly = $this->select_model->getDataTrolly($id_pelanggan);
            $total_belanaja = $this->select_model->getDataHargaTrolly($id_pelanggan);
            $data_transaksi = $this->select_model->getDataTrasnsaksi($id_pelanggan);
            $data = array(
                'folder'      => 'konfirmasi',
                'halaman'       => 'index',
                'data_pelanggan' => $cek_data,
                'data_kategori' => $data_kategori,
                'data_trolly' => $data_trolly,
                'total_belanaja' => $total_belanaja,
                'data_transaksi' => $data_transaksi
            );
            $this->load->view('pelanggan/include/index', $data);
        else :
            redirect('/');
        endif;
    }
    public function detail($id)
    {
        $cek_data = $this->db->get_where('tb_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
        $data_kategori = $this->select_model->getAllKategori();
        $id_pemesanan = $id;
        $detail_beli = $this->select_model->getDataTransaksi($id_pemesanan);
        if ($cek_data > 0) :
            $cek_konfirmasi = $this->db->get_where('tb_konfirmasi', ['id_pemesanan' => $id_pemesanan])->row_array();
            $data_pemesanan = $this->db->get_where('tb_pemesanan', ['id_pemesanan' => $id_pemesanan])->row_array();
            if ($cek_konfirmasi > 0) :
                $id_pelanggan = $cek_data['id_pelanggan'];
                $data_trolly = $this->select_model->getDataTrolly($id_pelanggan);
                $total_belanaja = $this->select_model->getDataHargaTrolly($id_pelanggan);
                $data_transaksi = $this->select_model->getDataTrasnsaksi($id_pelanggan);
                $data = array(
                    'folder'      => 'konfirmasi',
                    'halaman'       => 'diterima',
                    'data_pelanggan' => $cek_data,
                    'data_kategori' => $data_kategori,
                    'data_trolly' => $data_trolly,
                    'total_belanaja' => $total_belanaja,
                    'data_transaksi' => $data_transaksi,
                    'id_pemesanan' => $id_pemesanan,
                    'detail_beli' => $detail_beli,
                    'data_pemesanan' => $data_pemesanan
                );
                $this->load->view('pelanggan/include/index', $data);
            else :
                $id_pelanggan = $cek_data['id_pelanggan'];
                $data_trolly = $this->select_model->getDataTrolly($id_pelanggan);
                $total_belanaja = $this->select_model->getDataHargaTrolly($id_pelanggan);
                $data_transaksi = $this->select_model->getDataTrasnsaksi($id_pelanggan);
                $data = array(
                    'folder'      => 'konfirmasi',
                    'halaman'       => 'pembayaran',
                    'data_pelanggan' => $cek_data,
                    'data_kategori' => $data_kategori,
                    'data_trolly' => $data_trolly,
                    'total_belanaja' => $total_belanaja,
                    'data_transaksi' => $data_transaksi,
                    'id_pemesanan' => $id_pemesanan,
                    'detail_beli' => $detail_beli,
                    'data_pemesanan' => $data_pemesanan
                );
                $this->load->view('pelanggan/include/index', $data);
            endif;
        else :
            redirect('/');
        endif;
    }
    public function crudkonfirmasi()
    {
        if (isset($_POST['konfirmasi_bayar'])) :
            $this->insert_model->konfirmasiBayar();
            $this->update_model->konfirmasiBayar();
            $id_pemesanan = $this->input->post('id_pemesanan');
            $this->_KonfirmasiWaSend($id_pemesanan);
            redirect('pelanggan/konfirmasi');
        endif;
        if (isset($_POST['konfirmasi_terima'])) :
            $this->update_model->konfirmasiTerima();
            $id_pemesanan = $this->input->post('id_pemesanan');
            $this->_KonfirmasiWa($id_pemesanan);
            redirect('pelanggan/konfirmasi');
        endif;
    }
    private function _KonfirmasiWaSend($id_pemesanan)
    {
        $data_pemesanan = $this->db->get_where('tb_pemesanan', ['id_pemesanan', $id_pemesanan])->row_array();
        $nama_penerima  = $data_pemesanan['nama_penerima'];
        $total_bayar  = $data_pemesanan['total_bayar'];

        $userkey = 'ko394x';
        $passkey = 'fotinq1g7q';
        $telepon = '082227951853';
        $message = 'Halo, ada pesanan baru dari' . $nama_penerima . ' kode transaksi ' . $id_pemesanan . '. ' . PHP_EOL . ' Silahkan login kedalam sistem untuk konfirmasi pemesanan.';
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }
    private function _KonfirmasiWa($id_pemesanan)
    {
        $data_pemesanan = $this->db->get_where('tb_pemesanan', ['id_pemesanan', $id_pemesanan])->row_array();
        $nama_penerima  = $data_pemesanan['nama_penerima'];

        $userkey = 'ko394x';
        $passkey = 'fotinq1g7q';
        $telepon = '082227951853';
        $message = 'Halo, pesanan baru dari' . $nama_penerima . ' kode transaksi ' . $id_pemesanan . '. ' . PHP_EOL . ' Diterima.';
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }
}
        
    /* End of file  ControllerKonfirmasi.php */
