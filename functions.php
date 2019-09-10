<?php

define( 'ICC_VERSION', time() );

add_action('wp_enqueue_scripts',function(){
  wp_enqueue_style( 'icc', get_stylesheet_directory_uri().'/assets/css/style.css', array( 'sp-core-style', 'sp-core-single' ), ICC_VERSION );

});

include('lib/cpt/cpt.php');

// Exclude pages & cafe from WordPress Search
add_action('init', function(){
  global $wp_post_types;
  $wp_post_types['page']->exclude_from_search = true;
  if( is_search() ){
    $wp_post_types['cafe']->exclude_from_search = true;
  }

} );


add_filter( 'sp_transparent_header_types', function( $post_types ){
  $post_types[] = "learn-guides";
  return $post_types;
} );

add_action( 'widgets_init', function(){
  register_sidebar( array(
		'name' 			    => 'Events Sidebar',
		'id' 			      => 'events-sidebar',
		'description' 	=> 'Appears in the homepage',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );
} );

/* LENGTH OF THE EXCERPT */
add_filter( 'excerpt_length', function( $length ){
  return 20;
}, 999 );




// We get a list taxonomies on the search box
function icc_get_terms_by_search( $search_text, $taxonomy = 'locations' ){
  $args = array(
      'taxonomy'      => array( $taxonomy ),
      'orderby'       => 'id',
      'order'         => 'ASC',
      'hide_empty'    => true,
      'fields'        => 'all',
      'name__like'    => $search_text
  );
  $terms = get_terms( $args );
  return $terms;
}

/**
 * Get Taxonomy Image URL
 *
 * Uses the 'Taxonomy Image' plugin.
 *
 * @param $term int|WP_Term|object
 * @param $taxonomy String Taxonomy name that $term is part of.
 * @return int|fase The attachment id on success. False when term does not exist or no image found.
 */
function icc_get_taxonomy_image_url( $term, $taxonomy = '' ){

	if ( ! function_exists( 'taxonomy_image_plugin_get_associations' ) ){ return false; }

  $tt_id = 0;
  if ( isset( $term->term_taxonomy_id ) ){ $tt_id = (int) $term->term_taxonomy_id; }

  $associations = taxonomy_image_plugin_get_associations();
  if ( isset( $associations[ $tt_id ] ) ){
    $image_url = wp_get_attachment_image_src( $associations[ $tt_id ], 'full' )[0];
    return $image_url;
  }
  return false;
}


function icc_city_guides_html( $terms ){
  if( count( $terms ) ){
    _e( '<ul class="list-unstyled sp-icc-posts-3 icc-grid">' );
    foreach( $terms as $term ){
      _e( '<li class="sp-post">' );
      include( 'partials/cafe-img-grid.php' );
      _e( '</li>' );
    }
    _e( '</ul>' );
  }
}

add_shortcode( 'icc_events', function( $atts ){
  ob_start();
  if( is_active_sidebar( 'events-sidebar' ) ){ dynamic_sidebar( 'events-sidebar' ); }
  return ob_get_clean();
});

add_shortcode( 'icc_search_form', function( $atts ){
  ob_start();
  get_search_form();
  return ob_get_clean();
} );


add_shortcode( 'icc_label', function( $atts ){
  ob_start();
  _e( "<h4 class='overlay-label'>" . $atts['title'] . "</h4>" );
  return ob_get_clean();
});


add_shortcode( 'icc_city_guides', function( $atts ){

  $atts = shortcode_atts( array(
    'number'  => 0
    ), $atts, 'icc_city_guides'
  );

  ob_start();

  $terms = get_terms( array(
    'taxonomy'    => 'locations',
    'hide_empty'  => false,
    'number'      => $atts['number']
  ) );

  icc_city_guides_html( $terms );

  return ob_get_clean();

} );
