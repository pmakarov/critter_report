<p>Thank you for your interest in our company. Leave a message.</p>
<?php echo $this->Form->create('Contact', array('action' => 'send')); ?>
<table style="border:none;">
    <tr>
        <td>Name</td>
        <td><?php echo $this->Form->input('Contact.name', array('label' => false, 'maxlength' => 100, 'size' => 40)); ?></td>
    </tr>
    <tr>
        <td>Company</td>
        <td><?php echo $this->Form->input('Contact.company', array('label' => false, 'maxlength' => 100, 'size' => 40)); ?></td>
    </tr>
    <tr>
        <td>E-Mail</td>
        <td><?php echo $this->Form->input('Contact.email', array('label' => false, 'maxlength' => 100, 'size' => 40)); ?></td>
    </tr>
    <tr>
        <td style="vertical-align: top;">Your comment</td>
        <td><?php echo $this->Form->input('Contact.message', array('label' => false, 'cols' => 50, 'rows' => 10)); ?></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><br><?php echo $this->Form->end('Send'); ?></td>
    </tr>
</table>