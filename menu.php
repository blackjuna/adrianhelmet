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


		<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.html">YOUR ACCOUNT</a>
				<a href="login.html">ORDER HISTORY</a>
		 	</div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="login.html">ABOUT</a>
				<a href="login.html">BRAND</a>
			</div>
			<div class="span3">
				<h5>SUPPORT </h5>
				<a href="login.html">CONTACT US</a>
				<a href="login.html">TERM AND CONDITION</a>
				<a href="login.html">HOW TO SHOP</a>
				<a href="login.html">ORDER STATUS</a>
				<a href="login.html">PRODUCT RETURNS</a>
			</div>