<!--<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('register'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password_confirm', array('label' => 'Password', 'type' => 'password'));
		echo $this->Form->input('password', array('label' => 'Password Confirm'));
		echo $this->Form->input('role_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>-->

<div class="row-fluid" id="reportGridRow">
<div class="span12 well" id="reportGridContainer" >
		<div class="navbar">
              <div class="navbar-inner">
                <div class="container">
                  <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                 <ul class="nav">
                  		<li><?php 
                  			//$span =  $this->Html->tag('span','', array('class' => 'icon-home',  'escape' => false));
							echo $this->Html->link('<span class="icon-home"></span>' . ' '. 'Home', array('controller' => 'users', 'action' => 'dashboard_users'), array('escape' => false)); ?>
                  			
                  		</li>
                  		
                  		<li class="divider-vertical"></li>
                  </ul>
                
                </div>
              </div><!-- /navbar-inner -->
            </div>
<h2>Account Page</h2>
<h4>Change your password</h4>
<p class="alert alert-info">You are <?php echo $current_user['User']['username']; ?> who last logged in <?php echo $current_user['User']['lastlogin']; ?>.</p>
 
<?php
echo $this->Form->create(array('action' => 'account'));
echo $this->Form->input('password_old',     array('label' => 'Old password', 'type' => 'password', 'autocomplete' => 'off'));
echo $this->Form->input('password_confirm', array('label' => 'New password', 'type' => 'password', 'autocomplete' => 'off'));
echo $this->Form->input('password',         array('label' => 'Re-enter new password', 'type' => 'password', 'autocomplete' => 'off'));
echo $this->Form->submit(__('Update Password'), array('class' => 'btn btn-success'));
 echo $this->Form->end();
?>