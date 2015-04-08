<style type="text/css">
.rb-span-12 h1{
  color: #fff;
}
.loaddefaultcontent{
  display: block;
  line-height: 0;

}
.submit button:hover{
  background: #98c141;
}
</style>

<div class="loginformcontainer">
<img src="<?php echo $this->webroot;?>images/icon-login-08.png" style="margin-bottom:8px; width: 80px;">
<h2 style="font-size:18px;margin-bottom:20px;color:#155d58;line-height:20px;">LOGIN</h2>
<script>
$.metadata.setType("attr", "validate");

jQuery(document).ready(function() {
  
  jQuery("#UserAddForm").validate();
});
</script>
<div class="clear"></div>
<?php
echo $form->create('User', array('url' => array('controller' => 'users', 'action' =>'login')));?>

<?php $session->flash('auth')?>
<p>

<?php e($form->input('User.username', array('class'=> 'text-input formlogin','label'=>false,'placeholder'=>'username','validate'=>'required:true'))); ?>
</p>

<p>

<br/>
<?php echo $form->input('User.password', array('class'=> 'text-input formlogin','type'=>'password','placeholder'=>'password','label'=>false,'validate'=>'required:true'));?>
</p>
<div class="clear"></div>

<div class="clear"></div>
<p>
<br/>
<?php
echo $form->submit('login-btn1.png',array('id'=>'lgn-btn'));
echo $form->end();
?>
<div class="clear"></div>
</p>
</div>