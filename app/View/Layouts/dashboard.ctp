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
      
     
   <?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
 		echo $this->Html->css('normalize.css');
 		echo $this->Html->css('main.css');
        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('bootstrap-responsive.min.css');
        echo $this->Html->css('custom-theme/jquery-ui-1.10.0.custom.css');
        echo $this->Html->css('style.css');
        echo $this->Html->script('jquery-1.9.0.min.js');
        echo $this->Html->script('modernizr-2.6.2.min.js');
        echo $this->Html->script('bootstrap.min.js');
		echo $this->Html->script('jquery-ui-1.10.0.custom.min.js');
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
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
         <!-- <?php echo $this->Html->link($this->Html->image("critter2.gif", array("alt" => "Critter")), "/",array('escape' => false, 'class' => 'brand')); ?> -->
          <a href="#" class="brand">Critter</a>
                  <div class="nav-collapse collapse navbar-responsive-collapse">
                    <ul class="nav pull-right">
                   	<li class="divider-vertical"></li>
            	 	<li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <span class="icon-cog"></span>&nbsp;Settings &nbsp;<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><?php echo $this->Html->link('Change Password', array('controller' => 'users', 'action' => 'account'), array('escape' => false)); ?></li>
                        </ul>
                      </li>
                      <li class="divider-vertical"></li>
                    
                      <li class="dropdown">
              			  <?php echo $this->Html->link( '<span style="color:#808080">Logged in as</span> <span style="color:#0088CC">' . $this->Session->read("Auth.User.username"). '</span>' . '&nbsp;<b class="caret"></b>','#', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'escape' => false)); ?>

						<!-- <?php
							if($this->Session->read('Auth')) {
							   echo $this->Html->link( $this->Session->read("Auth.User.username"), array('controller'=>'users', 'action'=>'logout', 'class'=>'navbar-link')); 
							} 
							else {
							  
							   echo $this->Html->link( $this->Session->read("Auth.User.username"), array('controller'=>'users', 'action'=>'login', 'class'=>'navbar-link')); 
							}?> -->
							<ul class="dropdown-menu">
                          <li><?php echo $this->Html->link('Sign Out', array('controller' => 'users', 'action' => 'logout')); ?></li>
                      
                        </ul>
            	</ul>
			
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
 
</header>

	
	
	<div class="wrapper">
		<div class="container home-container">

			<?php echo $this->fetch('content'); ?>
			<?php echo $this->Session->flash(); ?>
		</div>

	</div>
	<div class="footer ">
        <p>&copy; CopperNickel 2013</p>
    </div>
</body>
</html>
