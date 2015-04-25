<?php
  $this->set('title_for_layout','');
?>
<div class="twitter-widget">
  <a class="twitter-timeline" href="https://twitter.com/kev_giguere" data-widget-id="592005046763528192">Tweets by @kev_giguere</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<?php
	if (count($nodes) == 0) {
		$this->set('bodyClasses', array('home','emptyHome'));
	}else{
		$this->set('bodyClasses', array('home'));
?>
	<div class="nodes promoted">

	<?php
		foreach ($nodes as $node):
			$this->Nodes->set($node);
	?>
	<div id="node-<?php echo $this->Nodes->field('id'); ?>" class="node node-type-<?php echo $this->Nodes->field('type'); ?>">
		<h2><?php echo $this->Html->link($this->Nodes->field('title'), $this->Nodes->field('url')); ?></h2>
		<?php
			echo $this->Nodes->info();
			echo $this->Nodes->body();
			echo $this->Nodes->moreInfo();
		?>
	</div>
	<?php
		endforeach;
	?>

	<div class="paging"><?php echo $this->Paginator->numbers(); ?></div>
</div>
<?php } ?>