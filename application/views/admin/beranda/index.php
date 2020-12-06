<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_pesanan?></h3>

                            <p>Jumlah Pesanan Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlah_pelanggan?></h3>

                            <p>Jumlah Pelanggan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
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