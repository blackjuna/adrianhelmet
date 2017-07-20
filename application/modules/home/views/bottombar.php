	<div  id="footerSection">
	<div class="container">
		<div class="row">
		<?php
			$menus = 0;
			$module_group_id = 0;
			$closed_sub_menu = 0;
	        foreach ($menu_bottom as $menubottom)
	        {
	        	$module_page_link = site_url($menubottom->module_page_link);
	        	if ($module_group_id != $menubottom->module_group_id)
          		{
          			$module_group_id   = $menubottom->module_group_id;

          			if ($closed_sub_menu) echo "</div>";
		            echo '<div class="span3">';
		            echo '<h5>'.$menubottom->module_group_name.'</h5>';
		            echo'<a href="'.$module_page_link.'">'.$menubottom->module_name.'</a>';
          		}
          		else
          		{
		            
          			$module_group_id   = $menubottom->module_group_id;
          			echo'<a href="'.$module_page_link.'">'.$menubottom->module_name.'</a>';

          			
          			$closed_sub_menu = 1;
          		}
			}
			echo '</div>';
		?>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="<?= base_url();?>assets/themes-shop/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="<?= base_url();?>assets/themes-shop/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="<?= base_url();?>assets/themes-shop/images/youtube.png" title="youtube" alt="youtube"/></a>
			</div> 
		 </div>
		<!-- <p class="pull-right">&copy; Bootshop</p> -->
	</div><!-- Container End -->
	</div>