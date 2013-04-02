<div class="employeeTypes view">
<h2><?php  echo __('Employee Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($employeeType['EmployeeType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($employeeType['EmployeeType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Employee Type'), array('action' => 'edit', $employeeType['EmployeeType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Employee Type'), array('action' => 'delete', $employeeType['EmployeeType']['id']), null, __('Are you sure you want to delete # %s?', $employeeType['EmployeeType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Employee Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Teachers'); ?></h3>
	<?php if (!empty($employeeType['Teacher'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Room Id'); ?></th>
		<th><?php echo __('Employee Type Id'); ?></th>
		<th><?php echo __('Daycare Center Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($employeeType['Teacher'] as $teacher): ?>
		<tr>
			<td><?php echo $teacher['id']; ?></td>
			<td><?php echo $teacher['email']; ?></td>
			<td><?php echo $teacher['password']; ?></td>
			<td><?php echo $teacher['name']; ?></td>
			<td><?php echo $teacher['room_id']; ?></td>
			<td><?php echo $teacher['employee_type_id']; ?></td>
			<td><?php echo $teacher['daycare_center_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'teachers', 'action' => 'view', $teacher['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'teachers', 'action' => 'edit', $teacher['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'teachers', 'action' => 'delete', $teacher['id']), null, __('Are you sure you want to delete # %s?', $teacher['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
