<div class="form-horizontal">
<?php foreach($query->result() as $id):?>
<?php if(!$id->images == ''):?>
		<?
		# IF DATA DOES EXIST, UNSERIALIZE
		$this->db->where('id', $id->id);
		$new_row = $this->db->get('slideshow_group');
		$row2 = $new_row->row();
		$get_tags = $row2->images;
		$images2 = unserialize($get_tags);
		?>
			<?php foreach($images2 as $key => $value) : ?>
				<?php if($value == "" || $value == " " || is_null($value)) : ?>
				<?unset($images2[$key]); ?>
				<?php endif;?>
			<?php endforeach;?>
<?php endif;?>
<?php echo form_open('slideshow_admin/edit_group/'.$this->uri->segment(3));?>
	<fieldset>
		<legend><?php echo $this->lang->line('label_edit_group');?></legend>
			
			<input type="hidden" id="id" name="id" value="<?php echo $id->id?>" />
			
			<?php echo form_error('name'); ?>
			<div class="control-group">
			<label class="control-label"><?php echo $this->lang->line('label_name');?></label>
				<div class="controls">
				<input type="text" class="field" name="name" value="<?php echo $id->name?>" />
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label"><?php echo $this->lang->line('label_images');?></label>
				<div class="controls">
				<select class="field" class="field" name="images[]" size=10 multiple>
				<?php foreach($images->result() as $catname) : ?>
				<option value="<?php echo $catname->id?>"
				<?php for(@$i = 0; $i < count($images2); $i++) : ?>
				<?$tag_name = $images2[$i];?>
				<?php if($tag_name == $catname->id):?>selected="selected"
				<?php endif;?>
				<?php endfor;?>
				><?php echo $catname->userfile?></option>
				<?php endforeach; ?>
				</select>
				</div>
			</div>
            
			<div class="form-actions">
			<input class="btn btn-primary" type="submit" value="<?php echo $this->lang->line('label_submit');?>" />
			</div>
			
	</fieldset>
<?php echo form_close();?>
<?php endforeach;?>
</div>