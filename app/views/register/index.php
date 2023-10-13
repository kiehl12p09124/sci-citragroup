<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $data['title'];?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= PUBLICC;?>/AdminLTE3/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= PUBLICC;?>/AdminLTE3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= PUBLICC;?>/AdminLTE3/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <?php Flasher::Flash();?>
      <a href="<?= PUBLICC;?>/AdminLTE3/index2.html" class="h1"><b>Citra</b>Group</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new user</p>

      <form action="<?= BASEURL;?>/Register/registrasi" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nama" name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span>@</span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span><i id="icon" class="fas fa-eye-slash"></i></span>
            </div>
          </div>
          <input id="passInput" type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span><i class="fas fa-key"></i></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Token" name="token">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-1"></div>
          <div class="col-8">
            <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="mt-2">
                <a href="<?= BASEURL.'/Login';?>" class="text-center">LogIn</a>
            </div>    
          <!-- /.col --> 
        </div>
      </form>

 
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= PUBLICC;?>/AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= PUBLICC;?>/AdminLTE3/dist/js/adminlte.min.js"></script>
<!-- script sendiri -->
<?php if (isset($data['script'])):?>
<script src="<?= PUBLICC;?>/js/<?= $data['script'];?>.js"></script>
<?php endif;?>
</body>
</html>
