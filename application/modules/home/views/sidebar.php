	<div id="sidebar" class="span3">
		<div class="well well-small">
			<a id="myCart" href="<?= base_url();?>invoices/carts">
				<img src="<?= base_url();?>assets/themes-shop/images/ico-cart.png" alt="cart"><?=count($this->cart->contents());?> Items in your cart  <span class="badge badge-warning pull-right"><?=$this->cart->format_number($this->cart->total())?></span>
			</a>
		</div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
		<?php
			// MENU
			$menus = 0;
	        foreach ($menu_sidebar as $menuside)
	        {
	        	if ($menus == 0)
	        	{
	        		echo '<li class="subMenu open"><a>'.$menuside->name.'</a>';
	        		echo '<ul>';
	        	}else
	        	{
	        		echo '<li class="subMenu"><a>'.$menuside->name.'</a>';
	        		echo '<ul style="display:none">';
	        	}
				echo '<li><a href="'.site_url("products/half_face?id_merk=".$menuside->id."&cat=1").'"><i class="icon-chevron-right"></i>HALF FACE </a></li>';
				echo '<li><a href="'.site_url("products/full_face?id_merk=".$menuside->id."&cat=2").'"><i class="icon-chevron-right"></i>FULL FACE </a></li>';
				echo '</ul>';
				// if($menus == 0){ echo '</ul>';}
				echo '</li>';
				$menus=1;
	        }
		?>
		</ul>
		<br/>
	</div>