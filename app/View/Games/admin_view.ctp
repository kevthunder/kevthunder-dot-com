<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Games'), h($game['Game']['title']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Games'), array('action' => 'index'));
	
?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Game'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Game'), array('action' => 'edit', $game['Game']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Game'), array('action' => 'delete', $game['Game']['id']), array('button' => 'default'), __d('croogo', 'Are you sure you want to delete # %s?', $game['Game']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Games'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Game'), array('action' => 'add'), array('button' => 'default')); ?> </li>
		</ul>
	</div>
</div>

<div class="games view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($game['Game']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Title'); ?></dt>
		<dd>
			<?php echo h($game['Game']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Desc'); ?></dt>
		<dd>
			<?php echo h($game['Game']['desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Img'); ?></dt>
		<dd>
			<?php echo h($game['Game']['img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Swf'); ?></dt>
		<dd>
			<?php echo h($game['Game']['swf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Width'); ?></dt>
		<dd>
			<?php echo h($game['Game']['width']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Height'); ?></dt>
		<dd>
			<?php echo h($game['Game']['height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Active'); ?></dt>
		<dd>
			<?php echo h($game['Game']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($game['Game']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Modified'); ?></dt>
		<dd>
			<?php echo h($game['Game']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
