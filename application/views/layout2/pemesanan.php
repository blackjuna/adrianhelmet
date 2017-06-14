<div class="col s12">
	<div class="panel">
	<div class="panel-header">Keranjang Belanja</div>
	<div class="panel-body">
	<div class="keranjang" style="overflow-x: auto;">
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
				<td><?php if ($i['cos'] == 1) { echo $i['warna'];}else if( $i['cos'] == 0 ){ echo 'Sesuai Deskripsi';} ?></td>
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
</div>

<div class="panel panel-success">
	<div class="panel-header">Beritahu kami bagaimana kami dapat menghubungi anda :</div>
	<div class="panel-body">
		<form action="<?=site_url('vb/inpemesanan');?>" method="post" accept-charset="utf-8">
			<p>Nama anda : </p>
			<p><input type="text" class="form-control" name="nama"  placeholder="Masukan nama anda disini." required></p>
			<p>Email anda : </p>
			<p><input type="email" class="form-control" name="email"  placeholder="Masukan email aktif anda disini." required></p>
			<p>Alamat lengkap : </p>
			<p><textarea  class="form-control materialize-textarea" name="alamat"  placeholder="Masukan alamat anda disini." required></textarea></p>
			<p>No. HP / Telepon : </p>
			<p><input type="number" class="form-control" name="hp"  placeholder="Masukan nomor Handphone / Telepon anda disini." ></p>
			<p>Pesan anda : </p>
			<p><textarea name="pesan" class="materialize-textarea" placeholder="Masukan pesan anda disini!" ></textarea></p>
			<p><input type="submit" class="btn btn-success" name="kirimpem" value="Kirim"> <input class="btn btn-warning" type="reset" value="Ulangi semua"></p>
		</form>
	</div>
</div>

</div>




