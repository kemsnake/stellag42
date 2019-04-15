<?php




/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function gold_breadcrumb($variables) {
  // only want breadcrumbs for admin section.
  if (arg(0) != 'admin') {
    return;
  }
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $heading = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // Uncomment to add current page to breadcrumb
	// $breadcrumb[] = drupal_get_title();
    return '<nav class="breadcrumb">' . $heading . implode('', $breadcrumb) . '</nav>';
  }
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function gold_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="uk-subnav uk-subnav-pill uk-clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="uk-subnav uk-clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

 function gold_menu_tree__main_menu($variables) {
  $variables['tree'] = preg_replace('/class="[^"]*"/i', '', $variables['tree']);
  return '<ul class="uk-nav uk-nav-side">' . $variables['tree'] . '</ul>';
}
 function gold_menu_tree__user_menu($variables) {
  $variables['tree'] = preg_replace('/class="[^"]*"/i', '', $variables['tree']);
  return '<ul class="uk-navbar-nav">' . $variables['tree'] . '</ul>';
} 
 function gold_menu_tree__menu_log_in($variables) {
  $variables['tree'] = preg_replace('/class="[^"]*"/i', '', $variables['tree']);
  return '<ul class="uk-navbar-nav">' . $variables['tree'] . '</ul>';
}  







    /**
    * Implements hook_links__system_user_menu().
    *
    * @param array $vars
    * @return string
    *  Themed HTML for uikitty 3 ready main menu.
    */
    function gold_links__system_user_menu($vars) {
    // Get the active trail
    $menu_active_trail = menu_get_active_trail();
    // Initialise our custom trail.
    $active_trail = array();

    // Get current path
    $dest = drupal_get_destination();
    if (is_string($dest['destination'])) {
      $paths = explode('/', $dest['destination']);
      // Loop through and add all active paths
      foreach ($paths as $path) {
        // Read previous element added to active trail (using array values
        // preserves original array).
        $safe = array_values($active_trail);
        $previous = array_pop($safe);
        if ($previous) {
          $active_trail[] = $previous . '/' . $path;
        }
        // Or this is the first one
        else {
          $active_trail[] = $path;
        }
      }
    }

    // UL classes
    $class = implode($vars['attributes']['class'], ' ');
    $html = '<ul class="' . $class . '"';
    // Check if there is an ID set (not if it's a dropdown sub-menu).
    if (isset($vars['attributes']['id'])) {
      $html .= ' id="' . $vars['attributes']['id'] . '"';
    }
    $html .= '>';
    // Iterate links to build menu.
    foreach ($vars['links'] as $key => $link) {

      // Check this is a link not a property.
      if (is_numeric($key)) {
        $sub_menu = '';
        $li_class = array();
        $a_class = array();

        // Check if link is in active trail and add class.
        if (in_array($link['#original_link']['link_path'], $active_trail)) {
          $li_class[] = 'active-trail';
        }
        if ($link['#original_link']['link_path'] == end($active_trail)) {
          $li_class[] = 'uk-active';
        }
        // Check if last element in list and see if LI contains actual link
        $link['#attributes']['class'][] = strtolower(str_replace(array('& ', ' '), array('', '-'), $link['#title']));
        $link_title = $link['#title'];
        // Open subscribe in a new window.
        if ($link_title == 'Subscribe') {
          $link['#localized_options']['attributes']['target'] = '_blank';
        }
        if (isset($link['#localized_options']['attributes'])) {
          $link['#attributes'] = array_merge($link['#localized_options']['attributes'], $link['#attributes']);
        }

        // Check if we have a submenu.
        if (!empty($link['#below'])) {
          // Check if lvl 1, if higher do other stuff
          if ($link['#original_link']['depth'] < 2) {
            $li_class[] = 'uk-dropdown';
            $link_title .= '<i class="uk-icon-caret-down"></i>';
            $link['#attributes']['class'][] = 'dropdown-toggle';
            $link['#attributes']['data-toggle'] = 'uk-dropdown';
          } else {
            $li_class[] = 'dropdown-submenu';
            $link_title .= '<i class="uk-icon-caret-down"></i>';
          }
          // Theme submenu
          $sub_menu = theme('links__system_user_menu', array('links' => $link['#below'], 'attributes' => array('class' => array('uk-dropdown'))));
        }
        // Build classes string
        $classes = '';
        if (!empty($li_class)) {
          $classes = ' class="' . implode($li_class, ' ') . '"';
        }
        $html .= '<li' . $classes . '>' . l($link_title, $link['#href'], array('html' => 'true', 'attributes' => $link['#attributes'])) . $sub_menu . '</li>';
      }
    }
    $html .= '</ul>';
    return $html;
    }








    
/**
 * Override or insert variables into the node template.
 */
function gold_preprocess_node(&$variables, $hook) {
  if($variables['elements']['#view_mode'] == 'teaser'){
    $variables['theme_hook_suggestions'][]= 'node__teaser';
  }
  $variables['date'] = format_date($variables['node']->created, 'custom', 'F j, Y');  
  $variables['submitted'] = t('!datetime &middot; !username', array('!username' => $variables['name'], '!datetime' => $variables['date']));
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
$variables['content']['links']['node']['#links']['node-readmore']['attributes']['class'][] = 'uk-button uk-button-primary';
$variables['content']['links']['comment']['#links']['comment-add']['attributes']['class'][] = 'uk-button';
}

/**
 * Preprocess variables for region.tpl.php
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
function gold_preprocess_region(&$variables, $hook) {
  // Use a bare template for the content region.
  if ($variables['region'] == 'content') {
    $variables['theme_hook_suggestions'][] = 'region__bare';
  }
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function gold_preprocess_block(&$variables, $hook) {
  // Use a bare template for the page's main content.
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'][] = 'block__bare';
  }
  $variables['title_attributes_array']['class'][] = 'block-title';

}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function gold_process_block(&$variables, $hook) {
  // Drupal 7 should use a $title variable instead of $block->subject.
  $variables['title'] = $variables['block']->subject;
   
}


function gold_preprocess_html(&$variables) {
  // If on an individual node page, add the node type to body classes.
  if ($node = menu_get_object()) {
    $variables['theme_hook_suggestions'][] = 'html__'. $node->type;
  }
}

     
/**
 * Implements hook_preprocess_page
 */
function gold_preprocess_page(&$vars) {

        
  if (arg(0) == 'taxonomy' && arg(1) == 'term' )
  {
    $term = taxonomy_term_load(arg(2));
    $vocabulary = taxonomy_vocabulary_load($term->vid);
    $vars['theme_hook_suggestions'][] = 'page__taxonomy_vocabulary_' . $vocabulary->machine_name;
  }
  if (isset($vars['node'])) {
   $vars['theme_hook_suggestions'][] = 'page__node__' . $vars['node']->type;
  }  
  // Load genericons from library
  if (module_exists('libraries') && $genericons_path = libraries_get_path('genericons')) {
   drupal_add_css($genericons_path . '/genericons/genericons.css');
  }
}

function gold_css_alter(&$css) {
  // Remove defaults.css file.
}

/**
 * Changes the search form to use the "search" input element of HTML5.
 */
function gold_preprocess_search_block_form(&$vars) {
  $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}


/**
 * Implements theme_field to get rid of colon on labels.
 */
function gold_field($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}


/**
 * Clearfix added to inline field elements causing float problems...see http://drupal.org/node/622330#comment-5215864
 */
function gold_preprocess_field(&$variables, $hook){
    $element = $variables['element'];
    if ($element['#label_display'] == 'inline') {
        $classes_arr = &$variables['classes_array'];
        for ($i = sizeof($classes_arr)-1; $i >= 0; $i--) {
            if( $classes_arr[$i]==='clearfix' ){
                unset($classes_arr[$i]);
                $i=-1;
            }       
    }
  }
}


    /**
     *	Override theme_status_messages().
     **/
    function gold_status_messages($variables)
    {
        $display = $variables['display'];
        $output = '';
        $status_heading = array(
            'status' => t('Status message'),
            'error' => t('Error message'),
            'warning' => t('Warning message'),
        );

        foreach (drupal_get_messages($display) as $type => $messages) {
            //convert to gold classes
            switch ($type) {
                case 'error': $type = 'uk-alert';
                break;

                case 'status': $type = 'uk-alert-success';
                break;

                case 'warning': $type = 'uk-alert-warning';
                break;
            }

            $output .= "<div class=\"uk-alert $type\" data-uk-alert><a href='#' class=\"uk-alert-close uk-close\"></a>";
            if (!empty($status_heading[$type])) {
                $output .= '<h2 class="element-invisible">'.$status_heading[$type].'</h2>';
            }
            if (count($messages) > 1) {
                $output .= ' <ul>';
                foreach ($messages as $message) {
                    $output .= '  <li>'.$message.'</li>';
                }
                $output .= ' </ul>';
            } else {
                $output .= $messages[0];
            }
            $output .= '</div>';
        }

        return $output;
    }

