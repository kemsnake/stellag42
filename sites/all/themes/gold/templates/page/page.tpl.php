
 <div class="stickypaper"> 
 <?php include(drupal_get_path('theme', 'gold').'/templates/includes/header.tpl.php'); ?>
 
 

 
<div class="uk-clearfix"></div>

 </div>
<div id="container" class="uk-container uk-container-center uk-clearfix">
 <?php print $messages; ?> 
             <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?><ul class="action-links clearfix"><?php print render($action_links); ?></ul><?php endif; ?>
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
	<div class="uk-grid uk-grid-collapse">
	
     
    <section id="main" role="main" class="clearfix">
  
     
	      <?php print render($title_prefix); ?>
	      <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
	      <?php print render($title_suffix); ?>
	      <?php print render($page['content']); ?>
    
    </section> <!-- /#main -->
    

  
   </div> <!-- /.uk-grid -->
</div> <!-- /#scovercontainer -->

<?php include(drupal_get_path('theme', 'gold').'/templates/includes/footer.tpl.php'); ?>


<?php include(drupal_get_path('theme', 'gold').'/templates/includes/offcanvas.tpl.php'); ?>