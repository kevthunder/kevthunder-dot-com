<div id="ComicsIndex" class="comics index twoColPage">
	<div class="left">
		<h1><?php echo __('Comics'); ?></h1>
	</div>
		<?php foreach ($comics as $comic): ?>
		<div class="comic">
			<a href="<?php echo $this->Html->url(array('action'=>'view',$comic['Comic']['id'],'en')) ?>" class="img"><img src="<?php echo $this->Html->url($this->Image2->source($comic['Comic']['file_en'])->resizeit(100, 150, true)->imagePath()); ?>" alt="" /></a>
			<h2><a href="<?php echo $this->Html->url(array('action'=>'view',$comic['Comic']['id'],'en')) ?>"><?php echo h($comic['Comic']['title']); ?></a></h2>
			<ul class="versions">
				<?php if( !empty($comic['Comic']['file_en']) ) { ?>
				<li><a href="<?php echo $this->Html->url(array('action'=>'view',$comic['Comic']['id'],'en')) ?>">EN</a></li>
				<?php }?>
				<?php if( !empty($comic['Comic']['file_fr']) ) { ?>
				<li><a href="<?php echo $this->Html->url(array('action'=>'view',$comic['Comic']['id'],'fr')) ?>">FR</a></li>
				<?php }?>
			</ul>
		</div>
		<?php endforeach; ?>

		<?php if( $this->Paginator->hasPage(1) ) { ?>
		<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>
		<?php }?>
</div>
