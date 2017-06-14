<div class="row">
	<div class="col s12">
		<form action="../vb/incart/<?= $p->id_produk; ?>/<?= $this->uri->segment(2); ?>" method="post" accept-charset="utf-8">			
		<div class="panel">
			<div class="panel-header"><?= $p->nama_produk; ?></div>
			<div class="panel-body">
				<div class="row">
					<div class="col s12 m4">
						<label>Klik untuk memerbesar foto</label>
						<img style="cursor: pointer;" src="<?=base_url('uploads/produk/'.$p->img);?>" class="vgede" alt="<?= $p->nama_produk; ?>" height="200" width="200">
					</div>
					<div class="col s12 m8">
						<p>
							<div class="row">
								<div class="col s12 m6">
									<label>Harga :</label>
									<input type="hidden" name="izjq9dsz" id="aids" value="<?=$p->id_produk;?>">
									<select name="pilihharga" class="browser-default" id="pilihharga" required='isi'>
										<option value="" disabled selected>Pilih harga</option>
										<option value="0">Perpak</option>
										<?php if ($p->stok >= 20) {
											echo "<option value='1'>1 Karton</option>";
										} ?>
									</select>
								</div>
								<div class="col s12 m6">
									<label>Stok barang:</label>
									<p style="border:solid 1px #EEE;margin:0; padding: 10px;"><?=$p->stok?></p>
								</div>
							</div>
						</p>
						<div id="addStok" style="display: none;">
							<div>
								<input id="jumlah" type="number" min="1" max="<?=$p->stok;?>" placeholder="Masukan jumlah pembelian perpak" name='stok' class="validate">
							</div>
						</div>
						<label id="rin-karton" style="display: none;">*1 Karton = 20 PAK | 1 PAK = <span><?= $p->harga_satuan; ?></span></label>
						<p class="tampil-harga" style="display: none;">
							Harga : <span id="harga"></span><input type="hidden" name="harga" id="vharga">
						</p>
						<p><label> Costum: </label></p>
						<p>
							<input class="with-gap" name="cos" value="2" type="radio" id="txcos"/>
							<label for="txcos">Text</label>
							<input class="with-gap" name="cos" value="1" type="radio" id="cos"/>
							<label for="cos">Warna</label>
							<input class="with-gap" name="cos" value="0" type="radio" id="tcos"/>
							<label for="tcos">Tidak</label>

						</p>
						<p class="pilihwarna" style="display: none;">
							<label>Pilih warna :</label>
							<select name="warna" class="browser-default" id="pilihwarna">
								<option value="" disabled selected>Pilih warna</option>
								<?php
								 $a = explode(',',$p->warna); 
								 foreach ($a as $key => $value) { ?>
									<option><?=$value;?></option>
								 <?php } ?>
							</select>
						</p>
						<p class="pilihtext" style="display: none;">
							<label>Text :</label>
							<textarea class="materialize-textarea" id="ptext" name="text_warna"></textarea>
						</p>

						<p><label> Deskripsi : </label></p>
						<p><?= $p->keterangan; ?></p>
						<?php foreach ($this->cart->contents() as $i) {
							if ($i['id'] == $p->id_produk) {
								echo "<div class='card' style='padding:10px;'><p>Maaf, Anda tidak bisa memesan produk ini lagi karena produk ini sudah berada di keranjang belanja.</p></div> ";
								$t[] = 'true';
							}
						} ?>
						<?php if (@$t[0] == '') { ?>
							<p><button type="submit" name="btn" class="btn"><i class="mdi-action-add-shopping-cart left"></i>Tambahkan keranjang</button></p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	 $('.vgede').materialbox();
});
</script>