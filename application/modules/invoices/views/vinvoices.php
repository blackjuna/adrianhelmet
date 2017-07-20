  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
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
        <?php
            if ($user_groups == 'ADMIN'){
                echo '<button class="btn btn-success" onclick="add_chart()"><i class="glyphicon glyphicon-plus"></i> Konf. Pembayaran</button>
          <button class="btn btn-danger" onclick=""><i class="glyphicon glyphicon-remove"></i> Batal Pemby.</button>
          <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>';
            }else{
                echo '<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>';
            }
          
        ?>
        </div>
        <!-- /.box-footer-->
      </div>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$title?> FOOTER</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="table_footer" class="table table-striped table-bordered" cellspacing="0" width="100%">
          </table>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
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
    if ( $.fn.DataTable.isDataTable('#table') ) { 
        $("#table").DataTable().destroy();
    }

    $("#table").empty();
    table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // "sDom": "Rlfrtip",
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('invoices/vinvoices/r')?>",
            "type": "POST"
        },
        "columns": [
        { "data":"no","title": "NO" },
        { "data":"code","title": "CODE" },
        { "data":"date","title": "DATE" },
        { "data":"due_date","title": "DUE DATE" },
        { "data":"feedback","title": "FEEDBACK" },
        { "data":"note","title": "NOTE" },
        { "data":"status_feed","title": "STATUS FEED" },
        { "data":"confirmation_payment","title": "CONFIRMATION PAYMENT" },
        { "data":"name","title": "NAMA PELANGGAN" },
        { "data":"email","title": "EMAIL" },
        { "data":"address","title": "ALAMAT" },
        { "data":"telephone","title": "NO TELP" },
        { "data":"total","title": "TOTAL HARGA" },
        { "data":"DT_RowId","title": "ID FAKTUR" },
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
    $('#table tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        id_invoices = table.row( this ).data().id;
          Invoices_details(id_invoices);
    } ); 
  });

function Invoices_details(id)
{
    if ( $.fn.DataTable.isDataTable('#table_footer') ) { 
          $("#table_footer").DataTable().destroy();
        }

        $("#table_footer").empty();
    table_footer = $('#table_footer').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // "sDom": "Rlfrtip",
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('invoices/details')?>/"+id,
            "type": "post"
        },
        "columns": [
            { "data":"no","title": "NO" },
            { "data":"code_product","title": "CODE PRODUCT" },
            { "data":"name_product","title": "NAME PRODUCT" },
            { "data":"name_merk","title": "MEREK PRODUCT" },
            { "data":"qty","title": "QTY" },
            { "data":"price","title": "HARGA" },
            { "data":"subtotal","title": "SUBTOTAL" }
        ],

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
        "paging":false,
        "searching":false,
        "scrollX": true,
        "sScrollX":"100%",
        "sScrollXInner": "110%",
        "bScrollCollapse": true
    });
    // $.ajax({
    // "url": "<?php echo site_url('invoices/details')?>/"+id,
    // "dataType": "json",
    // "type": "post",
    // "success": function(json) {
    //     var tableHeaders;

    //     // $("#tables3").find('thead tr th').remove();
    //     $.each(json.columns, function(i, val){
    //         tableHeaders += "<th>" + val + "</th>";
    //     });

    //     if ( $.fn.DataTable.isDataTable('#tables3') ) { 
    //       $("#tables3").DataTable().destroy();
    //     }

    //     $("#tables3").empty();
    //     $("#tables3").append('<thead><tr>' + tableHeaders + '</tr></thead>');
    //     $('#tables3').DataTable({
    //       "paging":false,
    //       "searching":false,
    //       "data":json.data,
    //       "sorting":false, 
    //       "scrollX": true,
    //       "sScrollX":"100%",
    //       "sScrollXInner": "110%",
    //       "bScrollCollapse": true});
    // }
}

function add_chart()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Charts'); // Set Title to Bootstrap modal title
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('masters/charts/c')?>";
    } else {
        url = "<?php echo site_url('masters/charts/u')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
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

function delete_achart(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('masters/charts/d')?>/",
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

function edit_achart(id)
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
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Code Chart</label>
                            <div class="col-md-9">
                                <input name="codeChart" placeholder="Code Charts" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name Chart</label>
                            <div class="col-md-9">
                                <input name="name" placeholder="Name Charts" class="form-control" type="text">
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