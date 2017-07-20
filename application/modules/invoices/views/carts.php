		<div class="span9">
			<ul class="breadcrumb">
			<li><a href="<?=base_url();?>">Home</a> <span class="divider">/</span></li>
			<li class="active"> SHOPPING CART</li>
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
						<a href="'.site_url("invoices/minus/".$items['id']."").'">
						<button class="btn" type="button"><i class="icon-minus"></i>
						<a href="'.site_url("invoices/add/".$items['id']."").'">
						<button class="btn" type="button"><i class="icon-plus"></i>
						<a href="'.site_url("invoices/remove/".$items['rowid']."").'">
						<button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button></a>
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
	        		</table>	
					<a href="'.base_url().'" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
					<a href="'.site_url("invoices/checkouts").'" class="btn btn-large pull-right">Checkout <i class="icon-arrow-right"></i></a>';
			?>
		</div>
		</div>
		</div>
	</div>
</div>