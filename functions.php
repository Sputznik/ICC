<?php

define( 'ICC_VERSION', time() );

add_action('wp_enqueue_scripts',function(){
  wp_enqueue_style( 'icc', get_stylesheet_directory_uri().'/assets/css/style.css', array( 'sp-core-style', 'sp-core-single' ), ICC_VERSION );

});

include('lib/cpt/cpt.php');

function icc_excerpt_length( $length ) {
      return 30;
}
add_filter( 'excerpt_length', 'icc_excerpt_length', 999 );

/*
add_shortcode( 'icc_city_guides', function(){

  $terms = get_terms( array(
    'taxonomy' => 'locations',
    'hide_empty' => false,
  ) );

  if( count( $terms ) ){

  }
  foreach( $terms as $term ){

  }

} );
*/
