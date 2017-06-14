<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Toko Korek Online</title>
	<link rel="stylesheet" href="<?=base_url()?>mate/css/materialize.min.css" media="screen,projection">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<script type="text/javascript" src="<?=base_url()?>mate/js/jquery.js"></script>	
	<style type="text/css" media="screen">
	body{
		background: #FAFAFA;
	}
	.ok{
		margin:110px auto;
		text-align: center;
		width: 50%;
	}		
	</style>
</head>
<body>
<div class="row">
	<div class="container">
		<div class="col s12 m12">
			<div class="form-login">
			<div class="ok">
				<?php if ($this->session->flashdata('error')) { ?>
					<div class="card red white-text" role="alert">
					<div class="card-content">
							<span class="sr-only">Error:</span>
							<?php echo $this->session->flashdata('error'); ?>
						</div>
					</div>  
					<?php }elseif ($this->session->flashdata('sukses')) {?>
					<div class="card green white-text" role="alert">
					<div class="card-content">
						<span class="sr-only">Berhasil:</span>
						<?php echo $this->session->flashdata('sukses'); ?>
					</div>
					</div>  
					<?php } ?>
					
					<?php if ($this->uri->segment(2) == 'login') { ?>
					<div class="card">
						<div class="card-content">
							<div class="content-title"><h5>Login</h5></div>
							<form action="../pb/verif_login" method="post" accept-charset="utf-8">
								<div class="input-field">
									<i class="mdi-content-mail prefix grey-text"></i>
									<input id="email" type="text" name="email" class="validate" required>
									<label for="email">Email</label>
								</div>

								<div class="input-field">
									<i class="mdi-action-lock prefix grey-text"></i>
									<input id="password" type="password" name="password" class="validate" required>
									<label for="password">Password</label>
								</div>
								<div class="card-action">
									<input class="btn btn-success" style="width: 100%" type="submit" value="Masuk">
								</div>
							</form>
							<a href="<?=site_url('vb/lupa_password')?>" title="lupa password">Lupa Password ?</a>
						</div>
					</div>
					<?php }elseif($this->uri->segment(2) == 'lupa_password'){ ?>
					<div class="card">
						<div class="card-content">
							<div class="content-title"><h5>Lupa Password</h5></div>
							<form action="../pb/lupa_password" method="post" accept-charset="utf-8">
								<div class="input-field">
									<i class="mdi-content-mail prefix grey-text"></i>
									<input id="email" type="text" name="email" class="validate"  required>
									<label for="email">Email</label>
								</div>
								<div class="card-action">
									<input class="btn btn-success" style="width: 100%" type="submit" value="Kirim">
								</div>
							</form>
						</div>
					</div>
					<?php }elseif ($this->uri->segment(2) == 'akses_pw_tk') { ?>
						<div class="card">
						<div class="card-content">
							<div class="content-title"><h5>Ganti Password</h5></div>
							<form action="../../pb/ganti_password" method="post" accept-charset="utf-8">
								<div class="input-field">
									<i class="mdi-action-lock prefix grey-text"></i>
									<input type="hidden" name="tkn" value="<?=$this->uri->segment(3)?>">
									<input id="password" type="password" name="password" class="validate" required>
									<label for="password">Password baru anda</label>
								</div>
								<div class="input-field">
									<i class="mdi-action-lock prefix grey-text"></i>
									<input id="upassword" type="password" name="upassword" class="validate" required>
									<label for="upassword">Ulangi Password</label>
								</div>
								<div class="card-action">
									<input class="btn pw-ganti btn-success" name="pw_ganti" style="width: 100%" type="submit" value="Ganti">
								</div>
							</form>
						</div>
					</div>
					<?php } ?>

			</div>
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url()?>mate/js/materialize.js"></script>	
</body>
</html>