<h2>Recover Password</h2>
 
<?php
echo $this->Form->create('User', array('action' => 'recover'));
echo $this->Form->input('email');
echo $this->Form->end('Recover');
?>
