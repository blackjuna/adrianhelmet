<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url();?>assets/bootstrap-adminlte/dist/img/<?=$image?>" class="img-circle" alt="User Image">

        </div>
        <div class="pull-left info">
          <p><?=$first_name.' '.$last_name?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <div class="user-panel">
        <div class="image">
         <button type="button" class="btn btn-block btn-success"><a href="<?=base_url();?>">LIHAT SITUS WEB</a></button>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header" align="center">NAVIGASI UTAMA</li>
        <?php 
        // MENU
        $module_group_id = 0;
        $module_id=0;
        $multilevel=0;
        $closed_sub_menu = 0;
        $closed_level_menu = 0;
        foreach ($menus as $menu)
        {
          $module_page_link = site_url($menu->module_page_link);
          if ($module_group_id != $menu->module_group_id)
          {
            if ($closed_sub_menu) echo "</ul></li>";
              
            $module_group_id   = $menu->module_group_id;
            echo '<li class="treeview">';
            
            // Default Navbar
            if($menu->multilevel == 1){
              echo '<a href="'.$module_page_link.'">';
              echo '<i class="fa fa-fw '.$menu->module_group_icon.'"></i><span>'.$menu->module_group_name.'</span></a>';
              echo "</li>";
              if($menu->multilevel != 1) {
                echo '<ul class="treeview-menu">';
              }
              $closed_sub_menu=0;
            }else{
              echo '<a href="#">';
              echo '<i class="fa fa-fw '.$menu->module_group_icon.'"></i><span>'.$menu->module_group_name.'</span><i class="fa fa-angle-left pull-right"></i></a>';
              echo '<ul class="treeview-menu">';
            
              // SUB MENU DETAIL
              // $module_page_link = site_url($menu->module_page_link);

              echo '<li><a href="'.$module_page_link.'"><i class="fa fa-circle-o text-aqua"></i>'.$menu->module_name.'</a></li>';
                
              $closed_sub_menu = 1;
            }
          }
          else
          {
            $module_group_id   = $menu->module_group_id;
            // $module_page_link = site_url($menu->module_page_link);
            echo '<li><a href="'.$module_page_link.'"><i class="fa fa-circle-o text-aqua"></i>'.$menu->module_name.'</a></li>';
          }
        }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- <div class="content-wrapper"> -->
