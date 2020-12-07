<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    function kirimBarang()
    {
        $id_pemesanan = htmlentities($this->input->post('id_pemesanan'));
        $data = array(
            'status' => 'Dikirim',
            'tgl_konfirmasi' => date('Y-m-d'),
            'no_resi' => $this->input->post('no_resi')
        );
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('tb_pemesanan', $data);
    }
    function ubah_kategori()
    {
        $data = array(
            'nama_kategori' => htmlentities($this->input->post('nm_kategori'))
        );
        $this->db->where('id_kategori', htmlentities($this->input->post('id_kategori')));
        $this->db->update('tb_kategori', $data);
    }
    function ubah_produk()
    {
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
            $foto = $this->input->post('foto_lama');
        endif;
        $id_barang = htmlentities($this->input->post('id_produk'));
        $nama_barang = htmlentities($this->input->post('nama_barang'));
        $jenis_barang = htmlentities($this->input->post('id_kategori'));
        $ukuran_barang = htmlentities($this->input->post('ukuran_barang'));
        $berat_barang = htmlentities($this->input->post('berat_barang'));
        $stok_barang = htmlentities($this->input->post('stok_barang'));
        $harga_barang = htmlentities($this->input->post('harga_barang'));
        $ket_barang = htmlentities($this->input->post('ket_barang'));
        $data = array(
            'nama_barang'   => $nama_barang,
            'jenis_barang'  => $jenis_barang,
            'ukuran_barang' => $ukuran_barang,
            'berat_barang'  => $berat_barang,
            'ket_barang'    => $ket_barang,
            'harga_barang'  => $harga_barang,
            'gambar_barang' => $foto,
            'stok_barang'   => $stok_barang
        );
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang', $data);
    }
    function hapus_produk()
    {
        $this->db->where('id_barang', htmlentities($this->input->post('id_produk')));
        $this->db->delete('tb_barang');
    }
    function ubah_admin()
    {
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon')
        );
        $this->db->where('id_admin', htmlentities($this->input->post('id_admin')));
        $this->db->update('tb_admin', $data);
    }
    function reset_pass()
    {
        $data = array(
            'password' => md5('admin123')
        );
        $this->db->where('id_admin', htmlentities($this->input->post('id_admin')));
        $this->db->update('tb_admin', $data);
    }
    function hapus_admin()
    {
        $this->db->where('id_admin', htmlentities($this->input->post('id_admin')));
        $this->db->delete('tb_admin');
    }
}
