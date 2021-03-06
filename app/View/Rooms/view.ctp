<div class="rooms view">
<h2><?php  echo __('Room'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($room['Room']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Daycare Center'); ?></dt>
		<dd>
			<?php echo $this->Html->link($room['DaycareCenter']['name'], array('controller' => 'daycare_centers', 'action' => 'view', $room['DaycareCenter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($room['Room']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room'), array('action' => 'edit', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Room'), array('action' => 'delete', $room['Room']['id']), null, __('Are you sure you want to delete # %s?', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Children'), array('controller' => 'children', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Child'), array('controller' => 'children', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Children'); ?></h3>
	<?php if (!empty($room['Child'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Daycare Center Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Middle Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Room Id'); ?></th>
		<th><?php echo __('Special Needs'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($room['Child'] as $child): ?>
		<tr>
			<td><?php echo $child['id']; ?></td>
			<td><?php echo $child['daycare_center_id']; ?></td>
			<td><?php echo $child['first_name']; ?></td>
			<td><?php echo $child['middle_name']; ?></td>
			<td><?php echo $child['last_name']; ?></td>
			<td><?php echo $child['birthday']; ?></td>
			<td><?php echo $child['room_id']; ?></td>
			<td><?php echo $child['special_needs']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'children', 'action' => 'view', $child['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'children', 'action' => 'edit', $child['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'children', 'action' => 'delete', $child['id']), null, __('Are you sure you want to delete # %s?', $child['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child'), array('controller' => 'children', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Reports'); ?></h3>
	<?php if (!empty($room['Report'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Child Id'); ?></th>
		<th><?php echo __('Room Id'); ?></th>
		<th><?php echo __('Daycare Center Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Daily Activity'); ?></th>
		<th><?php echo __('Needed Iterms'); ?></th>
		<th><?php echo __('Attitude'); ?></th>
		<th><?php echo __('Sleep'); ?></th>
		<th><?php echo __('Breakfast'); ?></th>
		<th><?php echo __('Lunch'); ?></th>
		<th><?php echo __('Snack'); ?></th>
		<th><?php echo __('Potty'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($room['Report'] as $report): ?>
		<tr>
			<td><?php echo $report['id']; ?></td>
			<td><?php echo $report['child_id']; ?></td>
			<td><?php echo $report['room_id']; ?></td>
			<td><?php echo $report['daycare_center_id']; ?></td>
			<td><?php echo $report['date']; ?></td>
			<td><?php echo $report['daily_activity']; ?></td>
			<td><?php echo $report['needed_iterms']; ?></td>
			<td><?php echo $report['attitude']; ?></td>
			<td><?php echo $report['sleep']; ?></td>
			<td><?php echo $report['breakfast']; ?></td>
			<td><?php echo $report['lunch']; ?></td>
			<td><?php echo $report['snack']; ?></td>
			<td><?php echo $report['potty']; ?></td>
			<td><?php echo $report['notes']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reports', 'action' => 'view', $report['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reports', 'action' => 'edit', $report['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reports', 'action' => 'delete', $report['id']), null, __('Are you sure you want to delete # %s?', $report['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Teachers'); ?></h3>
	<?php if (!empty($room['Teacher'])): ?>
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
		foreach ($room['Teacher'] as $teacher): ?>
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
