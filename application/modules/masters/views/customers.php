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
          <!-- <button class="btn btn-success" onclick="add_customers()"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
          <button class="btn btn-primary" onclick="edit_customers()"><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
          <button class="btn btn-danger" onclick="delete_customers()"><i class="glyphicon glyphicon-remove"></i> Remove</button> -->
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
        // "destroy": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('masters/customers/r')?>",
            "type": "POST"
        },
        "columns": [
        { "data":"no","title": "NO" },
        { "data":"name","title": "NAME" },
        { "data":"email","title": "EMAIL" },
        { "data":"address","title": "ALAMAT" },
        { "data":"telephone","title": "TELEPHONE" },
        { "data":"note","title": "PESAN" },
        { "data":"DT_RowId","title": "id" }
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
  });

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
</script>

</body>
</html>