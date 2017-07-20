		<div class="span9">
			<ul class="breadcrumb">
			<li><a href="<?=base_url();?>">Home</a> <span class="divider">/</span></li>
			<li class="active">CHECKOUTS</li>
		    </ul>
			<h3>  SHOPPING CART [ <small><?=count($this->cart->contents());?> Item(s) </small>]</h3>	
			<hr class="soft"/>		
			
			<?php 
				echo '<table class="table table-bordered">
						<thead>
							<tr>
								<th>Product</th>
								<th>Name</th>
								<th>Quantity/Update</th>
								<th>Price</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>';
				foreach($this->cart->contents() as $items){
				echo '<tr>';
					if ($this->cart->has_options($items['rowid']) == TRUE){
						foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value){
							echo '<td><img width="60" src="'.site_url('assets/images/'.$option_value).'" alt=""/></td>';
						}
					}
				echo '	<td>'.$items['name'].'</td>
						<td><div class="input-append">
						<input class="span1" style="max-width:34px" id="appendedInputButtons" size="16" type="text" value="'.$items['qty'].'" disabled>
						</div>
						</td>
						<td>'.$items['price'].'</td>
						<td>'.$items['subtotal'].'</td>
					</tr>';
				}
				echo '<tr>
						<td colspan="4" style="text-align:right"><strong>TOTAL =</strong></td>
						<td class="label label-important" style="display:block"> <strong> Rp.'.$this->cart->format_number($this->cart->total()).' </strong></td>
						</tr>
					</tbody>
	        		</table>	';
	        ?>
	        	<table class="table table-bordered">
					<tr><th> Beritahu kami bagaimana kami dapat menghubungi anda :  </th></tr>
					 <tr> 
					 <td>
						<form action="#" class="form-horizontal" id="form_conf">
							<div class="form-body">
							<?php 
								if (!$this->ion_auth->logged_in()){ 
								echo '
								<div class="control-group">
								  <label class="control-label" >Nama Lengkap<sup>*</sup></label>
								  <div class="controls">
									<input name="name" type="text" id="inputUsername" placeholder="Nama"  required="required">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" >Email<sup>*</sup></label>
								  <div class="controls">
									<input name="email" id="input_email" type="email" placeholder="Email"  required="required">
								  </div>
								</div>
								<div class="control-group">
									<label class="control-label" >Alamat<sup>*</sup></label>
									<div class="controls">
									  <input name="address" type="text"  id="address" placeholder="Adress"  required="required">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" >No. Telephone<sup>*</sup></label>
									<div class="controls">
									  <input name="phone" type="text" id="phone" placeholder="phone"  required="required">
									</div>
								</div>';
							}
							?>
								<div class="control-group">
									<label class="control-label" >Pesan <sup>*</sup></label>
									<div class="controls">
									  <textarea name="pesan" id="pesan" placeholder="(Ukuran dan keterangan lain)"  required="required"></textarea> 
									</div>
								</div>	
							</div>
						</form>
						<div class="control-group">
						  <div class="controls">
							<button type="submit" class="btn btn-small pull-right" id="btnsave" onclick="save()" pull-right>Kirim</button>
							<button type="submit" class="btn btn-small pull-right" id="btnulang" onclick="clear_feedback()" pull-right>Ulangi Semua</button>
						  </div>
						</div>
					  </td>
					  </tr>
				</table>
				<a href="<?=base_url()?>" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
		</div>
		</div>
	</div>
</div>