
  
      <?php print render($title_prefix); ?>
<h1 class="uk-visible-small uk-margin-large-bottom"><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>
 


  <div class="uk-width-medium-2-3 uk-margin-bottom">
  <div class="uk-panel uk-panel-box">
  
 <div class="uk-grid uk-grid-collapse gl-desctop" data-uk-switcher="{connect:'#descspec', animation: 'fade'}">
 	<button class="uk-button uk-width-1-2 uk-text-center" type="button">Description</button>
 	<button class="uk-button uk-width-1-2 uk-text-center" type="button">Specs</button>	
 </div> 
  
  <div class="uk-panel uk-panel-space">
 	
<ul id="descspec" class="uk-switcher uk-margin">
	<li><?php print render($content['body']); ?></li>
	<li>Specs</li>
</ul>
 	</div>
 	</div>
  </div>
   <div class="uk-width-medium-1-3">

    <?php
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
  
      hide($content['field_theme_image']);
      print render($content);
    ?>
   </div>
  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
    <footer>
      <?php print render($content['links']); ?>
    </footer>
  <?php endif; ?>

  <?php print render($content['comments']); ?>
  </div>
