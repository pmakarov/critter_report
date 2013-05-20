<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Critter Report: wrangle your critters!');
?>
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
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
</title>
 <meta name="description" content="Wrangling and reporting on your little monsters so you can determine what to do with them">
      
        <!--<link rel="stylesheet" href="css/normalize.css"/>
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
        <link rel="stylesheet" href="css/style.css"/>-->
       
        <!--
        <script src="js/jquery-1.9.0.min.js" ></script>        
        <script src="js/modernizr-2.6.2.min.js"></script>
        -->
        
   <?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
 		echo $this->Html->css('normalize.css');
 		echo $this->Html->css('main.css');
        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('bootstrap-responsive.min.css');
        echo $this->Html->css('style.css');
        echo $this->Html->script('jquery-1.9.0.min.js');
        echo $this->Html->script('modernizr-2.6.2.min.js');
        echo $this->Html->script('bootstrap.min.js');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
<header>
  <div id="headerPanel" class="headerPanel">
  <div class="container">
  	<div class="pull-right">
	<?php
		if($this->Session->read('Auth')) {
		   echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout')); 
		} 
		else {
		  
		   echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login')); 
		}
	?>
	</div>
    <div class="panelL"> <?php echo $this->Html->image('logo.png')?>
     <h3>Critter Report - v 0.0.0.1</h3>
    </div>
   </div>
  </div>
</header>

	
	<div class="subnav">
		<div class="container" id="menuBar">
			<ul class="nav nav-pills">
				<li><?php echo $this->Html->link('Home', '/'); ?></li>
				 <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Admin <!-- <b class="caret"></b> --></a>
				
				    <ul class="dropdown-menu" >
					    <li><a tabindex="-1" href="#">Add Students</a></li>
					    <li><a tabindex="-1" href="#">Add Teachers</a></li>
					    <li class="divider"></li>
					    <li><a tabindex="-1" href="#">Admin Dashboard</a></li>
				    </ul>
				</li>
				 <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						User <!-- <b class="caret"></b> --></a>
				    <ul class="dropdown-menu" >
					    <li><?php echo $this->Html->link('Create Report', array("controller"=>"reports", "action" => "add", "admin"=>false), array("tabindex" => "-1")); ?></li>
					    <li class="divider"></li>
					    <li><a tabindex="-1" href="#">User Dashboard</a></li>
				    </ul>
				</li>
				<li><a href="#">About</a></li>
				<li><a href="signup.htm">Sign Up</a></li>
				<li><a href="#">Mobile</a></li>
				<li><?php echo $this->Html->link('Contact Us', array("controller"=>"contacts", "admin"=>false)); ?></li>
				
			</ul>
		</div>
	</div>

	<div class="wrapper">
		<div class="container home-container">

			<?php echo $this->fetch('content'); ?>
			<?php echo $this->Session->flash(); ?>
		</div>

	</div>
	<div class="footer">
        <p>&copy; CopperNickel 2013</p>
    </div>
</body>
</html>
