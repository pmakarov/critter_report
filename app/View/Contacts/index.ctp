
  <div class="row-fluid">
    <div class="span12">
      <div class="critterWell" id="formContainer">
      	
        <div id="mainForm"> 
        	<div id="flashMessage" class="flash"><?php echo $this->Session->flash(); ?></div>
              <div class="row-fluid">
              	
              	 <?php echo $this->Form->create('Contact', array('action' => 'send')); ?>
 		<fieldset>
        <legend><?php echo __('Contact Us'); ?></legend> 
	 <p>Thank you for your interest in our company. Leave a message.</p>
       <?php echo $this->Form->input('Contact.name', array('maxlength' => 100, 'size' => 40));
       echo $this->Form->input('Contact.company', array('maxlength' => 100, 'size' => 40)); 
       echo $this->Form->input('Contact.email', array( 'maxlength' => 100, 'size' => 40)); 
  	   echo $this->Form->input('Contact.message', array('required'=>'true', 'type'=>'textarea', 'rows'=> '6',  'class'=>'field span6', 'placeholder' => 'Your message here...'));
  	   echo $this->Form->input('Contact.captcha', array('label' => 'Calculate this: '.$captcha)); ?>
	   </fieldset>
  	 <?php echo $this->Form->submit(__('Contact Us'), array('class' => 'btn btn-success'));
 		echo $this->Form->end();?>
   		
                </div>

</div>
</div>
</div>
</div>


