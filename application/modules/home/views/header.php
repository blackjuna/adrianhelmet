<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Adrian Helmet Shopping</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?= base_url();?>assets/themes-shop/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?= base_url();?>assets/themes-shop/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="<?= base_url();?>assets/themes-shop/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?= base_url();?>assets/themes-shop/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?= base_url();?>assets/themes-shop/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?= base_url();?>assets/themes-shop/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url();?>assets/themes-shop/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url();?>assets/themes-shop/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url();?>assets/themes-shop/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url();?>assets/themes-shop/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Selamat datang, <strong> 
		<?php if (isset($first_name))
			{
				echo''.ucwords($first_name).'';
			}else
			{
				echo'pelanggan';
			};?></strong></div>
	<!-- <div class="span6">
	<div class="pull-right">
		<a href="product_summary.html"><span class="">Rp.</span></a>
		<span class="btn btn-mini">155.00</span>
		<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
	</div>
	</div> -->
</div>