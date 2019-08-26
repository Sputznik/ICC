<?php

define( 'ICC_VERSION', time() );

add_action('wp_enqueue_scripts',function(){
  wp_enqueue_style( 'icc', get_stylesheet_directory_uri().'/assets/css/style.css', array('sp-core-style'), ICC_VERSION );

});

include('lib/cpt/cpt.php');
