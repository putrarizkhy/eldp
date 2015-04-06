<div class="rents form">
<?php echo $form->create('Rent');?>
	<fieldset>
 		<legend><?php __('Edit Rent');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('book_id');
		echo $form->input('member_id');
		echo $form->input('tgl_pinjam');
		echo $form->input('tgl_kembali');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Rent.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Rent.id'))); ?></li>
		<li><?php echo $html->link(__('List Rents', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Books', true), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Books', true), array('controller' => 'books', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
