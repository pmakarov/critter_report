<form class="cmxform" id="registerForm" method="post" action="">
  <div class="row-fluid">
    <div class="span12">
      <div class="critterWell" id="formContainer">
        <div id="mainForm"> 
        	<div id="flashMessage" class="flash"><?php echo $this->Session->flash(); ?></div>
              <div class="row-fluid">
              <div class="span6">
              <h3>Critter-Report is currently only being released in select day cares. Check back soon!</h3> If you are a childcare provider interested in automating your administrative processes, please feel free to <?php echo $this->Html->link('contact us',array('controller'=>'contacts','admin'=>false));?></div>
                </div>
<?php /*echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Register'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password_confirm', array('label' => 'Password', 'type' => 'password'));
		echo $this->Form->input('password', array('label' => 'Password Confirm'));
		echo $this->Form->input('role_id', array('hidden' => true, 'selected' => '3', 'label'=>false));
		echo $this->Form->input('captcha', array('label' => 'Calculate this: '.$captcha));
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Create an account'), array('class' => 'btn btn-success'));
 echo $this->Form->end();*/?>
</div>
</div>
</div>
</div>
</form>
