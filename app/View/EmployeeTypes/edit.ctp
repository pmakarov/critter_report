<div class="employeeTypes form">
<?php echo $this->Form->create('EmployeeType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Employee Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EmployeeType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EmployeeType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Employee Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
	</ul>
</div>
