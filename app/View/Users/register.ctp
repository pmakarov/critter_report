<form class="cmxform" id="registerForm" method="post" action="">
  <div class="row-fluid">
    <div class="span12">
      <div class="well" id="formContainer">
        <div id="mainForm"> 
        	<div id="flashMessage" class="flash"><?php echo $this->Session->flash(); ?></div>
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Register'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password_confirm', array('label' => 'Password', 'type' => 'password'));
		echo $this->Form->input('password', array('label' => 'Password Confirm'));
		echo $this->Form->input('role_id', array('hidden' => true, 'selected' => '3', 'label'=>false));
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success'));
 echo $this->Form->end();?>
</div>
</div>
</div>
</div>
</form>
