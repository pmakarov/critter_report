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
	
<?php echo "<br/>" . 'fun filled fantastic fantasies'; ?>
</body>
</html>