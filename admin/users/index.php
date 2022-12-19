<?php
define("BASEPATH", true);
include_once "../../connection.php";

$db = new Database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/dist/img/box-logo.png">
  <title>E-Voting | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Data Calon</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../assets/index3.html" class="brand-link">
        <img src="../assets/dist/img/box-logo.png" alt="AdminLTE Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-light" id="title" style="letter-spacing: 3px;">E-Voting</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../assets/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block" style="letter-spacing: 3px;">Admin</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item menu-open">
              <a href="index.php" class="nav-link active">
                <i class="fas fa-table nav-icon"></i>
                <p>Data Calon</p>
              </a>

            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Calon</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Data Calon</a></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- /.row RESPONSIVE TABLE-->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title mt-1">Data Calon (Unsorted)</h3>

                  <div class="card-tools">
                    <button class="btn btn-sm btn-success add">Add</button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <!-- Ini untuk looping tablenya gan -->
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jumlah Vote</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php 
                        $query = "SELECT * FROM kandidat";  
                        $result = mysqli_query($db->db,$query);

                        if (mysqli_num_rows($result)>0) {
                          $nomor = 0;
                          while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $nama = $row['nama'];
                            $kelas = $row['kelas'];
                            $visi = $row['visi'];
                            $misi = $row['misi'];
                            $count = $row['count'];               
                      ?>

                      <tr>
                        <td><?= ++$nomor ?></td> <!-- Ini untuk looping ID -->
                        <td><?= $row['nama'] ?></td> <!-- Ini untuk looping Nama -->
                        <td><?= $row['kelas'] ?></td> <!-- Ini untuk looping Kelas -->
                        <td><?= $row['count'] ?></td> <!-- Ini untuk looping Jumlah Vote -->
                        <td class="text-center">
                          <button class="btn btn-sm btn-primary view" data-id= '<?=$id?>'>View</button>
                          <button class="btn btn-sm btn-warning update" data-id= '<?=$id?>'>Edit</button>
                          <a class="btn btn-sm btn-danger" href='action.php?id=<?=$id?>&type=delete'>Delete</a>
                        </td>
                      </tr>
                      <?php
                        }
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title mt-1">Data Calon (Bubble Sorted)</h3>

                  <div class="card-tools">
                    <button class="btn btn-sm btn-success add">Add</button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <!-- Ini untuk looping tablenya gan -->
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jumlah Vote</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        require_once 'sort.php';
                        $nomor = 0;
                        foreach ($arr as $arrs){
                          $sorted = $arrs['count'];
                          $result = mysqli_query($db->db,"SELECT * FROM kandidat WHERE count = '$sorted'");
                          while($row = mysqli_fetch_assoc($result)){ ?>
                      <tr>
                        <td><?= ++$nomor ?></td> <!-- Ini untuk looping ID -->
                        <td><?= $row['nama'] ?></td> <!-- Ini untuk looping Nama -->
                        <td><?= $row['kelas'] ?></td> <!-- Ini untuk looping Kelas -->
                        <td><?= $row['count'] ?></td> <!-- Ini untuk looping Jumlah Vote -->
                        <td class="text-center">
                          <button class="btn btn-sm btn-primary view" data-id= '<?=$id?>'>View</button>
                          <button class="btn btn-sm btn-warning update" data-id= '<?=$id?>'>Edit</button>
                          <a class="btn btn-sm btn-danger" href='action.php?id=<?=$id?>&type=delete'>Delete</a>
                        </td>
                      </tr>
                      <?php
                        }
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="#" style="text-decoration: underline;">Kelompok 4 - ICIKIWIR</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../assets/dist/js/demo.js"></script>
  <script src="../assets/js/admin.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>