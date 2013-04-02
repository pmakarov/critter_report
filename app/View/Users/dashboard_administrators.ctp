<div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav affix-top">
		<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('New Report'), array('action' => 'add'),array('escape'=>false) ); ?></li>
		<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('List Children'), array('controller' => 'children', 'action' => 'index'), array('escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('New Child'), array('controller' => 'children', 'action' => 'add'), array('escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('List Rooms'), array('controller' => 'rooms', 'action' => 'index'), array('escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('New Room'), array('controller' => 'rooms', 'action' => 'add'), array('escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index'), array('escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add'),array('escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('List Teachers'), array('controller' => 'teachers', 'action' => 'index'),array('escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="icon-chevron-right"></i>' .__('New Teacher'), array('controller' => 'teachers', 'action' => 'add'),array('escape'=>false)); ?> </li>
	</ul>
	