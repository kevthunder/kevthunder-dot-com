<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Games');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Games'), array('action' => 'index'));

?>

<div class="games index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('title'); ?></th>
		<th><?php echo $this->Paginator->sort('desc'); ?></th>
		<th><?php echo $this->Paginator->sort('img'); ?></th>
		<th><?php echo $this->Paginator->sort('swf'); ?></th>
		<th><?php echo $this->Paginator->sort('width'); ?></th>
		<th><?php echo $this->Paginator->sort('height'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($games as $game): ?>
	<tr>
		<td><?php echo h($game['Game']['id']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['title']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['desc']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['img']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['swf']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['width']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['height']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['active']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['created']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['modified']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $game['Game']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $game['Game']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $game['Game']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $game['Game']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
