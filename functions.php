<?php

define( 'ICC_VERSION', '1.0.1' );

add_action('wp_enqueue_scripts',function(){
  wp_enqueue_style( 'icc', get_stylesheet_directory_uri().'/assets/css/style.css', array('sp-core-style'), ICC_VERSION );

});

include('lib/cpt/cpt.php');

function icc_excerpt_length( $length ) {
      return 30;
}
add_filter( 'excerpt_length', 'icc_excerpt_length', 999 );
