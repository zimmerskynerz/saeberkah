<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerMenuAdmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/insert_model');
        $this->load->model('admin/select_model');
        $this->load->model('admin/update_model');
    }
    public function admin()
    {
        $cek_data = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            $id_admin = $cek_data['id_admin'];
            $data_admin = $this->select_model->getDataAdmin($id_admin);
            $data = array(
                'folder'  => 'admin',
                'halaman' => 'data_admin',
                // Halaman Admin
                'data_admin' => $data_admin
            );
            $this->load->view('admin/include/index', $data);
        else :
            $this->load->view('admin/login');
        endif;
    }
    public function laporan()
    {
        $cek_data = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            if (isset($_POST['cek_laporan'])) :
                $bulan = htmlentities($this->input->post('bulan'));
                $tahun = htmlentities($this->input->post('tahun'));
                $data_laporan = $this->select_model->getLaporanBulan($bulan, $tahun);
                $data_pelanggan = $this->select_model->getAllPelanggan();
                $jumlah_pesanan = count($data_laporan);
                $jumlah_pelanggan = count($data_pelanggan);
                $data_pemasukkan = $this->select_model->getTotalPemasukkan($bulan, $tahun);
                // echo '<pre>';
                // var_dump($data_laporan);die;
                $data = array(
                    'folder'  => 'admin',
                    'halaman' => 'data_laporan',
                    // Halaman Data
                    'data_laporan' => $data_laporan,
                    'jumlah_pesanan' => $jumlah_pesanan,
                    'jumlah_pelanggan' => $jumlah_pelanggan,
                    'total_sub_bayar' => $data_pemasukkan
                );
                $this->load->view('admin/include/index', $data);
                elseif(isset($_POST['cetak'])):
                    $bulan = htmlentities($this->input->post('bulan'));
                    $tahun = htmlentities($this->input->post('tahun'));
                    $data_laporan = $this->select_model->getLaporanBulan($bulan, $tahun);
                    $data_pelanggan = $this->select_model->getAllPelanggan();
                    $jumlah_pesanan = count($data_laporan);
                    $jumlah_pelanggan = count($data_pelanggan);
                    $data_pemasukkan = $this->select_model->getTotalPemasukkan($bulan, $tahun);
                    $akhir_bayar = $this->select_model->akhir_bayar($bulan, $tahun);
                    // echo '<pre>';
                    // var_dump($akhir_bayar);die;
                    $data = array(
                        // Halaman Data
                        'data_laporan' => $data_laporan,
                        'jumlah_pesanan' => $jumlah_pesanan,
                        'jumlah_pelanggan' => $jumlah_pelanggan,
                        'total_sub_bayar' => $data_pemasukkan,
                        'akhir_bayar' => $akhir_bayar
                    );
                    $this->load->view('admin/admin/data_cetak', $data);
            else :
                $bulan = date('m');
                $tahun = date('Y');
                $data_laporan = $this->select_model->getLaporanBulan($bulan, $tahun);
                $data_pelanggan = $this->select_model->getAllPelanggan();
                $jumlah_pesanan = count($data_laporan);
                $jumlah_pelanggan = count($data_pelanggan);
                $data_pemasukkan = $this->select_model->getTotalPemasukkan($bulan, $tahun);
                // echo '<pre>';
                // var_dump($data_laporan);die;
                $data = array(
                    'folder'  => 'admin',
                    'halaman' => 'data_laporan',
                    // Halaman Data
                    'data_laporan' => $data_laporan,
                    'jumlah_pesanan' => $jumlah_pesanan,
                    'jumlah_pelanggan' => $jumlah_pelanggan,
                    'total_sub_bayar' => $data_pemasukkan
                );
                $this->load->view('admin/include/index', $data);
            endif;
        else :
            $this->load->view('admin/login');
        endif;
    }
    public function detail_laporan($id)
    {
        $cek_data = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data > 0) :
            $detail_laporan = $this->select_model->getRinciLaporan($id);
            
            $data = array(
                'folder'  => 'admin',
                'halaman' => 'rinci_laporan',
                // Halaman Data
                'detail_laporan' => $detail_laporan,
                'id' => $id
            );
            $this->load->view('admin/include/index', $data);
            else :
                $this->load->view('admin/login');
            endif;

    }
    public function crudadmin()
    {
        if (isset($_POST['tambah_admin'])) :
            # code...
            $kd_admin = $this->select_model->getKodeAdmin();
            $max_code = $kd_admin['max_kode'];
            $this->insert_model->tambah_admin($max_code);
            redirect('admin/menu_admin/admin');
        endif;
        if (isset($_POST['ubah_admin'])) :
            $this->update_model->ubah_admin();
            redirect('admin/menu_admin/admin');
        endif;
        if (isset($_POST['reset_pass'])) :
            $this->update_model->reset_pass();
            redirect('admin/menu_admin/admin');
        endif;
        if (isset($_POST['hapus_admin'])) :
            $this->update_model->hapus_admin();
            redirect('admin/menu_admin/admin');
        endif;
    }
}
        
    /* End of file  ControllerMenuAdmin.php */
