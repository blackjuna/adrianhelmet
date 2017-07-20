<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?=base_url();?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Top Sellers</li>
    </ul>
	<h4> Top Sellers<small class="pull-right"> <?php echo count($this->Offers_m->getTopProduct_query()); ?> products are available </small></h4>	
	<hr class="soft"/>
	<br class="clr"/>
	<div id="myTab" class="pull-right">
	 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
	 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
	</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
		<?php
			$produk_list = $this->Offers_m->getTopProduct_query();
			foreach($produk_list as $list){
				$link_image = site_url('assets/images/'.$list->img_link);
				// $fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
				// $price = money_format('%i', $list->price);
				echo '<div class="row">	  
						<div class="span2">';
				echo '<a href="'.site_url("products/details?id_product=".$list->id_product."").'"><img src="'.$link_image.'" alt="'.$list->product_name.'"/></div>';
				echo '<div class="span4">
					<h3>New | Available</h3>				
					<hr class="soft"/>';
				echo '<h5>'.str_replace("-", " ", $list->product_name).'</h5>';
				echo '<p>'.$list->note1.'</p>';
				echo '<a class="btn btn-small pull-right" href="'.site_url("products/details?id_product=".$list->id_product."").'">View Details</a>
						<br class="clr"/></div>';
				echo '<div class="span3 alignR">
				<form class="form-horizontal qtyFrm">
					<h3> Rp.'.$list->price.'</h3>';
				echo '<a href="'.site_url("invoices/add/".$list->id_product."").'" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
					</form></div></div><hr class="soft"/>';
			}
		?>
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
			<?php
				$produk_list = $this->Offers_m->getTopProduct_query();
				foreach($produk_list as $list){
					$link_image = site_url('assets/images/'.$list->img_link);
					// $fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
					// $price = money_format('%i', $list->price);
					echo '<li class="span3">
			 				<div class="thumbnail">';
					echo '<a href="'.site_url("products/details?id_product=".$list->id_product."").'"><img src="'.$link_image.'" alt="'.$list->product_name.'"/></a>';
					echo '<div class="caption"><h5>'.str_replace("-", " ", $list->product_name).'</h5><p>'.$list->note1.'</p>';
					echo '<h4 style="text-align:center"><a class="btn" href="'.site_url("invoices/add/".$list->id_product."").'">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="'.site_url("products/details?id_product=".$list->id_product."").'">Rp.'.$list->price.'</a></h4>
						</div></div></li>';
				}
			?>
		  </ul>
	<hr class="soft"/>
	</div>
</div>
	<div class="pagination">
		<ul>
		<li><a href="#">&lsaquo;</a></li>
		<li><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">...</a></li>
		<li><a href="#">&rsaquo;</a></li>
		</ul>
	</div>
<br class="clr"/>
</div>
</div></div>
</div>