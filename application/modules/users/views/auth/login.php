<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in Adrian Helmet Systems</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url();?>assets/bootstrap-adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url();?>assets/bootstrap-adminlte/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url();?>assets/bootstrap-adminlte/ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url();?>assets/bootstrap-adminlte/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="<?= base_url();?>/assets/plugins/iCheck/square/blue.css"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?= base_url();?>users/auth/login"><b>ADRIAN</b>HELMET</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <fieldset>
          <p class="login-box-msg">Mulai untuk masuk ke program</p>
          <!-- <form action="<?= base_url();?>index.php/auth/login" method="post"> -->
          <?php echo form_open("auth/login");?>
          <div class="form-group has-feedback">
            <?php echo form_input($identity,'','class="form-control" placeholder="Nama User" type="text" autofocus');?>
            <!-- <input type="text" class="form-control" placeholder="User Name" > -->
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <?php echo form_input($password,'','class="form-control" placeholder="Kata Sandi"  type="password"');?>
            <!-- <input type="password" class="form-control" placeholder="Password"> -->
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div>
            
            <!-- /.col -->
            <div class="col-xs-4">
              <?php echo form_submit('submit', lang('login_submit_btn'),'class="btn btn-primary btn-block btn-flat"');?>
              <?php echo form_close();?>
              <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button> -->
            </div>
            <div class="col-xs-6">
            <a href="<?=base_url()?>"> Lupa Kata Sandi</a>
            </div>
            <!-- /.col -->
          </div>
        </fieldset>
        <?php echo $message;?>
        <div class="social-auth-links text-center">
          
        </div>
        <!-- /.social-auth-links -->
        <!-- <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> -->
      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery 2.2.0 -->
    <script src="<?= base_url();?>assets/bootstrap-adminlte/plugins/jQuery/jQuery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url();?>assets/bootstrap-adminlte/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <!-- <script src="<?= base_url();?>/assets/plugins/iCheck/icheck.min.js"></script> -->
    <!--     <script>
    $(function () {
    $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
    });
    });
    </script> -->
  </body>
</html>
