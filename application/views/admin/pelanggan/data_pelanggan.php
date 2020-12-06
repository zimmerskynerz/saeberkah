  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Data Pelanggan</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">admin</a></li>
                          <li class="breadcrumb-item active">pelanggan</li>
                          <li class="breadcrumb-item active">pelanggan</li>
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
                              <h3 class="card-title">Daftar Pelanggan Saeberkah Furniture</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th style="width: 12px; text-align: center;">No</th>
                                          <th style="text-align: center;">Nama</th>
                                          <th style="text-align: center;">email</th>
                                          <th style="text-align: center;">No HP</th>
                                          <th style="text-align: center;">Alamat</th>
                                          <th style="text-align: center;">Transaksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1; ?>
                                      <?php foreach ($data_pelanggan as $Data_pelanggan) : ?>
                                          <tr>
                                              <td style="width: 12px; text-align: center;"><?= $no ?></td>
                                              <td><?= $Data_pelanggan->nama_lengkap ?></td>
                                              <td><?= $Data_pelanggan->email ?></td>
                                              <td><?= $Data_pelanggan->telepon ?></td>
                                              <td><?= $Data_pelanggan->alamat ?></td>
                                              <td style="text-align: center;"><?= $Data_pelanggan->jml_transaksi ?></td>
                                          </tr>
                                          <?php $no++; ?>
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