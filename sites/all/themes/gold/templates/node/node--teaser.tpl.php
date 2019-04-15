
  <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> uk-width-medium-1-2 uk-width-large-1-3 uk-margin-large-bottom"<?php print $attributes; ?>>

 <?php print render($content['field_theme_image']); ?>
 
  <div class="uk-grid">
	  <div class="uk-width-7-10">
	    <?php
	      // Hide comments, tags, and links now so that we can render them later.
	      hide($content['comments']);
	      hide($content['links']);
	      hide($content['product:commerce_price']);
	      print render($content);
	    ?>
	     <?php print render($title_prefix); ?>
      <?php if (!$page): ?>
        <h2 class="teasertitle"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

	  </div>
	    <div class="uk-width-3-10 uk-text-small">
	     <?php print render($content['product:commerce_price']); ?>
	    </div>
 
 </div>  

  
       
  </div> <!-- /.node -->

