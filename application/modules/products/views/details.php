<div class="span9">
    <ul class="breadcrumb">
    <li><a href="<?= base_url();?>">Home</a> <span class="divider">/</span></li>
    <li><a href="">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>	
	<div class="row">	  
		<div id="gallery" class="span3">
			<?php
				$produk_list = $this->Products_m->getDetails_query();
				foreach($produk_list as $list){
					$link_image = site_url('assets/images/'.$list->img_link);

					echo'<a href="'.$link_image.'" title="'.$list->product_name.'">
						<img src="'.$link_image.'" style="width:100%" alt="'.$list->product_name.'"/></a>';
					echo '<div id="differentview" class="moreOptopm carousel slide">
		                <div class="carousel-inner">
		                  <div class="item active">
		                   <a href="'.$link_image.'"> <img style="width:29%" src="'.$link_image.'" alt=""/></a>
		                   <a href="'.$link_image.'"> <img style="width:29%" src="'.$link_image.'" alt=""/></a>
		                   <a href="'.$link_image.'" > <img style="width:29%" src="'.$link_image.'" alt=""/></a>
		                  </div>
		                  <div class="item">
		                   <a href="'.$link_image.'" > <img style="width:29%" src="'.$link_image.'" alt=""/></a>
		                   <a href="'.$link_image.'"> <img style="width:29%" src="'.$link_image.'" alt=""/></a>
		                   <a href="'.$link_image.'"> <img style="width:29%" src="'.$link_image.'" alt=""/></a>
		                  </div>
		                </div>
		          		</div>
					</div>';
					echo '<div class="span6">
							<h3>'.str_replace("-", " ", $list->product_name).'</h3>
							<small>'.$list->description.'</small>
							<hr class="soft"/>
							  <div class="control-group">
								<label class="control-label"><span>Rp.'.$list->price.'</span></label>
								<div class="controls">
								<a href="'.site_url("invoices/add/".$list->id_product."").'">
								<button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button></a>
								</div>
							  </div>
							<hr class="soft"/>
							<h4>'.$list->stock.' items in stock</h4>
							<hr class="soft clr"/>
							<p>'.$list->note1.'</p>
							<a class="btn btn-small pull-right" href="#detail">More Details</a>
							<br class="clr"/>
						<a href="#" name="detail"></a>
						<hr class="soft"/>
						</div>';
					echo '<div class="span9">
				            <ul id="productDetail" class="nav nav-tabs">
				              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
				            </ul>
				            <div id="myTabContent" class="tab-content">
				              	<div class="tab-pane fade active in" id="home">
								  	<h4>Product Information</h4>
					                <table class="table table-bordered">
										<tbody>
										<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
										<tr class="techSpecRow"><td class="techSpecTD1">Merek: </td><td class="techSpecTD2">'.$list->merek_name.'</td></tr>
										<tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2">'.$list->product_name.'</td></tr>
										<tr class="techSpecRow"><td class="techSpecTD1">Ukuran:</td><td class="techSpecTD2">'.$list->size.'</td></tr>
										<tr class="techSpecRow"><td class="techSpecTD1">Keterangan:</td><td class="techSpecTD2">'.$list->description.'</td></tr>
										<tr class="techSpecRow"><td class="techSpecTD1">Catatan:</td><td class="techSpecTD2">'.$list->note1.'</td></tr>
										</tbody>
									</table>
				      			</div>
							</div>
				  		</div>';
				}
			?>
	</div>
</div>
</div> </div>
</div>