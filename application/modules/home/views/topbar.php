<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="<?= base_url();?>"><img src="<?= base_url();?>assets/images/logo/logo-adrian-helmet.jpg" alt="AdrianHelmet"/></a>
		<form class="form-inline navbar-search" method="post" action="products.html" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>All</option>
			<option>HALF FACE </option>
			<option>FULL FACE </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
    	<?php
    		foreach ($menu_topbar as $menutop)
    		{
    			// $module_page_link = site_url($menutop->module_page_link);
    			echo '
			 	<li class=""><a href="'.site_url($menutop->page_link).'">'.$menutop->module_name.'</a></li>';
	 		}
	 	?>
	 <a href="<?= base_url();?><?=$link_button_log;?>" role="button">
	 	<span class="btn btn-large btn-success"><?=$button_log;?></span></a>
	</li>
    </ul>
  </div>
</div>
</div>
</div>