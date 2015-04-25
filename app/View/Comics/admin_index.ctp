<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Comics');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Comics'), array('action' => 'index'));

?>

<div class="comics index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('title'); ?></th>
		<th><?php echo $this->Paginator->sort('desc'); ?></th>
		<th><?php echo $this->Paginator->sort('post_date'); ?></th>
		<th><?php echo $this->Paginator->sort('file_en'); ?></th>
		<th><?php echo $this->Paginator->sort('file_fr'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($comics as $comic): ?>
	<tr>
		<td><?php echo h($comic['Comic']['id']); ?>&nbsp;</td>
		<td><?php echo h($comic['Comic']['title']); ?>&nbsp;</td>
		<td><?php echo h($comic['Comic']['desc']); ?>&nbsp;</td>
		<td><?php echo h($comic['Comic']['post_date']); ?>&nbsp;</td>
		<td><?php echo h($comic['Comic']['file_en']); ?>&nbsp;</td>
		<td><?php echo h($comic['Comic']['file_fr']); ?>&nbsp;</td>
		<td><?php echo h($comic['Comic']['active']); ?>&nbsp;</td>
		<td><?php echo h($comic['Comic']['created']); ?>&nbsp;</td>
		<td><?php echo h($comic['Comic']['modified']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $comic['Comic']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $comic['Comic']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $comic['Comic']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $comic['Comic']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
