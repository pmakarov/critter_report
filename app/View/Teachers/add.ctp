<div class="teachers form">
<?php echo $this->Form->create('Teacher'); ?>
	<fieldset>
		<legend><?php echo __('Add Teacher'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('name');
		echo $this->Form->input('room_id');
		echo $this->Form->input('employee_type_id');
		echo $this->Form->input('daycare_center_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Teachers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employee Types'), array('controller' => 'employee_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee Type'), array('controller' => 'employee_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add')); ?> </li>
	</ul>
</div>
