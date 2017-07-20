<div class="span9">
	<ul class="breadcrumb">
		<li><a href="<?= base_url();?>">HALAMAN UTAMA</a> <span class="divider">/</span></li>
		<li class="active"><?=$title_module;?></li>
    </ul>
	<h3> <?=$title_module;?></h3>	
	<div class="well">
	<form method="post" action="" enctype="multipart/form-data" id="formname" accept-charset="utf-8" class="form-horizontal">
		<h4>Informasi pribadi anda</h4>
		<div class="control-group">
			<label class="control-label" for="username">Nama Pengguna <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="username" id="username" placeholder="Nama Depan">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="firstname">Nama Depan <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="firstname" id="firstname" placeholder="Nama Depan">
			</div>
		</div>
	 	<div class="control-group">
			<label class="control-label" for="lastname">Nama Belakang <sup>*</sup></label>
			<div class="controls">
		  	<input type="text" name="lastname" id="lastname" placeholder="Nama Belakang">
			</div>
	 	</div>
		<div class="control-group">
			<label class="control-label" for="email">Email <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="email" id="email" placeholder="Email">
			</div>
	  	</div>	  
		<div class="control-group">
			<label class="control-label" for="password">Kata Sandi <sup>*</sup></label>
			<div class="controls">
			  <input type="password" name="password" id="password" placeholder="Kata Sandi">
			</div>
		</div>	
		<div class="control-group">
			<label class="control-label" for="confirmpassword">Konfirmasi Kata Sandi <sup>*</sup></label>
			<div class="controls">
			  <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Kata Sandi">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="alamat">Alamat<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="alamat" id="alamat" placeholder="Alamat"/> 
			</div>
		</div>		
		<input type="hidden" name="role" id="role" value="2"/>
		<div class="control-group">
			<label class="control-label" for="telpon">Telepon <sup>*</sup></label>
			<div class="controls">
			  <input type="text"  name="telpon" id="telpon" placeholder="Telpon"/> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telpon">File Foto <sup>*</sup></label>
			<div class="controls">
			  <input type="file" name="filefoto" id="filefoto" /> 
			</div>
		</div>
		<p><sup>*</sup>Kolom Yang harus diisi	</p>

		<div class="control-group">
			<div class="controls">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Daftar</button>
                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> -->
			</div>
		</div>		
	</form>
</div>
</div>
</div>
</div>
</div>