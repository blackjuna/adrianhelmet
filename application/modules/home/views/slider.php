<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
		<?php
			$produk_list = $this->home_m->getslider_query();
			$count_corousel =0;
			foreach($produk_list as $list){
				if ($count_corousel ==0) {
					echo '<div class="item active">';
				}else{
					echo '<div class="item">';
				}
				echo '<div class="container">
						<a href="'.site_url("account/registration").'"><img src="'.site_url("assets/images/carousel/".$list->file_name).'" alt=""/></a>
						<div class="carousel-caption">
						  <h4>'.$list->tittle.'</h4>
						  <p>'.$list->note.'</p>
						</div>
					  </div>
					</div>';
				$count_corousel++;
			}
		?>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>
<div id="mainBody">
	<div class="container">
	<div class="row">