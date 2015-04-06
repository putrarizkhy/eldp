<?php echo $html->css('print','',array('media'=>'print')); ?>
<?php e($content_for_layout); ?>
<script type="text/javascript">
window.print();
</script>