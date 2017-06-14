 <?php 
 function tgl($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
    return($result);
}?>
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Laporan bulan <?=$this->uri->segment(4)?>,<?=$this->uri->segment(5)?></div>
<div class="panel-body">
   <table id="tabel" class="table table-bordered">
     <thead>
       <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Stok awal</th>
        <th>Stok akhir</th>
        <th>Terjual</th>
       </tr>
     </thead>
     <tbody>
    <?php $no=1; foreach ($val as $key){ ?>    
       <tr>
         <td><?=$no++;?></td>
         <td><?=$key->nama_produk;?></td>
         <td><?=$key->stok_awal; ?></td>
         <td><?=$key->stok_akhir;?></td>
         <td><?php echo $key->terjual; $a[] = $key->terjual;?></td>
       </tr>
    <?php } ?>
    <tr>
           <td colspan="4">Total jumlah keseluruhan yang terjual :</td>
           <td><?= array_sum($a);?></td>
       </tr>
     </tbody>
   </table>
</div>
<div class="panel-footer">
    <button onClick="window.print();" id="kutu" class="btn btn-danger">Print</button> 
</div>   
</div>
<div class="panel panel-default">
<div class="panel-heading">Laporan bulan :  <?=$this->uri->segment(4)?>,<?=$this->uri->segment(5)?></div>
<div class="panel-body" id="chart">
<input id="bulan" type="hidden" value="<?php echo $this->uri->segment(4); ?>">
<input id="tahun" type="hidden" value="<?php echo $this->uri->segment(5); ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'chart',
                    type: 'bar',
                },
                title: {
                    text: 'Transaksi',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Requests'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },

                series: []
            }

            $.getJSON("../../../../vp/getdatachart/"+$('#bulan').val()+'/'+$('#tahun').val(), function(json) {
            options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
                options.series[2] = json[3];
                chart = new Highcharts.Chart(options);
            });
        });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/hc/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/hc/modules/exporting.js"></script>
<div id="container"></div>
</div>   
</div>
</div>
