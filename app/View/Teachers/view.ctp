<div class="teachers view">
<h2><?php  echo __('Teacher'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teacher['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $teacher['Room']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teacher['EmployeeType']['name'], array('controller' => 'employee_types', 'action' => 'view', $teacher['EmployeeType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Daycare Center'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teacher['DaycareCenter']['name'], array('controller' => 'daycare_centers', 'action' => 'view', $teacher['DaycareCenter']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Teacher'), array('action' => 'edit', $teacher['Teacher']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Teacher'), array('action' => 'delete', $teacher['Teacher']['id']), null, __('Are you sure you want to delete # %s?', $teacher['Teacher']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employee Types'), array('controller' => 'employee_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee Type'), array('controller' => 'employee_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add')); ?> </li>
	</ul>
</div>
