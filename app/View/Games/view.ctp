<?php
	$this->Html->script('swfobject',array('inline'=>false));
	$this->Html->scriptBlock('
		swfobject.embedSWF("'.$this->Html->url($game['Game']['swf']).'", "GamePlayer", "'.$game['Game']['width'].'", "'.$game['Game']['height'].'", "9.0.0", "'.$this->Html->url('/swf/expressInstall.swf').'");
	',array('inline'=>false));
	if( $game['Game']['width'] <= 600 ) {
		
?>
<div id="GameView" class="games view twoColPage">
	<div class="left">
		<h1><?php  echo $game['Game']['title'] ?></h1>
	</div>
	<div class="right">
		<div id="GamePlayer">
			<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
		</div>
	</div>
</div>
<?php }else{ ?>
<div id="GameView" class="games view">
	<h1><?php  echo $game['Game']['title'] ?></h1>
	<div id="GamePlayer">
		<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
	</div>
</div>
<?php } ?>