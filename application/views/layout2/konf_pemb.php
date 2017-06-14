<div class="col s12 m12">
	<div class="panel">
		<div class="panel-header"><i class="mdi-maps-local-atm left"></i> Konfirmasi Pembayaran</div>
		<div class="panel-body">
          <form action="<?= site_url('pb/konf_pemb');?>"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
			<p>KODE INVOICE ANDA : </p>
			<p><input  type="text" required class="form-control" readonly value="<?=$val->kode_invoice;?>" name="kode" placeholder="Masukan kode invoices anda disini!"></p>
			<input type="hidden" name="ki" value="<?=$val->kode_invoice;?>">
			<p>UPLOAD BUKTI TRANSAKSI :</p>
			<div class="file-field input-field">
				<input class="file-path validate" type="text"/>
				<div class="btn">
					<span>File</span>
					<input type="file" name="file" />
				</div>
			</div>
			<p>PESAN ANDA : </p>
			<p><textarea name="pesan" required class="materialize-textarea" placeholder="Masukan pesan anda disini!" style="min-height: 50px;" length="150"></textarea></p>
			<p><input type="submit" name="simpan" class="btn btn-success" value="Konfirmasi sekarang"> <input type="reset" class="btn btn-warning" value="Reset"></p>
			</form>
		</div>
	</div>
</div>