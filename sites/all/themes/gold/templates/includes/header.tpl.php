 
<header id="header" class="uk-clearfix dk-border-bottom" data-uk-sticky="{media:640, boundary: true}">
 	<div class="uk-container uk-container-center">
		 <nav class="uk-navbar">
		  <a href="#offcanvasnav" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
		     <?php if ($logo): ?>
		      <a href="<?php print $front_page; ?>" id="logo-large" class="uk-navbar-brand" title="<?php print t('Home'); ?>" rel="home">
		        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
		      </a>
		    <?php endif; ?>
            <?php if ($site_name): ?>
		      <a href="<?php print $front_page; ?>" id="site-name" class="uk-navbar-brand" title="<?php print t('Home'); ?>" rel="home">
		        <span><?php print $site_name; ?></span>
		      </a>
			<?php endif; ?>         
             
			<?php if ($main_menu || $secondary_menu || !empty($page['navigation'])): ?>
				<?php if (empty($page['navigation'])): ?>
			        <?php print theme('links__system_main_menu', array(
			              'links' => $main_menu,
			              'attributes' => array(
			                'id' => 'main-menu',
			                'class' => array('uk-navbar-nav', 'uk-hidden-small', 'uk-contrast', 'uk-clearfix'),
			              ),
			              'heading' => array(
			                'text' => t('Main menu'),
			                'level' => 'h2',
			                'class' => array('element-invisible'),
			              ),
			            )); ?>
          
			        <?php print theme('links__system_secondary_menu', array(
			              'links' => $secondary_menu,
			              'attributes' => array(
			                'id' => 'secondary-menu',
			                'class' => array('uk-navbar-nav', 'uk-hidden-small', 'uk-contrast'),
			              ),
			              'heading' => array(
			                'text' => t('Secondary menu'),
			                'level' => 'h2',
			                'class' => array('element-invisible'),
			              ),
			            )); ?>
			          <?php endif; ?>
    
				<?php endif; ?>

			  <div class="uk-navbar-flip">

				    <?php if ($page['shopping_cart']): ?>
				        <?php print render($page['shopping_cart']); ?>
				    <?php endif; ?>
	  			   
			  </div>
		</nav>
 	</div>
</header>
 
