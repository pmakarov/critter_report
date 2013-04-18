<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<?php echo $this->Html->charset(); ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>
		Report
</title>
 <meta name="description" content="Wrangling and reporting on your little monsters so you can determine what to do with them">
      
   <?php
		echo $this->Html->meta('icon');
 		echo $this->Html->css('normalize.css', null, array('fullBase' => true));
 		echo $this->Html->css('main.css', null, array('fullBase' => true));
        echo $this->Html->css('bootstrap.min.css', null, array('fullBase' => true));
        echo $this->Html->css('bootstrap-responsive.min.css', null, array('fullBase' => true));
        echo $this->Html->css('style.css', null, array('fullBase' => true));
        echo $this->Html->script('jquery-1.9.0.min.js' , array('fullBase' => true));
        echo $this->Html->script('modernizr-2.6.2.min.js', array('fullBase' => true));
        echo $this->Html->script('bootstrap.min.js', array('fullBase' => true));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div style="position:absolute;left:140px; float:right">
     <?php echo $this->Html->image("critter2.gif", array("alt" => "Critter", 'fullBase' => true)); ?>
 
   </div>
    <div class="panelS"> <?php echo $this->Html->image('logo.png', array('fullBase' => true))?>
      
    </div>
    
<div class="subnav">
		<div class="container" id="menuBar">
			<ul class="nav nav-pills">
				
			</ul>
		</div>
	</div>
<div class="container">
	<div class="span12">
      <div class="" id="formContainer">
		
	
	
	<div class="roomBox">
		<strong><?php echo __('Room'); ?>:</strong> 
			<span style="color:#08D"><?php echo $report['Room']['name']; ?></span>
	</div>
	<div class="nameBox">
		<strong><?php echo __('Name'); ?>:</strong> 
			<?php echo $report['Child']['first_name'] . ' '. $report['Child']['last_name']; ?>
	</div>
	
	<div class="dateBox">
		<strong><?php echo __('Date'); ?>:</strong>
		
			<?php echo $report['Report']['date']; ?>
			
	</div>
	
	<div class="commentsBox">
		<strong><?php echo __('Teacher\'s Comments'); ?>:</strong><br/>
		
			<?php echo $report['Report']['notes']; ?>
	</div>
	
	<div class="sleepBox">
		<strong><?php echo __('Sleep'); ?>:</strong><br/>
		
			<?php echo $report['Report']['sleep'] ?>
	</div>
	
	<div class="teachersBox">
		<strong><?php echo __('My Teachers Today'); ?>:</strong><br/>
		
			<?php
			$res = str_replace("|", ", ", $report['Report']['teacher_list']); 
			echo $res; ?>
	</div>
	
	<div class="AteBox">
		<strong>Today I Ate:</strong><br/>
		<div class="breakfastBox">
			
			<?php echo __('Breakfast'); ?>:
			
			<?php echo $report['Report']['breakfast'] . '%'; ?>
		
		</div>
		<div class="lunchBox">
			
			<?php echo __('Lunch'); ?>:
			
			<?php echo $report['Report']['lunch'] . '%'; ?>
		
		</div>
		<div class="snackBox">
			
			<?php echo __('Snack'); ?>:
			
			<?php echo $report['Report']['snack'] . '%'; ?>
		
		</div>
	</div>
	
	<div class="needBox">
		<strong>I NEED!!!</strong>:<br/>
		<?php echo h($report['Report']['needed_items']); ?>
	</div>
	<!--
	<dl>
		
		<dt><?php echo __('Daily Activity'); ?></dt>
		<dd>
			<?php echo h($report['Report']['daily_activity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Needed Iterms'); ?></dt>
		<dd>
			<?php echo h($report['Report']['needed_items']); ?>
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
		
		
	</dl> -->
</div>
</div>
</div>
</body>
</html>