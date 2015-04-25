<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Comics'), h($comic['Comic']['title']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Comics'), array('action' => 'index'));
	
?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Comic'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Comic'), array('action' => 'edit', $comic['Comic']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Comic'), array('action' => 'delete', $comic['Comic']['id']), array('button' => 'default'), __d('croogo', 'Are you sure you want to delete # %s?', $comic['Comic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Comics'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Comic'), array('action' => 'add'), array('button' => 'default')); ?> </li>
		</ul>
	</div>
</div>

<div class="comics view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($comic['Comic']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Title'); ?></dt>
		<dd>
			<?php echo h($comic['Comic']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Desc'); ?></dt>
		<dd>
			<?php echo h($comic['Comic']['desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Post Date'); ?></dt>
		<dd>
			<?php echo h($comic['Comic']['post_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File En'); ?></dt>
		<dd>
			<?php echo h($comic['Comic']['file_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File Fr'); ?></dt>
		<dd>
			<?php echo h($comic['Comic']['file_fr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Active'); ?></dt>
		<dd>
			<?php echo h($comic['Comic']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($comic['Comic']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Modified'); ?></dt>
		<dd>
			<?php echo h($comic['Comic']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
