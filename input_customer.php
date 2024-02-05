<?php

require ('controller/islogin.php');

require ('db/database.php');
$db=new Database();
$id_cus = @$_GET['id_cus'];
$db->query('SELECT * FROM customers WHERE id_cus = :id_cus');
$db->bind('id_cus',$id_cus);
$customer = $db->single();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php
  require ('template/header.php');
  ?>
  <?php
  require('template/sidebar.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">
                <?php
                if($no){
                  echo 'Edit Customer';
                } else {
                  echo 'Tambah Customer';
                }
                
              
                ?>
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form enctype="multipart/form-data"  action="<?php ( @$id_cus ? 'controller/update_customer.php' :'controller/save_customer.php' ); ?>" method="POST">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
           
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                <?php
                if($no){
                  echo 'Edit Customer';
                } else {
                  echo 'Tambah Customer';
                }
                
              
                ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="form-group">
                    <label for="id_cus">ID Customer</label>
                    <input type="text" class="form-control" name= "id_cus" id="id_cus" placeholder="Customer" required<?=  @$customer['id_cus'] ? 'readonly' :''; ?> value="<?php echo @$customer ['id_cus']?>">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name= "nama" id="nama" placeholder="nama" value="<?php echo @$customer['nama']?>">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name= "alamat" id="alamat" placeholder="alamat" value="<?php echo @$customer['alamat']?>">
                  </div>
                  <div class="form-group">
                    <label for="telepon"> Telepone</label>
                    <input type="number" class="form-control" name= "telepon" id="telepon" placeholder="telepon" value="<?php echo @$customer['telepon']?>">
                  </div>
                  <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <input type="text" class="form-control" name= "jk" id="jk" placeholder=" jk" value="<?php echo @$customer['jk']?>">
                  </div>
                              
                </div>
                  <div class="card-footer">
                   <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                 </div>
          
        
                
              
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      </form> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  require('template/footer.php');
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
