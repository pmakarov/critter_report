<div class="reports view">
<h2><?php  echo __('Report'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($report['Report']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Child'); ?></dt>
		<dd>
			<?php echo $this->Html->link($report['Child']['last_name'], array('controller' => 'children', 'action' => 'view', $report['Child']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room'); ?></dt>
		<dd>
			<?php echo $this->Html->link($report['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $report['Room']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Daycare Center'); ?></dt>
		<dd>
			<?php echo $this->Html->link($report['DaycareCenter']['name'], array('controller' => 'daycare_centers', 'action' => 'view', $report['DaycareCenter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($report['Report']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Daily Activity'); ?></dt>
		<dd>
			<?php echo h($report['Report']['daily_activity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Needed Iterms'); ?></dt>
		<dd>
			<?php echo h($report['Report']['needed_iterms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attitude'); ?></dt>
		<dd>
			<?php echo h($report['Report']['attitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sleep'); ?></dt>
		<dd>
			<?php echo h($report['Report']['sleep']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Breakfast'); ?></dt>
		<dd>
			<?php echo h($report['Report']['breakfast']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lunch'); ?></dt>
		<dd>
			<?php echo h($report['Report']['lunch']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Snack'); ?></dt>
		<dd>
			<?php echo h($report['Report']['snack']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Potty'); ?></dt>
		<dd>
			<?php echo h($report['Report']['potty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($report['Report']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Report'), array('action' => 'edit', $report['Report']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Report'), array('action' => 'delete', $report['Report']['id']), null, __('Are you sure you want to delete # %s?', $report['Report']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Children'), array('controller' => 'children', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Child'), array('controller' => 'children', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Teachers'); ?></h3>
	<?php if (!empty($report['Teacher'])): ?>
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
		foreach ($report['Teacher'] as $teacher): ?>
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
