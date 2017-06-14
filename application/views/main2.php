<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?=base_url()?>mate/css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" href="<?=base_url()?>mate/css/tokokorek.css" media="screen,projection">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<!-- [ Meta Tag SEO ] -->
	<meta name="description" content="<?= $key->nama_brand; ?> - <?= $key->deskripsi; ?>">
	<meta content='<?= $title ?>,toko korek, jual korek gas online' name='keywords'/>
	<link rel="shortcut icon" href="<?=base_url('uploads/'.$key->logo)?>" type="image/x-icon">
	<meta content='INDONESIA' name='geo.placename'/>
	<meta content='TOKO KOREK' name='Author'/>
	<meta content='general' name='rating'/>
	<meta content='ID' name='geo.country'/>
	<meta content='en_US' property='og:locale'/>
	<meta content='en_GB' property='og:locale:alternate'/>
	<meta content='id_ID' property='og:locale:alternate'/>
	<meta content='TOKOKOREK' property='og:site_name'/>
	<meta content='http://<?=$_SERVER['HTTP_HOST']?>' name='twitter:domain'/>
	<meta content='<?= $title ?>' name='twitter:title'/>
	<meta content='summary_large_image' name='twitter:card'/>
	<?php if ($this->uri->segment(1) == 'produk') { ?>
	<link href='<?=base_url('uploads/produk/'.$p->img)?>' rel='image_src'/>
	<meta property="og:description" content="<?= $p->keterangan; ?>" />
	<meta content='<?=$p->nama_produk;?>' property='og:title'/>
	<meta content='<?=base_url('uploads/produk/'.$p->img)?>' property='og:image'/>
	<meta content='<?=base_url('uploads/produk/'.$p->img)?>' name='twitter:image'/>
	<meta content='<?= $p->keterangan; ?>' name='twitter:description'/>
	<?php } ?>
	<meta content='<?= $key->deskripsi; ?>' name='twitter:description'/>

	<script type="text/javascript" src="<?=base_url()?>mate/js/jquery.js"></script>	
	<script type="text/javascript" src="<?=base_url()?>mate/js/main.js"></script>	

	<style type="text/css" media="screen">
		.container{
			width: 85%;
		}		
	</style>
</head>
<body>
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="<?=site_url()?>" class="brand-logo"><img src="<?=base_url('uploads/'.$key->logo)?>" alt="<?=$key->nama_brand;?>"></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="<?=site_url()?>"><i class="mdi-action-home left"></i>Home</a></li>
				<li><a href="<?=site_url('testimoni')?>"><i class="mdi-action-autorenew left"></i>Kirim Testimoni</i></a></li>
				<li><a href="<?=site_url('keranjang_belanja')?>"><i class="mdi-action-shopping-cart left"></i>Keranjang belanja <span class="a-cart">(<?= count($this->cart->contents()); ?>)</span></a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a href="#"><i class="mdi-action-home left"></i>Home</a></li>
				<li><a href="<?=site_url('testimoni')?>"><i class="mdi-action-autorenew left"></i>Kirim Testimoni</i></a></li>
				<li><a href="#"><i class="mdi-action-shopping-cart left"></i>Keranjang belanja <span class="a-cart">10</span></a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		</div>
	</nav>

	<div class="container">
		<div class="content-full">
			<div class="slider sli">
				<ul class="slides">
					<?php foreach ($this->mb->slider() as $s): ?>
						<li>
							<img src="<?=base_url('uploads/slider/'.$s->img);?>" alt="<?=$key->nama_brand;?>"> <!-- random image -->
							<div class="caption center-align">
								<h3><?=$s->judul?></h3>
								<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
							</div>
						</li>
					<?php endforeach ?>
				</ul>
			</div>


			<div class="content">
				<div class="row">
					<div class="col s12 m12">
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
					</div>
					<div class="col s12 m4">
						<div class="row">
							<div class="col s12 s12">
								<div class="panel">
									<div class="panel-header"><i class="mdi-action-search left"></i>Pencarian</div>
									<div class="panel-body">
										<form action="<?=site_url('vb/index');?>" method="get" accept-charset="utf-8">
											<div class="input-field">
												<input id="last_name" type="text" name="search" class="validate">
												<label for="last_name">Cari berdasarkan produk..</label>
											</div>
										</form>
									</div>
								</div>
							</div>
							<?php if (count($this->mb->testimoni()) > 0) {?>
							<div class="col s12 s12">
								<div class="panel">
									<div class="panel-header"> <i class="mdi-action-autorenew left"></i> Testimoni</div>
									<div class="panel-body">
										<div class="slider" style="height: 240px;">
											<ul class="slides" style="height: 200px;">
												<?php foreach ($this->mb->testimoni() as $t): ?>
													<li>
														<div class="caption left-align">
															<h5><?=$t->nama;?></p></h5>
															<p class="light grey-text text-lighten-3"><?=$t->feedback;?></p>
														</div>
													</li>
												<?php endforeach ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php if (count($this->mb->gad_l()) > 0) {?>
							<?php foreach ($this->mb->gad_l() as $t): ?>
								<div class="col s12 s12">
									<div class="panel">
										<?php if ($t->judul != ''): ?>										
											<div class="panel-header"><?=$t->judul;?></div>
										<?php endif ?>
										<div class="panel-body">
											<?=$t->isi;?>
										</div>
									</div>
								</div>
							<?php endforeach ?>
							<?php } ?>
						</div>
					</div>
					<div class="col s12 m8">
						<?php 
						if ($this->uri->segment(1) == "produk") {
							$this->load->view('layout2/single_produk');
						}elseif ($this->uri->segment(1) == "testimoni") {
							$this->load->view('layout2/testimoni');
						}elseif ($this->uri->segment(2) == "konf_pemb") {
							$this->load->view('layout2/konf_pemb');
						}elseif ($this->uri->segment(1) == "pemesanan") {
							$this->load->view('layout2/pemesanan');
						}elseif ($this->uri->segment(1) == "keranjang_belanja") {
							$this->load->view('layout2/checkout');
						}else{
							$this->load->view('layout2/all_produk');
						}
						?>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<?=$key->pk;?>

	<!-- script -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('.slider').slider({full_width: true});
			$(".button-collapse").sideNav();
		});
	</script>
	<script type="text/javascript" src="<?=base_url()?>mate/js/materialize.js"></script>	
</body>
</html>