
<?php if(!empty($activecat)):?>
	<a href="#" class="button dropdown1 dropdown radius" data-dropdown="drop2"><?php echo $activecatname['Category']['name'];?></a>
<?php else:?>
	<a href="#" class="button dropdown1 dropdown radius" data-dropdown="drop2">Semua Kategori</a>
<?php endif;?>
<div id="drop2" data-dropdown-content class="f-dropdown1 content">
  <div class="dropdowncontentmenu">
    <ul>
    	<?php if(!empty($activecat)):?>
    	<li><a href="<?php echo $this->webroot;?><?php echo $controllerActive;?>" id="">Semua Kategori</a></li>
    	<?php endif;?>
      	<?php foreach ($categoriesList as $category):?>
      	<li><a href="<?php echo $this->webroot;?><?php echo $controllerActive;?>/showcategory/<?php echo $category['Category']['id']?>" id="<?php echo $category['Category']['id']?>"><?php echo $category['Category']['name']?></a></li>
    	<?php endforeach;?>
    </ul>
    <!--<p>Some text that people will think is awesome! Some text that people will think is awesome! Some text that people will think is awesome!</p>-->
  </div>
</div>