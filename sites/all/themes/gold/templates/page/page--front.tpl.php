
<div class="stickypaper"> 
 <?php include(drupal_get_path('theme', 'gold').'/templates/includes/header.tpl.php'); ?>
  
<div class="uk-clearfix"></div>

<!-- /#start slider -->
<div id="frontslider" class="ui-slideshow dk-border-bottom">	
		<div class="uk-container uk-container-center slide-out">
			<div class="slides uk-text-center">
				<img src="/sites/all/themes/gold/img/slide-template.png" />
			</div>
		</div>
</div>
<!-- /#end slider -->
</div>
<!-- /#end stickypaper -->

<div id="scovercontainer" class="uk-container uk-container-center uk-clearfix">
 <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
       <a id="main-content"></a>
       <?php print $messages; ?> 
             <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?><ul class="action-links clearfix"><?php print render($action_links); ?></ul><?php endif; ?>
     
     
	      <?php print render($title_prefix); ?>
	      <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
	      <?php print render($title_suffix); ?>
 
    <?php if ($page['catblocks']): ?>
        <?php print render($page['catblocks']); ?>
    <?php endif; ?>
	<div class="uk-grid uk-margin-large-top">

	  <?php print render($page['content']); ?>
    
   </div> <!-- /.uk-grid -->
</div> <!-- /#scovercontainer -->



<?php include(drupal_get_path('theme', 'gold').'/templates/includes/footer.tpl.php'); ?>


<?php include(drupal_get_path('theme', 'gold').'/templates/includes/offcanvas.tpl.php'); ?>



