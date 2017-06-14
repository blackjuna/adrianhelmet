<div class="col-md-12">
<link rel="stylesheet" type="text/css" href="<?= site_url();?>public/css/dataTables.bootstrap.min.css">
 <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Laporan penjualan bulanan</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body" style="display: hidden;">
   <table id="tabel" class="table table-bordered">
     <thead>
       <tr>
         <th>#</th>
         <th>Bulan</th>
         <th>Tahun</th>
         <th>Jumlah Penjualan</th>
         <th style="text-align: center;"><i class="fa fa-gear"></i></th>
       </tr>
     </thead>
     <tbody>
       <?php 
       function tgl($date){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);

        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
        return($result);
      }
       $no=1; foreach ($lapor as $val) { ?>
       <tr>
         <td><?= $no++;?></td>
         <td><?php $a = explode(' ',tgl($val->date)); echo $a[1]; ?></td>
         <td><?php $a = explode(' ',tgl($val->date)); echo $a[2]; ?></td>
         <td><?= $val->jml;?></td>
         <td style="text-align: center;"><a href="<?=site_url('vp/laporan_b/detail/'.$val->bulan.'/'.$val->tahun)?>" title="lihat">Lihat</a></td>
       </tr>
       <?php } ?>
     </tbody>
   </table>
 </div>
</div>
<script type="text/javascript" src="<?= site_url();?>public/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= site_url();?>public/js/dataTables.bootstrap.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#tabel').DataTable();
  });

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
</div>