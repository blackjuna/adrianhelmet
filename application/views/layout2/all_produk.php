<div class="row">
	<?php if ($produk > 0) { foreach ($produk as $p){ ?>   
	<div class="col s12 m4">
		<div class="card">
			<a href="<?=site_url('produk/'.$p->kode_link);?>" title="<?= $p->nama_produk;?>">
				<div class="card-image">
					<img src="<?= base_url().'uploads/produk/'.$p->img;?>" height="250" width="250">
					<span class="card-title"><?= character_limiter($p->nama_produk, 20);?></span>
				</div>
			</a>
			<div class="card-action">
				<a href="<?=site_url('produk/'.$p->kode_link);?>" class="waves-effect btn buy">Beli Sekarang</a>
			</div>
		</div>
	</div>

	<?php } } else{ ?>
	<div class="card" style="padding:20px;">
	<p>
		Maaf produk yang anda cari tidak dapat kami temukan!
	</p>
	<?= anchor(site_url(), 'Kembali'); ?>
	</div>
	<?php } ?>
<div class="col s12 m12">
<?=$halaman?>
</div>
</div>
