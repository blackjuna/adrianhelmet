<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Toko Korek Online</title>
	<link rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" href="assets/css/tokokorek.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<script type="text/javascript" src="assets/js/jquery.js"></script>	
	<style type="text/css" media="screen">
		.container{
			width: 85%;
		}		
	</style>
</head>
<body>
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="#"><i class="mdi-action-home left"></i>Home</a></li>
				<li><a href="#"><i class="mdi-navigation-expand-more left"></i>Produk</i></a></li>
				<li><a href="#"><i class="mdi-action-shopping-cart left"></i>Checkout <span class="a-cart">10</span></a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a href="#">Navbar Link</a></li>
				<li><a href="#">Navbar Link</a></li>
				<li><a href="#">Navbar Link</a></li>
				<li><a href="#"><i class="mdi-action-shopping-cart"><span>10</span></i></a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		</div>
	</nav>

	<div class="banner">
		
	</div>

	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col s12 m4">
					<div class="row">
						<div class="col s12 s12">
							<div class="panel">
							    <div class="panel-header"><i class="mdi-action-search left"></i>Search</div>
							    <div class="panel-body">
								<div class="input-field">
									<input id="last_name" type="text" class="validate">
									<label for="last_name">Search for Products..</label>
								</div>
								</div>
							</div>
						</div>
						<div class="col s12 s12">
							<div class="panel">
							    <div class="panel-header"> <i class="mdi-action-view-headline left"></i> Kategory</div>
							    <div class="panel-body">
								 <ul class="collection no-marg">
								 	<a href="#!" class="collection-item">Korek Api<span class="badge">1</span></a>
								 	<a href="#!" class="collection-item">Alan<span class="new badge">4</span></a>
								 	<a href="#!" class="collection-item">Alan</li>
								 		<a href="#!" class="collection-item">Alan<span class="badge">14</span></a>
								 	</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col s12 m8">
					<div class="row">
						<div class="col s12">
							<div class="panel">
								<div class="panel-header">Korek Gas Tokai</div>
								<div class="panel-body">
									<div class="row">
									<div class="col s12 m4">
										<label>Klik untuk memerbesar foto</label>
										<img style="cursor: pointer;" src="assets/img/produk2.jpg" class="vgede" alt="produk" height="200" width="200">
									</div>
									<div class="col s12 m8">
										<p>
										<label>Harga :</label>
											<select class="browser-default">
												<option value="" disabled selected>Pilih harga paket</option>
												<option>Per karton (20 dus) - 1.000.000</option>
												<option>Per Dus - 100.000</option>
											</select>
										</p>
										<p><label> Warna: </label></p>
											<p>
												<input class="with-gap" name="group1" type="radio" id="test1"  />
												<label for="test1">Green</label>
												<input class="with-gap" name="group1" type="radio" id="test2"  />
												<label for="test2">Green</label>

											</p>
										<p><label> Deskripsi : </label></p>
										<p>Korek ini sangat bagus annas asajd ajd desain yang menarik dan unik sayang bila anda tidak mencoba menggunakan korek ini, mudah di gunkan dan praktis.</p>
										<p><a href="#" title="" class="btn"><i class="mdi-action-add-shopping-cart left"></i>Tambahkan keranjang</a></p>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<footer class="page-footer orange">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Company Bio</h5>
						<p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


					</div>
					<div class="col l3 s12">
						<h5 class="white-text">Settings</h5>
						<ul>
							<li><a class="white-text" href="#!">Link 1</a></li>
							<li><a class="white-text" href="#!">Link 2</a></li>
							<li><a class="white-text" href="#!">Link 3</a></li>
							<li><a class="white-text" href="#!">Link 4</a></li>
						</ul>
					</div>
					<div class="col l3 s12">
						<h5 class="white-text">Connect</h5>
						<ul>
							<li><a class="white-text" href="#!">Link 1</a></li>
							<li><a class="white-text" href="#!">Link 2</a></li>
							<li><a class="white-text" href="#!">Link 3</a></li>
							<li><a class="white-text" href="#!">Link 4</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					Made by <a class="orange-text text-lighten-3" href="../../index.html">Materialize</a>
				</div>
			</div>
		</footer>

		<!-- script -->
		<script type="text/javascript">
			$(document).ready(function() {
				$('.slider').slider({full_width: true});
				$(".button-collapse").sideNav();
				$('.vgede').materialbox();
			});
		</script>
		<script type="text/javascript" src="assets/js/materialize.js"></script>	
	</body>
	</html>