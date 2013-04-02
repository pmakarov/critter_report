<div class="reports index">
	<h2><?php echo __('Reports'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('child_id'); ?></th>
			<th><?php echo $this->Paginator->sort('room_id'); ?></th>
			<th><?php echo $this->Paginator->sort('daycare_center_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('daily_activity'); ?></th>
			<th><?php echo $this->Paginator->sort('needed_iterms'); ?></th>
			<th><?php echo $this->Paginator->sort('attitude'); ?></th>
			<th><?php echo $this->Paginator->sort('sleep'); ?></th>
			<th><?php echo $this->Paginator->sort('breakfast'); ?></th>
			<th><?php echo $this->Paginator->sort('lunch'); ?></th>
			<th><?php echo $this->Paginator->sort('snack'); ?></th>
			<th><?php echo $this->Paginator->sort('potty'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($reports as $report): ?>
	<tr>
		<td><?php echo h($report['Report']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($report['Child']['last_name'], array('controller' => 'children', 'action' => 'view', $report['Child']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($report['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $report['Room']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($report['DaycareCenter']['name'], array('controller' => 'daycare_centers', 'action' => 'view', $report['DaycareCenter']['id'])); ?>
		</td>
		<td><?php echo h($report['Report']['date']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['daily_activity']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['needed_items']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['attitude']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['sleep']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['breakfast']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['lunch']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['snack']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['potty']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['notes']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $report['Report']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $report['Report']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $report['Report']['id']), null, __('Are you sure you want to delete # %s?', $report['Report']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Report'), array('action' => 'add')); ?></li>
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
