<section id="<?php print $block_html_id; ?>" class="uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-4 <?php print $classes; ?>"<?php print $attributes; ?>>
	<div class="uk-panel uk-panel-box">
		  <?php print render($title_prefix); ?>
		  <?php if ($title): ?>
		    <h3 class="uk-panel-title"><?php print $title; ?></h3>
		  <?php endif;?>
		  <?php print render($title_suffix); ?>
		  <?php print $content ?>
	</div>  
</section> <!-- /.block -->
