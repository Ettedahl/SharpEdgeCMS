<script type="text/javascript">
    $('#profile_tabs a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    })
</script>
<ul class="nav nav-tabs remove_underline" id="profile_tabs">
<li><a href="#home" data-toggle="tab">Home</a></li>
<li><a href="#changepassword" data-toggle="tab">Change Password</a></li>
<li><a href="#profile" data-toggle="tab">Profile</a></li>
<li><a href="#forumpreferences" data-toggle="tab">Preferences</a></li>
<li><a href="#settings" data-toggle="tab">Settings</a></li>
</ul>

<div class="tab-content">
<div class="tab-pane active" id="home">
<?php foreach($users->result() as $id):?>
<div class='mainInfo'>
	<?php echo form_open("auth/edit_profile");?>
	<fieldset>
	<legend>Home</legend>
		<div class="control-group">
		<label class="control-label"><?php echo $this->lang->line('label_email_address');?></label>
			<div class="controls">
			<input type="text" class="field" name="email" value="<?php echo $id->email?>" />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label"><?php echo $this->lang->line('label_first_name');?></label>
			<div class="controls">
			<input type="text" class="field" name="first_name" value="<?php echo $id->first_name?>" />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label"><?php echo $this->lang->line('label_last_name');?></label>
			<div class="controls">
			<input type="text" class="field" name="last_name" value="<?php echo $id->last_name?>" />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label"><?php echo $this->lang->line('label_company_name');?></label>
			<div class="controls">
			<input type="text" class="field" name="company" value="<?php echo $id->company?>" />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label"><?php echo $this->lang->line('label_phone');?></label>
			<div class="controls">
			<input type="text" class="field" name="phone" value="<?php echo $id->phone?>" />
			</div>
		</div>

		<div class="form-actions">
		<?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"');?>
		</div>
	<?php echo form_close();?>
	</fieldset>
</div>
<?php endforeach;?>
</div>

<div class="tab-pane" id="changepassword">
<?php echo modules::run('users/auth/change_password');?>
</div>

<div class="tab-pane" id="profile">
<?php echo modules::run('profile/edit_profile');?>
</div>

<div class="tab-pane" id="forumpreferences">
<?php echo modules::run('profile/edit_preferences');?>
</div>

<div class="tab-pane" id="settings">
<?php echo modules::run('profile/edit_settings');?>
</div>

</div>