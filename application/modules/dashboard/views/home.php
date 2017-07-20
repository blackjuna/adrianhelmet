  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <!-- <img src="<?= base_url();?>assets/image/wallpaper-trigraha.jpg" id="bg" alt=""> -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$title?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="#" id="form_export">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Nama Pengguna : </label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="username" value="<?=$username?>" disabled>
                    </div>
                      <!-- /.input group -->
                  </div>
                  <br><br>
        
                  <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">Nama Depan : </label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="firstname" value="<?=$first_name?>" disabled>
                    </div>
                      <!-- /.input group -->
                  </div>
                  <br><br>
                  <!-- <p><br></p> -->
            
                  <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Nama Belakang : </label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="lastname" value="<?=$last_name?>" disabled>
                    </div>
                  </div>
                  <br><br>
                  <!-- <p><br></p> -->

                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email : </label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="email" value="<?=$email?>"  disabled>
                    </div>
                  </div>
                  <br><br>
                  <!-- <p><br></p> -->

                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="role" class="col-sm-2 control-label">Role : </label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="role" value="<?=$user_groups?>" disabled>
                    </div>
                  </div>
                  <br><br>
                  <!-- <p><br></p> -->
                  <!-- /.form-group -->
                <!-- /.col -->
                </div>
                <div class="col-md-4">
                  <img src="<?=base_url();?>assets/bootstrap-adminlte/dist/img/<?=$image?>" class="img-circle" alt="<?=base_url();?>assets/bootstrap-adminlte/dist/img/$image">
                </div>
              </div>
            </form>  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
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