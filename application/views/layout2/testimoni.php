<div class="col-md-12">
	<div class="panel">
		<div class="panel-header"><i class="mdi-action-autorenew left"></i> Kirim Testimoni</div>
		<div class="panel-body">
          <form action="<?= site_url('pb/infeedback');?>" method="post" accept-charset="utf-8">
			<p>KODE INVOICES : </p>
			<p><input type="text" required class="form-control" name="kode" placeholder="Masukan kode invoices anda disini!"></p>
			<p>PESAN ANDA : </p>
			<p><textarea name="pesan" required class="materialize-textarea" placeholder="Masukan pesan anda disini!" style="min-height: 50px;" length="120"></textarea></p>
			<p><input type="submit" name="simpan" class="btn btn-success" value="Kirim"> <input type="reset" class="btn btn-warning" value="Reset"></p>
			</form>
		</div>
	</div>
</div>