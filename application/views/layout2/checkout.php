<div class="col s12">
	<div class="panel">
	<div class="panel-header">Keranjang Belanja</div>
	<div class="panel-body" style="overflow-x:auto;">
	<div class="keranjang" style="display:inline-block;width: 1200px;">
	<table class="table" width="100%">
		<tbody><tr>
			<td align="center">No</td>
			<td align="center">Nama Produk</td>
			<td align="center">Jumlah</td>
			<td align="center">Harga perpak</td>
			<td align="center">Warna</td>
			<td align="center">Subtotal</td>
			<td align="center">#</td>
		</tr>
		<?php 
		$n=1;
		foreach ($this->cart->contents() as $i) {
			?>
			<tr> 
				<td><?= $n++?></td>
				<td>
					<p><?= $i['name']; ?></p>
					<p><img width="100" src="<?=base_url('uploads/produk/'.$i['img']);?>"></p>
				</td>
				<td><?php if($i['qty'] == 20){echo '1 KARTON = 20 PAK';}else{echo $i['qty'].' Pak';} ?></td>
				<td><?='Rp.'.$this->cart->format_number($i['price']); ?></td>
				<td><?php if ($i['cos'] == 1) { echo $i['warna'];}else if( $i['cos'] == 0 ){ echo 'Sesuai Deskripsi';}else{echo $i['warna'];} ?></td>
				<td><?='Rp.'.$this->cart->format_number($i['subtotal']); ?></td>
				<td><a href="<?=site_url('vb/decart/'.$i['rowid'])?>" onclick="return confirm('Apakah anda yakin ingin menghapus item ini ?')">Hapus</a></td>
			</tr>
			<?php } ?>
			<tr style="background:#666;color:#FFF;">
				<td colspan="6" align="center" style="border-radius: 0;"><strong>Total Keseluruhan</strong></td>
				<td align="right" style="background: #555;border-radius: 0;text-align: center;"><strong >Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
			</tr>
			<tr>
		</tr>
		</tbody>
	</table>
	</div>
</div>
<div class="panel-footer">
	<div class="row">
		<div class="col s12 m6">
			<strong><a href="<?= site_url();?>"><span class="btn btn-primary" style="width: 100%;">Lanjut Belanja</span></a></strong>
		</div>
		<div class="col s12 m6">
				<?php if (count($this->cart->contents()) > 0) { ?><a href="<?= site_url('pemesanan');?>"><span class="btn btn-success" style="width: 100%;">Check Out</span></a><?php }else{echo "Happy Shoping";} ?>
		</div>
	</div>
</div>
</div>
</div>
