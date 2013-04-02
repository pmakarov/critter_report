<div class="row-fluid">

<div class="span12 well">
	<h2><?php echo __('Teachers'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('room_id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('daycare_center_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($teachers as $teacher): ?>
	<tr>
		<td><?php echo h($teacher['Teacher']['id']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['email']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['password']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($teacher['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $teacher['Room']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($teacher['EmployeeType']['name'], array('controller' => 'employee_types', 'action' => 'view', $teacher['EmployeeType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($teacher['DaycareCenter']['name'], array('controller' => 'daycare_centers', 'action' => 'view', $teacher['DaycareCenter']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $teacher['Teacher']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $teacher['Teacher']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $teacher['Teacher']['id']), null, __('Are you sure you want to delete # %s?', $teacher['Teacher']['id'])); ?>
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
<div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav affix-top">
			<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' . __('New Teacher'), array('action' => 'add'), array('escape'=>false)); ?></li>
			<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('List Rooms'), array('controller' => 'rooms', 'action' => 'index'), array('escape'=>false)); ?></li>
			<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('New Room'), array('controller' => 'rooms', 'action' => 'add'), array('escape'=>false)); ?></li>
			<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('List Employee Types'), array('controller' => 'employee_types', 'action' => 'index'), array('escape'=>false)); ?></li>
			<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('New Employee Type'), array('controller' => 'employee_types', 'action' => 'add'), array('escape'=>false)); ?></li>
			<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index'), array('escape'=>false)); ?></li>
			<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add'), array('escape'=>false)); ?></li>
        </ul>
</div>
</div>
