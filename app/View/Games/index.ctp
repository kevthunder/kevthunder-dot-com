<div id="GamesIndex" class="games index twoColPage">
	<div class="left">
		<h1><?php echo __('Games'); ?></h1>
	</div>
	<div class="right">
		<?php foreach ($games as $game): ?>
		<div class="game">
			<a href="<?php echo $this->Html->url(array('action'=>'view',$game['Game']['id'])); ?>">
				<h2><?php echo $game['Game']['title'] ?></h2>
				<img src="<?php echo $this->Html->url($game['Game']['img']); ?>" alt="" />
				<p><?php echo nl2br(h($game['Game']['desc'])) ?></p>
			</a>
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
</div>
