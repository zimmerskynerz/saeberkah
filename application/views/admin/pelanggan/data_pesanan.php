  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Data Pesanan</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">admin</a></li>
                          <li class="breadcrumb-item active">pelanggan</li>
                          <li class="breadcrumb-item active">pesanan</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">Daftar Pesanan Saeberkah Furniture</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th style="width: 12px; text-align: center;">No</th>
                                          <th style="text-align: center;">Kode Pesanan</th>
                                          <th style="text-align: center;">Nomor Resi</th>
                                          <th style="text-align: center;">Penerima</th>
                                          <th style="text-align: center;">Alamat</th>
                                          <th style="text-align: center;">Ekspedisi</th>
                                          <th style="text-align: center;">Total</th>
                                          <th style="text-align: center;">Status</th>
                                          <th style="text-align: center;">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1; ?>
                                      <?php foreach ($data_pesanan as $Data_pesanan) : ?>
                                          <tr>
                                              <td style="width: 12px; text-align: center;"><?= $no ?></td>
                                              <td><?= $Data_pesanan->id_pemesanan ?></td>
                                              <td><?= $Data_pesanan->no_resi ?></td>
                                              <td><?= $Data_pesanan->nama_penerima ?></td>
                                              <td><?= $Data_pesanan->alamat_tujuan ?></td>
                                              <td style="text-align: center;"><?= $Data_pesanan->ekspedisi ?> - <?= $Data_pesanan->jenis_ekspedisi ?></td>
                                              <td style="text-align: right;">
                                                  <?= $Data_pesanan->total_bayar ?>,-
                                              </td>
                                              <td style="width: 12px; text-align: center;"><?= $Data_pesanan->status ?></td>
                                              <td style="text-align: center;">
                                                  <?php if ($Data_pesanan->status == 'Diterima' or $Data_pesanan->status == 'Dikirim') : ?>
                                                  <?php else : ?>
                                                      <a id="detail_pemesanan" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#pemesanan_detail" data-placement="top" title="" data-original-title="Detail" data-id_pemesanan="<?= $Data_pesanan->id_pemesanan ?>">
                                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                              <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                              <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                          </svg>
                                                      </a>
                                                  <?php endif; ?>
                                              </td>
                                          </tr><?php $no++; ?>
                                      <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <?php $this->load->view('admin/pelanggan/detail_pemesanan') ?>