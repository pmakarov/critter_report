<div class="guardians form">
<?php echo $this->Form->create('Guardian'); ?>
	<fieldset>
		<legend><?php echo __('Edit Guardian'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('street');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Guardian.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Guardian.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Guardians'), array('action' => 'index')); ?></li>
	</ul>
</div>
