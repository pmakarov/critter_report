<div class="children index">
	<h2><?php echo __('Children'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('daycare_center_id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('middle_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('birthday'); ?></th>
			<th><?php echo $this->Paginator->sort('room_id'); ?></th>
			<th><?php echo $this->Paginator->sort('special_needs'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($children as $child): ?>
	<tr>
		<td><?php echo h($child['Child']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($child['DaycareCenter']['name'], array('controller' => 'daycare_centers', 'action' => 'view', $child['DaycareCenter']['id'])); ?>
		</td>
		<td><?php echo h($child['Child']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($child['Child']['middle_name']); ?>&nbsp;</td>
		<td><?php echo h($child['Child']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($child['Child']['birthday']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($child['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $child['Room']['id'])); ?>
		</td>
		<td><?php echo h($child['Child']['special_needs']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $child['Child']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $child['Child']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $child['Child']['id']), null, __('Are you sure you want to delete # %s?', $child['Child']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Child'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Guardians'), array('controller' => 'guardians', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Guardian'), array('controller' => 'guardians', 'action' => 'add')); ?> </li>
	</ul>
</div>
