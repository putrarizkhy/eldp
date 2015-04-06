
<div id="login">
<h1>
<?php echo $html->link(__('Elips', true), array('controller'=>'users','action' => 'home'),array('class'=>'logo-login')); ?></h1>
<?php
if ($session->check('Message.auth')):
$session->flash('auth');
endif;
?>
<div class="users-form">
<?php e($form->create('User', array('action' => 'login')));?>
<fieldset>
<div class="ctrlHolder login">
<label for="UserUsername" class="usernamelabel">
Username</label>
<?php e($form->text('username', array('class'
=> 'fullwidth'))); ?>
</div>
<div class="ctrlHolder login">
<label for="UserPassword" class="emaillabel">Password</label>
<?php e($form->password('password', array('class'
=> 'fullwidth'))); ?>
</div>
<div class="ctrlHolder login">
<div class="submit">
<?php e($form->submit('Login In', array('div' => false,
'class' => 'submitbutton'))); ?>
</div>
</div>
</fieldset>
<?php e($form->end()); ?>
</div>
</div>