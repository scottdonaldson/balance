<?php

// Register nav menu
register_nav_menu('primary', 'Primary Menu');

// Add image sizes
add_image_size('square', 400, 400, true);
add_image_size('rectangle', 1200, 300, true);

// include jQuery
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Longer excerpt with '...'
function custom_excerpt_length( $length ) { return 40; } // 99 words
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) { return '...'; }
add_filter('excerpt_more', 'new_excerpt_more');

// Given a string, trim any leading zeros (helpful for dates)
function trim_zeros($string) {
  return substr($string, 0, 1) === '0' ? trim_zeros(substr($string, 1)) : $string;
}

// Trim strings by number of characters but only return full words...
function limit_text($text, $len) {
  if (strlen($text) <= $len) {
      return $text;
  }
  $text_words = explode(' ', $text);
  $out = null;

  foreach ($text_words as $word) {
      if ((strlen($word) > $len) && $out == null) {

          return substr($word, 0, $len) . '...';
      }
      if ((strlen($out) + strlen($word)) > $len) {
          return $out . '...';
      }
      $out.=' ' . $word;
  }
  return $out;
}

// Remove some stuff from head
remove_action('wp_head', 'wp_generator');

// Include admin JS and CSS
add_action( 'admin_head', 'custom_admin');

function custom_admin() {
  $url = get_bloginfo('template_url');
  echo '<script src="'.$url.'/js/admin.js"></script>';
  echo '<link rel="stylesheet" href="'.$url.'/css/admin.css">';
}

// Remove a few admin pages
add_action( 'admin_menu', 'my_remove_menus', 999 );
function my_remove_menus() {
	remove_menu_page( 'link-manager.php' );
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