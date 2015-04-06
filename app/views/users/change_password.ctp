

<div id="left">
<div class="members form">
<h2 class="box-title">Form Perubahan Password</h2>
<?php e($form->create('User', array('action' => 'change_password')));?>
<fieldset>

<label for="UserPassword" class="passwordlabel"><span>
Password</span></label>
<?php e($form->password('password', array('class'
=> 'fullwidth'))); ?>
<label for="UserPasswordRepeat" class="passwordrepeatlabel">
<span>Re Password</span></label>
<?php e($form->password('password2', array('class'
=> 'fullwidth'))); ?>
<?php e($form->submit('Sign Up', array('div' => false,
'class' => 'submitbutton'))); ?>
</fieldset>
<?php e($form->end()); ?>

</div>
</div>
<div id="right">

</div>






