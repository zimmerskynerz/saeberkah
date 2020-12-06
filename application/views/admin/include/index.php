<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/include/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view('admin/include/nav_bar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('admin/include/menu') ?>

        <!-- Content Wrapper. Contains page content -->
        <?php $this->load->view('admin/' . $folder . '/' . $halaman . '') ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/include/footer') ?>
</body>

</html>