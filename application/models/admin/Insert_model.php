<?php defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    // Tambah Data Guru
    function tambah_kategori($max_code)
    {
        $max_id = $max_code;
        $max_fix = (int) substr($max_id, 1, 2);
        $max_id_kategori = $max_fix + 1;
        $id_kategori = "K" . sprintf("%02s", $max_id_kategori);
        $data = array(
            'id_kategori'   => $id_kategori,
            'nama_kategori' => htmlentities($this->input->post('nm_kategori'))
        );
        $this->db->insert('tb_kategori', $data);
    }
    function tambah_produk($max_code)
    {
        $max_id = $max_code;
        $max_fix = (int) substr($max_id, 1, 4);
        $max_id_barang = $max_fix + 1;
        $config['upload_path']   = './assets/images/products';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf|doc|docx|ppt|pptx|zip|rar';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('customFile')) :
            $_FILES['file']['name'] = $_FILES['customFile']['name'];
            $_FILES['file']['type'] = $_FILES['customFile']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['customFile']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['customFile']['size'];
            $uploadData = $this->upload->data();
            $foto = $uploadData['file_name'];
        else :
            $foto = 'default.jpg';
        endif;
        $id_barang = "B" . sprintf("%04s", $max_id_barang);
        $nama_barang = htmlentities($this->input->post('nama_barang'));
        $jenis_barang = htmlentities($this->input->post('id_kategori'));
        // Ukuran Barang
        $panjang = htmlentities($this->input->post('panjang'));
        $lebar = htmlentities($this->input->post('lebar'));
        $tinggi = htmlentities($this->input->post('tinggi'));
        $ukuran_barang = '' . $panjang . ' cm X ' . $lebar . ' cm X ' . $tinggi . ' cm';
        // Selesai
        $berat_barang = htmlentities($this->input->post('berat_barang'));
        $stok_barang = htmlentities($this->input->post('stok_barang'));
        $harga_barang = htmlentities($this->input->post('harga_barang'));
        $ket_barang = htmlentities($this->input->post('ket_barang'));
        $data = array(
            'id_barang'     => $id_barang,
            'nama_barang'   => $nama_barang,
            'jenis_barang'  => $jenis_barang,
            'ukuran_barang' => $ukuran_barang,
            'berat_barang'  => $berat_barang,
            'ket_barang'    => $ket_barang,
            'harga_barang'  => $harga_barang,
            'gambar_barang' => $foto,
            'stok_barang'   => $stok_barang
        );
        $this->db->insert('tb_barang', $data);
    }
    function tambah_admin($max_code)
    {
        $max_id = $max_code;
        $max_fix = (int) substr($max_id, 1, 2);
        $max_id_admin = $max_fix + 1;
        $id_admin = "A" . sprintf("%02s", $max_id_admin);
        $data = array(
            'id_admin' => $id_admin,
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon')
        );
        $this->db->insert('tb_admin', $data);
    }
}
