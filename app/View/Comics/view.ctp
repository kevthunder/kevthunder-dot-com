<?php debug($comic) ?>
<div id="CommicView" class="comics view">
	<div class="nav">
		<h1><?php echo h($comic['Comic']['title']) ?></h1>
		<a href="<?php echo $this->Html->url(array('action'=>'view',$first['Comic']['id'],$lang)); ?>" class="first">&lt;&lt; <?php echo __('First'); ?></a>
		<?php if( !empty($prev) ) { ?>
			<a href="<?php echo $this->Html->url(array('action'=>'view',$prev['Comic']['id'],$lang)); ?>" class="prev">&lt; <?php echo __('Previous'); ?></a>	
		<?php }else{ ?>
			<a href="<?php echo $this->Html->url(array('action'=>'view',$comic['Comic']['id'],$lang)); ?>" class="prev inactive">&lt; <?php echo __('Previous'); ?></a>	
		<?php } ?>
		<a href="<?php echo $this->Html->url(array('action'=>'view',$last['Comic']['id'],$lang)); ?>" class="last"><?php echo __('Last'); ?> &gt;&gt;</a>
		<?php if( !empty($next) ) { ?>
		<a href="<?php echo $this->Html->url(array('action'=>'view',$next['Comic']['id'],$lang)); ?>" class="next"><?php echo __('Next'); ?> &gt;</a>
		<?php }else{ ?>
			<a href="<?php echo $this->Html->url(array('action'=>'view',$comic['Comic']['id'],$lang)); ?>" class="next inactive"><?php echo __('Next'); ?> &gt;</a>	
		<?php } ?>
	</div>
	<img src="<?php echo $this->Html->url($comic['Comic']['file_'.$lang]) ?>" alt="" class="comic" />
	<div class="nav">
		<div class="titleCopy"><?php echo h($comic['Comic']['title']) ?></div>
		<a href="<?php echo $this->Html->url(array('action'=>'view',$first['Comic']['id'],$lang)); ?>" class="first">&lt;&lt; <?php echo __('First'); ?></a>
		<?php if( !empty($prev) ) { ?>
			<a href="<?php echo $this->Html->url(array('action'=>'view',$prev['Comic']['id'],$lang)); ?>" class="prev">&lt; <?php echo __('Previous'); ?></a>	
		<?php }else{ ?>
			<a href="<?php echo $this->Html->url(array('action'=>'view',$comic['Comic']['id'],$lang)); ?>" class="prev inactive">&lt; <?php echo __('Previous'); ?></a>	
		<?php } ?>
		<a href="<?php echo $this->Html->url(array('action'=>'view',$last['Comic']['id'],$lang)); ?>" class="last"><?php echo __('Last'); ?> &gt;&gt;</a>
		<?php if( !empty($next) ) { ?>
		<a href="<?php echo $this->Html->url(array('action'=>'view',$next['Comic']['id'],$lang)); ?>" class="next"><?php echo __('Next'); ?> &gt;</a>
		<?php }else{ ?>
			<a href="<?php echo $this->Html->url(array('action'=>'view',$comic['Comic']['id'],$lang)); ?>" class="next inactive"><?php echo __('Next'); ?> &gt;</a>	
		<?php } ?>
	</div>
	
</div>