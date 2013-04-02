<div class="children view">
<h2><?php  echo __('Child'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($child['Child']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Daycare Center'); ?></dt>
		<dd>
			<?php echo $this->Html->link($child['DaycareCenter']['name'], array('controller' => 'daycare_centers', 'action' => 'view', $child['DaycareCenter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($child['Child']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Middle Name'); ?></dt>
		<dd>
			<?php echo h($child['Child']['middle_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($child['Child']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($child['Child']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room'); ?></dt>
		<dd>
			<?php echo $this->Html->link($child['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $child['Room']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Special Needs'); ?></dt>
		<dd>
			<?php echo h($child['Child']['special_needs']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Child'), array('action' => 'edit', $child['Child']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Child'), array('action' => 'delete', $child['Child']['id']), null, __('Are you sure you want to delete # %s?', $child['Child']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Children'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Child'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Guardians'), array('controller' => 'guardians', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Guardian'), array('controller' => 'guardians', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Guardians'); ?></h3>
	<?php if (!empty($child['Guardian'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Zip'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($child['Guardian'] as $guardian): ?>
		<tr>
			<td><?php echo $guardian['id']; ?></td>
			<td><?php echo $guardian['first_name']; ?></td>
			<td><?php echo $guardian['last_name']; ?></td>
			<td><?php echo $guardian['phone']; ?></td>
			<td><?php echo $guardian['email']; ?></td>
			<td><?php echo $guardian['street']; ?></td>
			<td><?php echo $guardian['city']; ?></td>
			<td><?php echo $guardian['state']; ?></td>
			<td><?php echo $guardian['zip']; ?></td>
			<td><?php echo $guardian['password']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'guardians', 'action' => 'view', $guardian['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'guardians', 'action' => 'edit', $guardian['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'guardians', 'action' => 'delete', $guardian['id']), null, __('Are you sure you want to delete # %s?', $guardian['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Guardian'), array('controller' => 'guardians', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
