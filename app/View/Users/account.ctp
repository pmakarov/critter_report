<!--<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('register'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password_confirm', array('label' => 'Password', 'type' => 'password'));
		echo $this->Form->input('password', array('label' => 'Password Confirm'));
		echo $this->Form->input('role_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>-->
<h2>Account Page</h2>
<h3>Change your password</h3>
<p>You are <?php echo $current_user['User']['username']; ?> who last logged in <?php echo $current_user['User']['lastlogin']; ?>.</p>
 
<?php
echo $this->Form->create(array('action' => 'account'));
echo $this->Form->input('password_old',     array('label' => 'Old password', 'type' => 'password', 'autocomplete' => 'off'));
echo $this->Form->input('password_confirm', array('label' => 'New password', 'type' => 'password', 'autocomplete' => 'off'));
echo $this->Form->input('password',         array('label' => 'Re-enter new password', 'type' => 'password', 'autocomplete' => 'off'));
echo $this->Form->end('Update Password');
?>