<?php

add_filter( 'orbit_post_type_vars', function( $post_types ){

	$post_types['coffee'] = array(
		'slug' 		=> 'coffee',
		'labels'	=> array(
			'name' 					=> 'Coffee',
			'singular_name' => 'Coffee',
		),
		'menu_icon'	=> 'dashicons-art',
		'public'		=> true,
		'supports'	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	/*
	$post_types['interviews'] = array(
		'slug' 		=> 'interviews',
		'labels'	=> array(
			'name' 					=> 'Interviews',
			'singular_name' => 'Interview',
		),
		'menu_icon'	=> 'dashicons-format-quote',
		'public'		=> true,
		'supports'	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
	);
	*/

	$post_types['stories'] = array(
		'slug' 		=> 'stories',
		'labels'	=> array(
			'name' 					=> 'Stories',
			'singular_name' => 'Story',
		),
		'menu_icon'	=> 'dashicons-format-gallery',
		'public'		=> true,
		'supports'	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
	);

	/*
	$post_types['lets-brew'] = array(
		'slug' 		=> 'lets-brew',
		'labels'	=> array(
			'name' 					=> 'Lets Brew',
			'singular_name' => 'Brew',
		),
		'menu_icon'	=> 'dashicons-format-video',
		'public'		=> true,
		'supports'	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	*/

	$post_types['learn-guides'] = array(
		'slug' 		=> 'learn-guides',
		'labels'	=> array(
			'name' 					=> 'Learn Guides',
			'singular_name' => 'Learn Guide',
		),
		'menu_icon'	=> 'dashicons-format-video',
		'public'		=> true,
		'supports'	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	$post_types['cafe'] = array(
		'slug' 		=> 'cafe',
		'labels'	=> array(
			'name' 					=> 'Cafe',
			'singular_name' => 'Cafe',
		),
		'menu_icon'	=> 'dashicons-media-interactive',
		'public'		=> true,
		'supports'	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);


	return $post_types;
} );

/* PUSH INTO THE GLOBAL VARS OF ORBIT TAXNOMIES */
add_filter( 'orbit_taxonomy_vars', function( $taxonomies ){

	$taxonomies['coffee-cat']	= array(
		'label'			=> 'Coffee Categories',
		'slug' 			=> 'coffee-cat',
		'post_types'	=> array( 'coffee' )
	);

	$taxonomies['stories-cat']	= array(
		'label'			=> 'Story Categories',
		'slug' 			=> 'stories-cat',
		'post_types'	=> array( 'stories' )
	);

	$taxonomies['guide-cat']	= array(
		'label'			=> 'Guide Categories',
		'slug' 			=> 'guide-cat',
		'post_types'	=> array( 'learn-guides' )
	);

	$taxonomies['locations']	= array(
		'label'			=> 'Location',
		'slug' 			=> 'locations',
		'post_types'	=> array( 'cafe', 'stories' )
	);

	return $taxonomies;

} );

add_filter( 'orbit_meta_box_vars', function( $meta_box ){
	$meta_box['cafe'] = array(
		array(
			'id'			=> 'cafe-meta-fields',
			'title'		=> 'Additional Fields',
			'fields'	=> array(
				'timings' => array(
					'type' => 'textarea',
					'text' => 'Timings'
				),
				'cafe-address' => array(
					'type' => 'textarea',
					'text' => 'Address'
				),
				'cafe-map' => array(
					'type' => 'textarea',
					'text' => 'Map'
				),
			)
		)
	);
	$meta_box['stories'] = array(
		array(
			'id'			=> 'stories-meta-fields',
			'title'		=> 'Additional Fields',
			'fields'	=> array(
				'story-website' => array(
					'type' => 'text',
					'text' => 'Website URL'
				),
				'story-mail' => array(
					'type' => 'text',
					'text' => 'Email'
				),
				'story-facebook' => array(
					'type' => 'text',
					'text' => 'Facebook Account'
				),
				'story-instagram' => array(
					'type' => 'text',
					'text' => 'Instagram Account'
				),
			)
		)
	);
	$meta_box['post'] = array(
		array(
			'id'			=> 'posts-meta-fields',
			'title'		=> 'Additional Fields',
			'fields'	=> array(
				'contact-name' => array(
					'type' => 'text',
					'text' => 'Author Name'
				),
				'contact-email' => array(
					'type' => 'text',
					'text' => 'Author Email'
				),
			)
		)
	);
	return $meta_box;
});
