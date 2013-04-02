<div class="guardians index">
	<h2><?php echo __('Guardians'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($guardians as $guardian): ?>
	<tr>
		<td><?php echo h($guardian['Guardian']['id']); ?>&nbsp;</td>
		<td><?php echo h($guardian['Guardian']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($guardian['Guardian']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($guardian['Guardian']['phone']); ?>&nbsp;</td>
		<td><?php echo h($guardian['Guardian']['email']); ?>&nbsp;</td>
		<td><?php echo h($guardian['Guardian']['street']); ?>&nbsp;</td>
		<td><?php echo h($guardian['Guardian']['city']); ?>&nbsp;</td>
		<td><?php echo h($guardian['Guardian']['state']); ?>&nbsp;</td>
		<td><?php echo h($guardian['Guardian']['zip']); ?>&nbsp;</td>
		<td><?php echo h($guardian['Guardian']['password']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $guardian['Guardian']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $guardian['Guardian']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $guardian['Guardian']['id']), null, __('Are you sure you want to delete # %s?', $guardian['Guardian']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Guardian'), array('action' => 'add')); ?></li>
	</ul>
</div>
