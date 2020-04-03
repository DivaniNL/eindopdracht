<?php

function eindopdracht_resources(){

    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts' , 'eindopdracht_resources');











// Get top class_parents

function get_top_ancestor_id(){

global $post;

  if($post->post_parent) {
      $ancestors = array_reverse(get_post_ancestors($post->ID));
      return $ancestors[0];
  }
  return $post->ID;
}


// Does page have Children

function has_children(){

  global $post;

  $pages = get_pages('child_of=' . $post->ID);
  return count($pages);

}



// excerpt

function custom_excerpt_length(){

return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length');
 
 
 

function eindopdracht_setup() {

//navigation menus
register_nav_menus(array(
  'primary' => __( 'Primary menu'),
  'footer' => __( 'Footer menu'),
));

//image
if (function_exists('add_theme_support')) { add_theme_support('post-thumbnails'); 
add_image_size('small', 110, 110, true ); // Normal post thumbnails
add_image_size('banner', 920,  400, array('left', 'top'));
}
//post format
add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('after_setup_theme', 'eindopdracht_setup');
 ?>
