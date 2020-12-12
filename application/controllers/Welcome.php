<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$data_barang  = $this->select_model->getAllBarang();
		$data_barang_teratas  = $this->select_model->getAllBarangFavorit();
		if ($cek_data > 0) :
			$id_pelanggan = $cek_data['id_pelanggan'];
			$data_trolly = $this->select_model->getDataTrolly($id_pelanggan);
			$total_belanaja = $this->select_model->getDataHargaTrolly($id_pelanggan);
			$data = array(
				'folder'      => 'halaman_utama',
				'halaman' 	  => 'index',
				// Halaman Data Barang
				'data_barang' => $data_barang,
				// Data Barang Favorit
				'data_barang_teratas' => $data_barang_teratas,
				'data_pelanggan' => $cek_data,
				'data_kategori' => $data_kategori,
				'data_trolly' => $data_trolly,
				'total_belanaja' => $total_belanaja
			);
			$this->load->view('pelanggan/include/index', $data);
		else :
			$data = array(
				'folder'      => 'halaman_utama',
				'halaman' 	  => 'index',
				// Halaman Data Barang
				'data_barang' => $data_barang,
				// Data Barang Favorit
				'data_barang_teratas' => $data_barang_teratas,
				'data_pelanggan' => $cek_data,
				'data_kategori' => $data_kategori
			);
			$this->load->view('pelanggan/include/index', $data);
		endif;
	}
	public function login()
	{
		$cek_data = $this->db->get_where('tb_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
		if ($cek_data > 0) :
			redirect('pelanggan');
		else :
			$this->load->view('pelanggan/halaman_utama/login');
		endif;
	}
	public function cek_login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$cek_login = $this->db->get_where('tb_pelanggan', ['username' => $username, 'password' => $password])->row_array();
		if ($cek_login > 0) :
			$data_login = [
				'id_pelanggan' => $cek_login['id_pelanggan'],
				'username' => $cek_login['username'],
				'nama_lengkap' => $cek_login['nama_lengkap'],
				'email' => $cek_login['email'],
				'telepon' => $cek_login['telepon'],
				'alamat' => $cek_login['alamat']
			];
			$this->session->set_userdata($data_login);
			echo "<script>
			alert('Selamat Datang Pelanggan!');
			window.location = 'pelanggan'
		  </script>";
		else :
			echo "<script>
			alert('Warning! Password atau Username Salah!');
			window.location = 'login-pelanggan'
		  </script>";
		endif;
	}
	public function daftar()
	{
		$cek_data = $this->db->get_where('tb_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
		if ($cek_data > 0) :
			redirect('pelanggan');
		else :
			$this->load->view('pelanggan/halaman_utama/daftar');
		endif;
	}
	public function cruddaftar()
	{
		$username = $this->input->post('username');
		$cek_data = $this->db->get_where('tb_pelanggan', ['username' => $username])->row_array();
		if ($cek_data > 0) :
			echo "<script>
			alert('Warning! Username sudah digunakan!');
			window.location = 'login-pelanggan'
		  </script>";
		else :
			$max_code = $this->select_model->cek_id_max();
			$max_kode = $max_code['max_kode'];
			$this->insert_model->tambah_pelanggan($max_kode);
			echo "<script>
			alert('Berhasil! Silahkan Login!');
			window.location = 'login-pelanggan'
		  </script>";
		endif;
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
