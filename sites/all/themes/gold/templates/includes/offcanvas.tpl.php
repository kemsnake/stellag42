<div id="offcanvasnav" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
    <div class="uk-padding-large-top">
       <?php if ($logo): ?>
	      <a href="<?php print $front_page; ?>" id="logo-large" class="uk-navbar-brand uk-margin" title="<?php print t('Home'); ?>" rel="home">
	        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
	      </a>
	   <?php endif; ?>
       <?php if ($site_name): ?>
	      <a href="<?php print $front_page; ?>" id="site-name" class="uk-navbar-brand uk-text-contrast" title="<?php print t('Home'); ?>" rel="home">
	        <span><?php print $site_name; ?></span>
	      </a>
      <?php endif; ?>
    </div>
      <div class="uk-clearfix clearfix"></div>
	        <?php print theme('links__system_main_menu', array(
              'links' => $main_menu,
              'attributes' => array(
                'id' => 'mainmenu-offcanvas',
                'class' => array('uk-nav', 'uk-nav-offcanvas', 'clearfix'),
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
                'id' => 'secondary-menu-offcanvas',
                'class' => array('uk-nav', 'uk-nav-offcanvas', 'clearfix'),
              ),
              'heading' => array(
                'text' => t('Secondary menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            )); ?>
                 <?php print theme('links', array(
                 'links' => menu_navigation_links('user-menu'), 
                 'attributes' => array('class'=> array('uk-nav', 'uk-nav-offcanvas')) ));
                 ?>
    </div>
</div>
