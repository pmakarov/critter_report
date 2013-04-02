<div class="guardians view">
<h2><?php  echo __('Guardian'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($guardian['Guardian']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($guardian['Guardian']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($guardian['Guardian']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($guardian['Guardian']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($guardian['Guardian']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($guardian['Guardian']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($guardian['Guardian']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($guardian['Guardian']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($guardian['Guardian']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($guardian['Guardian']['password']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Guardian'), array('action' => 'edit', $guardian['Guardian']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Guardian'), array('action' => 'delete', $guardian['Guardian']['id']), null, __('Are you sure you want to delete # %s?', $guardian['Guardian']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Guardians'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Guardian'), array('action' => 'add')); ?> </li>
	</ul>
</div>
