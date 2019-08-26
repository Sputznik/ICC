<?php

add_filter( 'orbit_post_type_vars', function( $post_types ){
  /*
	$post_types['reports'] = array(
		'slug' 		=> 'reports',
		'labels'	=> array(
			'name' 					=> 'Reports',
			'singular_name' => 'Report',
		),
		//'rewrite'		=> array('slug' => 'incidents', 'with_front' => false ),
		'public'		=> true,
		'supports'	=> array( 'title', 'editor' )
	);
  */

	return $post_types;
} );
