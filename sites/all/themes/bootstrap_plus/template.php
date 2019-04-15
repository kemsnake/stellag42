<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

function bootstrap_plus_preprocess_page(&$variables) {
	
  drupal_add_js('sites/all/themes/bootstrap_plus/js/slide.js', 'file');
  drupal_add_js('sites/all/themes/bootstrap_plus/slick/slick.min.js', 'file');
  drupal_add_css('sites/all/themes/bootstrap_plus/slick/slick.css', 'file');
  drupal_add_css('sites/all/themes/bootstrap_plus/slick/theme/slick-theme.css', 'file');
  drupal_add_css('sites/all/themes/bootstrap_pluse/js/jquery-migrate-1.2.1.min.js', 'file');
  
  }
