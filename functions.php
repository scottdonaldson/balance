<?php

// Register nav menu
register_nav_menu('primary', 'Primary Menu');

// include jQuery
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Longer excerpt with '...'
function custom_excerpt_length( $length ) { return 99; } // 99 words
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) { return '...'; }
add_filter('excerpt_more', 'new_excerpt_more');

// Remove some stuff from head
remove_action('wp_head', 'wp_generator');

// Include admin JS and CSS
add_action( 'admin_head', 'custom_admin');

function custom_admin() {
  $url = get_bloginfo('template_url');
  echo '<script src="'.$url.'/js/admin.js"></script>';
  echo '<link rel="stylesheet" href="'.$url.'/css/admin.css">';
}

// Custom taxonomy for contributors
function contributors_init() {
  // create a new taxonomy
  register_taxonomy(
    'contributors',
    'post',
    array(
      'hierarchical' => true,
      'label' => __( 'Contributors' ),
      'labels' => array(
          'name' => 'Contributors',
          'singular_name' => 'Contributor',
          'all_items' => 'All Contributors',
          'edit_item' => 'Edit Contributor',
          'view_item' => 'View Contributor',
          'update_item' => 'Update Contributor',
          'add_new_item' => 'Add New Contributor',
          'new_item_name' => 'New Contributor Name',
          'search_items' => 'Search Contributors'
        ),
      'rewrite' => array( 'slug' => 'contributor' )
    )
  );
}
add_action( 'init', 'contributors_init' );

// Remove a few admin pages
add_action( 'admin_menu', 'my_remove_menus', 999 );
function my_remove_menus() {
	remove_menu_page( 'link-manager.php' );
}

// Custom post type for stories
add_action( 'init', 'register_cpt_story' );

function register_cpt_story() {

    $labels = array( 
        'name' => _x( 'Stories', 'story' ),
        'singular_name' => _x( 'Story', 'story' ),
        'add_new' => _x( 'Add New', 'story' ),
        'add_new_item' => _x( 'Add New Story', 'story' ),
        'edit_item' => _x( 'Edit Story', 'story' ),
        'new_item' => _x( 'New Story', 'story' ),
        'view_item' => _x( 'View Story', 'story' ),
        'search_items' => _x( 'Search Stories', 'story' ),
        'not_found' => _x( 'No stories found', 'story' ),
        'not_found_in_trash' => _x( 'No stories found in Trash', 'story' ),
        'parent_item_colon' => _x( 'Parent Story:', 'story' ),
        'menu_name' => _x( 'Stories', 'story' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'excerpt' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'story', $args );
  }

// Admin footer
add_filter('admin_footer_text', 'left_admin_footer_text_output'); // left side
function left_admin_footer_text_output($text) {
    $text = 'Site developed by <a href="http://parsleyandsprouts.com" target="_blank">Parsley &amp; Sprouts</a>.';
    return $text;
}
add_filter('update_footer', 'right_admin_footer_text_output', 11); // right side
function right_admin_footer_text_output($text) {
    $text = '&copy; '.date('Y').'.';
    return $text;
}

?>