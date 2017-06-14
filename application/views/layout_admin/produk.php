<link rel="stylesheet" type="text/css" href="<?= site_url()?>public/sw/swipebox.css">
<link rel="stylesheet" type="text/css" href="<?= site_url();?>public/css/dataTables.bootstrap.min.css">

<?php if ($this->uri->segment(3) == 'edit_produk') { ?>

<!-- EDIT -->
<div class="col-md-12">
  <div class="kembali" style="margin-bottom: 10px;">    
    <a href="<?=site_url('vp/produk');?>"><button type="button" class="btn btn-warning">Kembali</button></a>
  </div>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Produk</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: block;">
      <form action="<?= site_url('Pp/upproduk') ?>" novalidate enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Nama Produk :</p>
        <p>
          <input type="text" class="form-control" name="nama_produk" value="<?= $produk->nama_produk; ?>"  placeholder="Masukan nama produk.">
          <input type="hidden" readonly name="id" value="<?= $produk->id_produk; ?>">
        </p>
        <p>Foto / Gambar :</p>
        <?php if ($produk->img != "") { ?>
        <p class="form-control" id="proimg"><a href="<?= base_url('uploads/produk/'.$produk->img);?>" class="sw"><i class="fa fa-eye"></i> Lihat Foto</a> | <a href="#" onclick="deproimg('<?= $produk->id_produk; ?>','<?= $produk->img; ?>')" style="color:red;"><i class="fa fa-trash"></i> Delete foto</a></p>
        <div id="hproimg"></div>
        <?php }else{ ?>
        <input type="file" class="form-control" name="img" placeholder="Masukan foto / gambar produk." required></p>
        <?php } ?>
        <p>Harga Perpak :</p>
        <p><input type="number" class="form-control" name="harga_satuan" value="<?= $produk->harga_satuan; ?>" placeholder="Masukan harga perpak."></p>
        <p>Stok :</p>
        <p><input type="number" class="form-control" name="stok" value="<?= $produk->stok; ?>"  placeholder="Masukan stok barang." required></p>
        <p>Warna :</p>
        <p><input type="text" class="form-control" name="warna"  placeholder="Masukan warna barang." value="<?= $produk->warna; ?>"></p>
        <p>Keterangan :</p>
        <p><textarea class="form-control"  placeholder="Masukan keterangan produk." name="keterangan"><?= $produk->keterangan; ?></textarea></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
</div>

<?php }elseif ($this->uri->segment(3) == 'detail_produk') { ?>

<!-- VIEW DETAIL -->
<div class="col-md-12">
  <div class="kembali" style="margin-bottom: 10px;">    
    <a href="<?=site_url('vp/produk');?>"><button type="button" class="btn btn-warning">Kembali</button></a>
  </div>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Produk (<?= $produk->nama_produk; ?>)</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: block;">
      <form  enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Nama Produk :</p>
        <p class="form-control"><?= $produk->nama_produk; ?></p>
        <p>Foto / Gambar :</p>
        <p class="form-control" id="proimg"><a href="<?= base_url('uploads/produk/'.$produk->img);?>" class="sw"><i class="fa fa-eye"></i> Lihat Foto</a></p>
        <p>Harga perpak :</p>
        <p class="form-control"><?= $produk->harga_satuan; ?></p>
        <p>Stok :</p>
        <p class="form-control"><?= $produk->stok; ?></p>
        <p>Warna :</p>
        <p class="form-control"><?= $produk->warna; ?></p>
        <p>Keterangan :</p>
        <div style="border:solid 1px #EEE;padding: 10px;"><?= $produk->keterangan; ?></div>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
</div>

<?php }else{ ?>

<!-- ADD & VIEW -->
<div class="col-md-12">
  <div class="box box-success collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Produk</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">
      <form action="<?= site_url('Pp/inproduk') ?>" novalidate enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Nama Produk :</p>
        <p><input type="text" class="form-control" name="nama_produk"  placeholder="Masukan nama produk." required></p>
        <p>Foto / Gambar produk :</p>
        <p><input type="file" class="form-control" name="img"  placeholder="Masukan foto / gambar produk." required></p>
        <p>Harga perpak :</p>
        <p><input type="number" class="form-control" name="harga_satuan"  placeholder="Masukan harga perpak." required></p>
        <p>Stok :</p>
        <p><input type="number" class="form-control" name="stok"  placeholder="Masukan stok barang." required></p>
        <p>Warna :</p>
        <p><input type="text" class="form-control" name="warna"  placeholder="Masukan warna barang dengan menggunkan tanda koma (,) sebagai pemisah." required></p>
        <p>Keterangan :</p>
        <p><textarea class="form-control" placeholder="Masukan keterangan produk." name="keterangan" required></textarea></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Produk</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body" style="display: hidden;">
     <table id="tabel" class="table table-bordered">
       <thead>
         <tr>
           <th>Nama Produk</th>
           <th>Foto</th>
           <th>Harga Perpak</th>
           <th>Warna</th>
           <th>Stok</th>
           <th>Dibuat</th>
           <th style="text-align: center;"><i class="fa fa-gear"></i></th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($produk as $val) { ?>
         <tr>
           <td><?= $val->nama_produk;?></td>
           <td>
             <?php if ($val->img != "") { ?>
             <a class="sw" href="<?= base_url('uploads/produk/'.$val->img);?>" title="<?= $val->nama_produk;?>" alt="<?= $key->nama_brand;?>">Lihat</a>
             <?php }else{echo "Tidak ada foto";} ?>
           </td>
           <td><?= $val->harga_satuan;?></td>
          <td><?= $val->warna;?></td>
           <td><?= $val->stok;?></td>
           <td><?= $val->date_buat;?></td>
           <td style="text-align: center;"><a href="#" onclick="location='<?= site_url('vp/produk/edit_produk/'.$val->id_produk);?>'"><i class="fa fa-pencil"></i></a> . <a href="#" onclick="location='<?= site_url('vp/produk/detail_produk/'.$val->id_produk);?>'"><i class="fa fa-eye"></i></a> . <a href="<?= site_url('vp/produk/hapus_produk/'.$val->id_produk);?>" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini ?')"><i class="fa fa-trash"></i></a></td>
         </tr>
         <?php } ?>
       </tbody>
     </table>
   </div>
 </div>
</div>

<?php } ?>
<script type="text/javascript" src="<?= site_url()?>public/js/script.js"></script>
<script type="text/javascript" src="<?= site_url();?>public/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= site_url();?>public/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?= site_url()?>public/sw/swipebox.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    height: 200,
    plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
  });

</script>

<script type="text/javascript">

  $(document).ready(function() {
    $('#tabel').DataTable();
  });

  $(document ).ready(function() {
    /* Basic Gallery */
    $('.sw').swipebox();
  });

</script>