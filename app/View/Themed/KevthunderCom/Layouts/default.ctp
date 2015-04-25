<?php
/**
 * Minimal Theme for Croogo CMS
 *
 * @author Fahad Ibnay Heylaal <contact@fahad19.com>
 * @link   http://fahad19.com
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title_for_layout; ?> &raquo; <?php echo Configure::read('Site.title'); ?></title>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            echo $this->Meta->meta();
            echo $this->Layout->feed();
            $this->Html->script(array('jquery/jquery.min'));
            echo $this->Html->css(array(
                'theme',
            ));
			//echo $this->Blocks->get('css');
			//echo $this->Blocks->get('script');
            echo $scripts_for_layout;
			
			$home = !empty($bodyClasses) && in_array('home',$bodyClasses)
        ?>
    </head>
    <body<?php if(!empty($bodyClasses)) echo ' class="'.implode(' ',$bodyClasses).'"'; ?>>
        <aside class="social">
          <ul>
            <li class="twitter"><a href="https://twitter.com/kev_giguere"><span>Twitter</span></a></li
            ><li class="linkedin"><a href="https://ca.linkedin.com/in/kgiguerel"><span>LinkedIn</span></a></li
            ><li class="github"><a href="https://github.com/kevthunder"><span>GitHub</span></a></li>
          </ul>
        </aside>
        <div id="wrapper">
            <div id="header" class="container_16">
                <div id="logo" class="grid_16">
                    <?php if( $home ) { ?><h1><?php }?>
					<?php echo $this->Html->link('<span>'.Configure::read('Site.title').'</span>', '/',array('escape'=>false,'title'=>Configure::read('Site.title'))); ?>
                    <?php if( $home ) { ?></h1><?php }?>
                </div>
				<nav class="mainMenu">
					<?php echo $this->Menus->menu('main', array('dropdown' => true)); ?>
				</nav>
            </div>

            <div id="main" class="container_16">
                <div id="content">
                    <?php echo $content_for_layout; ?>
                </div>
				<?php /*
                <div id="sidebar" class="grid_5">
                    <?php echo $this->Layout->blocks('right'); ?>
                </div>
				*/ ?>
            </div>

            <div id="footer" class="container_16">
				<div class="cakePower">
					<a href="http://www.cakephp.org"><?php echo $this->Html->image('/img/cake.power.gif'); ?></a>
				</div>
            </div>
			<?php
				echo $this->element('sql_dump'); 
			?>
        </div>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-41548953-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
    </body>
</html>