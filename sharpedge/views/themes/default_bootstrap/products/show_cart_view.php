<?php echo form_open('products/updatecart_view'); ?>
<input type="hidden" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf_protection" /> 
<input type="hidden" value="test" id="test" /> 
<table class="table table-striped text-size">
<tr>
  <th>QTY</th>
  <th>Item Description</th>
  <th style="text-align:right">Item Price</th>
  <th style="text-align:right">Sub-Total</th>
</tr>
<?php $i = 1; ?>
<?php foreach($cart_contents as $items): ?>
	<?php// echo form_hidden('rowid[]', $items['rowid']);?>
	<input type="hidden" id="row_<?php echo $i?>" name="rowid[]" value="<?php echo $items['rowid'];?>" />
	<tr>
	  <td><fieldset><?php echo form_input(array('class' => 'field span1', 'id' => 'qty_' . $i, 'name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'style' => 'font-size:1.2em;')); ?></fieldset></td>
	  <td>
		<?php echo str_replace(' 2 Hours', ' + 2 Hours Training', $items['name']); ?>
			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
						
						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
										
					<?php endforeach; ?>
				</p>
				
			<?php endif; ?>
	  </td>
	  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
	</tr>
<?php $i++; ?>

<?php endforeach; ?>
<tr>
<td><input name="update" id="update_cart" class="btn" type="submit" value="Update Cart" /></td>
<td></td>
<td class="right">Total</td>
<td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>
</table>
<?php echo form_close();?>
<div class="form-horizontal">
<?php echo form_open('products/place_order');?>
<div class="control-group">
<label class="control-label">Payment Method</label>
	<div class="controls">
	<?php foreach($gateways->result() as $gw):?>
	<input type="radio" name="gateway_selected" value="<?php echo $gw->module_name?>" /> <?php echo $gw->name?><br />
	<?php endforeach;?>
	</div>
</div>
<div style="text-align:center;">
<input type="submit" class="btn btn-success" name="checkout" value="Place Order" />
</div>
</div>
<?php echo form_close();?> 