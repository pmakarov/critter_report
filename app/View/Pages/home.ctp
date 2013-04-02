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
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
if (!Configure::read('debug')):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');
?>
<div class="wrapper">
	<div class="container" id="homeContainer">
	 <div class="jumbotron well ">
         <h2>Sign Up Today!</h2>
				<ul class="lead">
					<li><small>[placeholder content] Create you daily reports with ease and style!</small></li>
					<li> <small>[placeholder content] Download our Mobile App and free yourself from the tedium!</small></li>
					<li><small>[placeholder content] Use our reporting tools to chart progress.</small></li>
					<li><small>[placeholder content] Earn back that lost time from having to handwrite all reports! </small></li>
				</ul>
				<a class="btn btn-success" href="#">More &raquo;</a>
        </div>
      <hr>
      
       <!-- Example row of columns -->
      <div class="row-fluid">
        
        <div class="span4">
          <h2>News</h2>
          <ul>
					<li><small>[placeholder content] The CopperNickel team is feverishly working to bring you Critter Report Alpha!</small></li>
					<li> <small>[placeholder content] Download our Mobile App and free yourself from the tedium!</small></li>
					<li><small>[placeholder content] Use our reporting tools to chart progress.</small></li>
					<li><small>[placeholder content] Earn back that lost time from having to handwrite all reports! </small></li>
				</ul>
<!--           <p><a class="btn" href="#">View details &raquo;</a></p> -->
        </div>
       <div class="span4">
          <h2>Service</h2>
          <ul>
					<li><small>[placeholder content] <a class="link" href="#">View our Terms of Service (TOS)</a></small></li>
					<li> <small>[placeholder content] <a class="link" href="#">Customer Support</a></small></li>
					<li><small>[placeholder content] Use our reporting tools to chart progress.</small></li>
					<li><small>[placeholder content] Earn back that lost time from having to handwrite all reports! </small></li>
				</ul>
<!--           <p><a class="btn" href="#">View details &raquo;</a></p> -->
        </div>
        <div class="span4 well">
        <form id="f" action="" class="cmxform">
         <h2>Sign In</h2>
         <div class="errorblock " id="loginErrorDiv" style="display:none">
			Invalid Username or Password <br>
			Please try again.
			</div>
			<fieldset id="user-details">
				<label for="username">User Name : <span class="required">*</span></label>
				<input id="username" type="text" name="data[User][username]" value="" /> <label
						for="password">Password: <span class="required">*</span>
				</label> <input id="password" type="password" name="data[User][password]" value="" />
				<div ><a id="submitBtn" class="btn" href="" role="button">Login &raquo;</a></div>
				
			</fieldset>
		</form>
        </div>
      </div>
<hr>
<iframe src="http://cakephp.org/bake-banner" width="830" height="160" style="overflow:hidden; border:none;">
	<p>For updates and important announcements, visit http://cakefest.org</p>
</iframe>
<h2><?php echo __d('cake_dev', 'Release Notes for CakePHP %s.', Configure::version()); ?></h2>
<a href="http://cakephp.org/changelogs/<?php echo Configure::version(); ?>"><?php echo __d('cake_dev', 'Read the changelog'); ?> </a>
<?php
if (Configure::read('debug') > 0):
	Debugger::checkSecurityKeys();
endif;
?>
<p id="url-rewriting-warning" style="background-color:#e32; color:#fff;">
	<?php echo __d('cake_dev', 'URL rewriting is not properly configured on your server.'); ?>
	1) <a target="_blank" href="http://book.cakephp.org/2.0/en/installation/advanced-installation.html#apache-and-mod-rewrite-and-htaccess" style="color:#fff;">Help me configure it</a>
	2) <a target="_blank" href="http://book.cakephp.org/2.0/en/development/configuration.html#cakephp-core-configuration" style="color:#fff;">I don't / can't use URL rewriting</a>
</p>
<p>
<?php
	if (version_compare(PHP_VERSION, '5.2.8', '>=')):
		echo '<span class="notice success">';
			echo __d('cake_dev', 'Your version of PHP is 5.2.8 or higher.');
		echo '</span>';
	else:
		echo '<span class="notice">';
			echo __d('cake_dev', 'Your version of PHP is too low. You need PHP 5.2.8 or higher to use CakePHP.');
		echo '</span>';
	endif;
?>
</p>
<p>
	<?php
		if (is_writable(TMP)):
			echo '<span class="notice success">';
				echo __d('cake_dev', 'Your tmp directory is writable.');
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo __d('cake_dev', 'Your tmp directory is NOT writable.');
			echo '</span>';
		endif;
	?>
</p>
<p>
	<?php
		$settings = Cache::settings();
		if (!empty($settings)):
			echo '<span class="notice success">';
				echo __d('cake_dev', 'The %s is being used for core caching. To change the config edit APP/Config/core.php ', '<em>'. $settings['engine'] . 'Engine</em>');
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo __d('cake_dev', 'Your cache is NOT working. Please check the settings in APP/Config/core.php');
			echo '</span>';
		endif;
	?>
</p>
<p>
	<?php
		$filePresent = null;
		if (file_exists(APP . 'Config' . DS . 'database.php')):
			echo '<span class="notice success">';
				echo __d('cake_dev', 'Your database configuration file is present.');
				$filePresent = true;
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo __d('cake_dev', 'Your database configuration file is NOT present.');
				echo '<br/>';
				echo __d('cake_dev', 'Rename APP/Config/database.php.default to APP/Config/database.php');
			echo '</span>';
		endif;
	?>
</p>
<?php
if (isset($filePresent)):
	App::uses('ConnectionManager', 'Model');
	try {
		$connected = ConnectionManager::getDataSource('default');
	} catch (Exception $connectionError) {
		$connected = false;
		$errorMsg = $connectionError->getMessage();
		if (method_exists($connectionError, 'getAttributes')) {
			$attributes = $connectionError->getAttributes();
			if (isset($errorMsg['message'])) {
				$errorMsg .= '<br />' . $attributes['message'];
			}
		}
	}
?>
<p>
	<?php
		if ($connected && $connected->isConnected()):
			echo '<span class="notice success">';
	 			echo __d('cake_dev', 'Cake is able to connect to the database.');
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo __d('cake_dev', 'Cake is NOT able to connect to the database.');
				echo '<br /><br />';
				echo $errorMsg;
			echo '</span>';
		endif;
	?>
</p>
<?php endif; ?>
<?php
	App::uses('Validation', 'Utility');
	if (!Validation::alphaNumeric('cakephp')) {
		echo '<p><span class="notice">';
			echo __d('cake_dev', 'PCRE has not been compiled with Unicode support.');
			echo '<br/>';
			echo __d('cake_dev', 'Recompile PCRE with Unicode support by adding <code>--enable-unicode-properties</code> when configuring');
		echo '</span></p>';
	}
?>

<p>
	<?php
		if (CakePlugin::loaded('DebugKit')):
			echo '<span class="notice success">';
				echo __d('cake_dev', 'DebugKit plugin is present');
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo __d('cake_dev', 'DebugKit is not installed. It will help you inspect and debug different aspects of your application.');
				echo '<br/>';
				echo __d('cake_dev', 'You can install it from %s', $this->Html->link('github', 'https://github.com/cakephp/debug_kit'));
			echo '</span>';
		endif;
	?>
</p>

<h3><?php echo __d('cake_dev', 'Editing this Page'); ?></h3>
<p>
<?php
echo __d('cake_dev', 'To change the content of this page, edit: APP/View/Pages/home.ctp.<br />
To change its layout, edit: APP/View/Layouts/default.ctp.<br />
You can also add some CSS styles for your pages at: APP/webroot/css.');
?>
</p>

<h3><?php echo __d('cake_dev', 'Getting Started'); ?></h3>
<p>
	<?php
		echo $this->Html->link(
			sprintf('<strong>%s</strong> %s', __d('cake_dev', 'New'), __d('cake_dev', 'CakePHP 2.0 Docs')),
			'http://book.cakephp.org/2.0/en/',
			array('target' => '_blank', 'escape' => false)
		);
	?>
</p>
<p>
	<?php
		echo $this->Html->link(
			__d('cake_dev', 'The 15 min Blog Tutorial'),
			'http://book.cakephp.org/2.0/en/tutorials-and-examples/blog/blog.html',
			array('target' => '_blank', 'escape' => false)
		);
	?>
</p>

<h3><?php echo __d('cake_dev', 'Official Plugins'); ?></h3>
<p>
<ul>
	<li>
		<?php echo $this->Html->link('DebugKit', 'https://github.com/cakephp/debug_kit') ?>:
		<?php echo __d('cake_dev', 'provides a debugging toolbar and enhanced debugging tools for CakePHP applications.'); ?>
	</li>
	<li>
		<?php echo $this->Html->link('Localized', 'https://github.com/cakephp/localized') ?>:
		<?php echo __d('cake_dev', 'contains various localized validation classes and translations for specific countries'); ?>
	</li>
</ul>
</p>

<h3><?php echo __d('cake_dev', 'More about Cake'); ?></h3>
<p>
<?php echo __d('cake_dev', 'CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.'); ?>
</p>
<p>
<?php echo __d('cake_dev', 'Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.'); ?>
</p>

<ul>
	<li><a href="http://cakefoundation.org/"><?php echo __d('cake_dev', 'Cake Software Foundation'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'Promoting development related to CakePHP'); ?></li></ul></li>
	<li><a href="http://www.cakephp.org"><?php echo __d('cake_dev', 'CakePHP'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'The Rapid Development Framework'); ?></li></ul></li>
	<li><a href="http://book.cakephp.org"><?php echo __d('cake_dev', 'CakePHP Documentation'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'Your Rapid Development Cookbook'); ?></li></ul></li>
	<li><a href="http://api20.cakephp.org"><?php echo __d('cake_dev', 'CakePHP API'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'Quick Reference'); ?></li></ul></li>
	<li><a href="http://bakery.cakephp.org"><?php echo __d('cake_dev', 'The Bakery'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'Everything CakePHP'); ?></li></ul></li>
	<li><a href="http://plugins.cakephp.org"><?php echo __d('cake_dev', 'CakePHP plugins repo'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'A comprehensive list of all CakePHP plugins created by the community'); ?></li></ul></li>
	<li><a href="http://groups.google.com/group/cake-php"><?php echo __d('cake_dev', 'CakePHP Google Group'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'Community mailing list'); ?></li></ul></li>
	<li><a href="irc://irc.freenode.net/cakephp">irc.freenode.net #cakephp</a>
	<ul><li><?php echo __d('cake_dev', 'Live chat about CakePHP'); ?></li></ul></li>
	<li><a href="http://github.com/cakephp/"><?php echo __d('cake_dev', 'CakePHP Code'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'For the Development of CakePHP Git repository, Downloads'); ?></li></ul></li>
	<li><a href="http://cakephp.lighthouseapp.com/"><?php echo __d('cake_dev', 'CakePHP Lighthouse'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'CakePHP Tickets, Wiki pages, Roadmap'); ?></li></ul></li>
</ul>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#submitBtn").click(function(event){
			// Declare the form
		    var form = $("#f");
		
		    // Stop the form from doing a native postback
		    event.preventDefault();
		
		    // Get the data from the form
		    var data = form.serialize();
		
		    $.ajax({
		        data: data,
		        //data: JSON.stringify(data),
		        type: "POST",
			 	async: false,
			 	dataType: "JSON",
			 	url: 'users/login',
			 	beforeSend: function(x) {
			 		if (x && x.overrideMimeType) {
			 	    	x.overrideMimeType("application/j-son;charset=UTF-8");
			 	    	}
			 	    },
			 	success: function(result) {
			 	 	//console.log("Foo Shnickens: " + result.login);
			 	 	   	if(result.login === "true"){
			 	 	   		window.location.href=result.redirect;
			 	 	   	}
			 	 	   	else if(result.login==="false"){
			 	 	   		$("#loginErrorDiv").html(result.error);
			 	 	   		$("#loginErrorDiv").toggle();
			 	 	   	}
			 	},
			 	error: function (request, status, error) {
			 		   		alert(status + " : " + error);
			 		      
			 	}
		
		})
	});
	});
	
</script>