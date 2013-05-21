<?php
	echo $this->Html->css('custom-theme/jquery-ui-1.10.0.custom.css');
	echo $this->Html->css('datepicker.css');
	echo $this->Html->css('bootstrap-timepicker.css');
	echo $this->Html->css('select2.css');
	echo $this->Html->css('timepicker.css');
  	
  	echo $this->Html->script('jquery-ui-1.10.0.custom.min.js');
    echo $this->Html->script('bootstrap-typeahead.js');
    echo $this->Html->script('select2.js');
    echo $this->Html->script('bootstrap-datepicker.js');
    echo $this->Html->script('bootstrap-timepicker.js');
	
       
?>
<div class="children form">
<?php echo $this->Form->create('Child'); ?>
	<fieldset>
		<legend><?php echo __('Edit Child'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('daycare_center_id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('middle_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('birthday');
		echo $this->Form->input('room_id');
		echo $this->Form->input('special_needs');
		echo $this->Form->input('Guardian', array('multiple'=>'multiple', 'required'=>'false', 'style'=>'width:300px','type'=>'select'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Child.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Child.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Children'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Guardians'), array('controller' => 'guardians', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Guardian'), array('controller' => 'guardians', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#GuardianGuardian").select2();
	});
</script>