	<!-- 	<div class="span9">		
			
		</div> -->
		<div class="span9">
		<h4>New product</h4>
			<ul class="thumbnails">
					<?php
						$produk_list = $this->home_m->getcontent_query();
						foreach($produk_list as $list){
							$link_image = site_url('assets/images/'.$list->img_link);
							// $fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
							// $price = money_format('%i', $list->price);
							echo '<li class="span3">';
							echo '<div class="thumbnail">';
							echo '<a href="'.site_url("products/details?id_product=".$list->id_product."").'"><img src="'.$link_image.'" alt="'.$list->product_name.'"/></a>';
							echo '<h5>'.str_replace("-", " ", $list->product_name).'</h5><div class="caption"><p>'.$list->note1.'</p>';
							echo '<h4 style="text-align:center"><a class="btn" href="'.site_url("invoices/add/".$list->id_product."").'">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="'.site_url("products/details?id_product=".$list->id_product."").'">Rp.'.$list->price.'</a></h4>';
							echo '</div>';
						}
						// $this->home->test();
						echo '</div>';
						echo '</li>';
					?>
			</ul>	
		</div>
		</div>
		</div>
	</div>
</div>