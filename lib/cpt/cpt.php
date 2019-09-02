<?php

add_filter( 'orbit_post_type_vars', function( $post_types ){

	$post_types['interviews'] = array(
		'slug' 		=> 'interviews',
		'labels'	=> array(
			'name' 					=> 'Interviews',
			'singular_name' => 'Interview',
		),
		//'rewrite'		=> array('slug' => 'incidents', 'with_front' => false ),
		'menu_icon'	=> 'dashicons-format-quote',
		'public'		=> true,
		'supports'	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
	);


	return $post_types;
} );
