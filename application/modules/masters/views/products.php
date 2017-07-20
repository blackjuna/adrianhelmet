  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$title?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-success" onclick="add_produk()"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
          <button class="btn btn-primary" onclick="edit_produk()"><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
          <button class="btn btn-danger" onclick="remove_produk()"><i class="glyphicon glyphicon-remove"></i> Remove</button>
          <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- </div> -->

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <!-- <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> -->
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.7
    </div>
    <strong>AdrianHelmet &copy; 2016 Copyright to it's <a href="http://almsaeedstudio.com">Owner</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<?php
// $this->load->view($js);
$this->load->view('js');
?>
</body>
</html>

<script type="text/javascript">
  var save_method;
  var table;

  $(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('masters/products/r')?>",
            "type": "POST"
        },
        "columns": [
        { "data":"no","title": "NO" },
        { "data":"code","title": "KODE PRODUK" },
        { "data":"name","title": "NAMA PRODUK" },
        { "data":"size","title": "UKURAN" },
        { "data":"description","title": "KETERANGAN" },
        { "data":"note1","title": "CATATAN 1" },
        { "data":"note2","title": "CATATAN 2" },
        { "data":"img_product","title": "GAMBAR" },
        { "data":"name_merek","title": "MEREK" },
        { "data":"stock","title": "STOK" },
        { "data":"price","title": "HARGA" },
        { "data":"DT_RowId","title": "id" },
        ],

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
        "scrollX": true,
        "sScrollX":"100%",
        "sScrollXInner": "110%",
        "bScrollCollapse": true
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $('#table tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        id_product = table.row( this ).data().id;
    } );
  });

function add_produk()
{
    save_method = 'add';
    $('#formname')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Entri Produk'); // Set Title to Bootstrap modal title
}

function delete_produk(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('masters/products/d')?>/",
            type: "POST",
            data: { id: id, locale: 'en-US' },
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }
}

function edit_produk(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('masters/chart_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="codeChart"]').val(data.code);
            $('[name="name"]').val(data.name);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Chart Part'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function save()
{
    var formData = new FormData( $("#formname")[0] );

    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('masters/products/c')?>";
    } else {
        url = "<?php echo site_url('masters/products/u')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        async : false,
        cache : false,
        contentType : false,
        processData : false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form method="post" action="" enctype="multipart/form-data" id="formname" accept-charset="utf-8" class="form-horizontal">
                <!-- <form enctype="multipart/form-data" accept-charset="utf-8" name="formname" id="formname"  action=""> -->
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Produk</label>
                            <div class="col-md-9">
                                <input name="name" id="name" placeholder="name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Ukuran</label>
                            <div class="col-md-9">
                                <input name="ukuran" id="ukuran" class="form-control" placeholder="Ukuran">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Keterangan</label>
                            <div class="col-md-9">
                                <textarea name="keterangan" id="keterangan" rows="3" placeholder="keterangan" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Catatan 1</label>
                            <div class="col-md-9">
                                <textarea name="catatan1" id="catatan1" rows="3" placeholder="catatan" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Catatan 2</label>
                            <div class="col-md-9">
                                <textarea name="catatan2" id="catatan2" rows="3" placeholder="catatan" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Merek</label>
                            <div class="col-md-9">
                                <select name="merek" id="merek" class="form-control"><option></option>
                                    <?php $merek = $this->mas_m->getmerek();?>
                                    <?php foreach($merek as $rowmerek){?>
                                    <option value="<?=$rowmerek->id?>"><?=$rowmerek->code?></option>
                                    <?php }?>  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kategori Helm</label>
                            <div class="col-md-9">
                                <select name="kategori" id="kategori" class="form-control"><option></option>
                                    <option value='1'>Half Face</option>
                                    <option value='2'>Full Face</option> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Stok</label>
                            <div class="col-md-9">
                                <input name="stok" id="stok" class="form-control" placeholder="stok">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Harga</label>
                            <div class="col-md-9">
                                <input name="harga" id="harga" class="form-control" placeholder="harga">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">File Foto</label>
                            <div class="col-md-9">
                                <input type="file" name="filefoto" id="filefoto" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

</body>
</html>