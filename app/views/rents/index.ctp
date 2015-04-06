<div class="rents index">
<h2><?php __('Rents');?></h2>
<p>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('book_id');?></th>
	<th><?php echo $paginator->sort('member_id');?></th>
	<th><?php echo $paginator->sort('tgl_pinjam');?></th>
	<th><?php echo $paginator->sort('tgl_kembali');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($rents as $rent):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $rent['Rent']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($rent['Book']['id'], array('controller' => 'books', 'action' => 'view', $rent['Book']['name'])); ?>
		</td>
		<td>
			<?php echo $html->link($rent['Rent']['Member']['id'], array('controller' => 'members', 'action' => 'view', $rent['Rent']['Member']['id'])); ?>
		</td>
		<td>
			<?php echo $rent['Rent']['tgl_pinjam']; ?>
		</td>
		<td>
			<?php echo $rent['Rent']['tgl_kembali']; ?>
		</td>
		<td>
			<?php echo $rent['Rent']['created']; ?>
		</td>
		<td>
			<?php echo $rent['Rent']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $rent['Rent']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $rent['Rent']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $rent['Rent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rent['Rent']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<p class="paginate-info">
<?php
echo $paginator->counter(array(
'format' => __('Halaman %page% dari %pages%, Menampilkan %current% records dari total %count% , menampilkan record %start%, sampai %end%', true)
));
?></p>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Rent', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Books', true), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Books', true), array('controller' => 'books', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
