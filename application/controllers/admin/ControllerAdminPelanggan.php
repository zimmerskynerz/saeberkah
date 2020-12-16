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
            // var_dump($data_pesanan);
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
            $this->_KirimNotif();
            redirect('admin/pelanggan/pesanan');
        endif;
    }
    private function _KirimNotif()
    {
        $data_pemesanan = $this->db->get_where('tb_pemesanan', ['id_pemesanan', $this->input->post('id_pemesanan')])->row_array();
        $id_pemesanan = $data_pemesanan['id_pemesanan'];
        $no_resi  = $this->input->post('no_resi');
        $nomer_telepon = $data_pemesanan['telepon_penerima'];
        $userkey = 'ko394x';
        $passkey = 'fotinq1g7q';
        $telepon = $nomer_telepon;
        $message = 'Selamat, transaksi anda ' . $id_pemesanan . ' sudah dikonfirmasi dan sudah dikirim dengan no resi' . $no_resi . '.' . PHP_EOL . 'Jika masih ada pertanyaan soal transaksi tersebut, silahkan menghubungi admin saeberkah. ' . PHP_EOL . 'Terima Kasih.';
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
        
    /* End of file  ControllerAdminPelanggan.php */
