<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Menu Milik Admin
// Menu Dashboard Admin
$route['admin']                                         = 'admin/ControllerAdmin/index';
$route['admin/beranda']                                 = 'admin/ControllerAdmin/index';
$route['login-admin']                                   = 'admin/ControllerAdmin/login';
$route['admin-cek_login']                               = 'admin/ControllerAdmin/cek_login';
// Menu Pelanggan
$route['admin/pelanggan/pelanggan']                     = 'admin/ControllerAdminPelanggan/pelanggan';
$route['admin/pelanggan/pesanan']                       = 'admin/ControllerAdminPelanggan/pesanan';
$route['admin/pelanggan/crudpelanggan']                 = 'admin/ControllerAdminPelanggan/crudpelanggan';
// Menu Gudang
$route['admin/gudang/kategori']                         = 'admin/ControllerAdminGudang/kategori';
$route['admin/gudang/produk']                           = 'admin/ControllerAdminGudang/produk';
$route['admin/gudang/crudproduk']                       = 'admin/ControllerAdminGudang/crudproduk';
// Menu Admin
$route['admin/menu_admin/admin']                        = 'admin/ControllerMenuAdmin/admin';
$route['admin/menu_admin/laporan']                      = 'admin/ControllerMenuAdmin/laporan';
$route['admin/menu_admin/detail_laporan/(:any)']        = 'admin/ControllerMenuAdmin/detail_laporan/$1';
$route['admin/menu_admin/crudadmin']                    = 'admin/ControllerMenuAdmin/crudadmin';
// Menu Profile
$route['admin/profile']                                 = 'admin/ControllerAdmin/profile';
$route['admin/profile/crudprofile']                     = 'admin/ControllerAdmin/crudprofile';
// Menu Logout
$route['admin/logout']                                  = 'admin/ControllerAdmin/logout';

// Menu Milik Pelanggan
// Menu Halaman Utama Tanpa Login
$route['/']                                             = 'welcome/index';
$route['pelanggan-logout']                              = 'welcome/logout';
$route['login-pelanggan']                               = 'welcome/login';
$route['pelanggan-cek_login']                           = 'welcome/cek_login';
$route['pelanggan-cruddaftar']                          = 'welcome/cruddaftar';
$route['pelanggan-daftar']                              = 'welcome/daftar';
// Menu Produk Kategori
$route['pelanggan/kategori/(:any)']                     = 'pelanggan/ControllerBarang/kategori/$1';
$route['detail_barang/(:any)']                          = 'pelanggan/ControllerBarang/detail_barang/$1';
$route['tambah_trolly/crudcart']                        = 'pelanggan/ControllerBarang/crudcart';
// Menu Keranjang Pelanggan
$route['pelanggan/cart']                                = 'pelanggan/ControllerKeranjang/index';
$route['pelanggan/raja_ongkir']                         = 'pelanggan/ControllerKeranjang/raja_ongkir';
