<div class="children form">
<?php echo $this->Form->create('Child'); ?>
	<fieldset>
		<legend><?php echo __('Add Child'); ?></legend>
	<?php
		echo $this->Form->input('daycare_center_id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('middle_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('birthday');
		echo $this->Form->input('room_id');
		echo $this->Form->input('special_needs');
		echo $this->Form->input('Guardian');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Children'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Guardians'), array('controller' => 'guardians', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Guardian'), array('controller' => 'guardians', 'action' => 'add')); ?> </li>
	</ul>
</div>
