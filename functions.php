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
function icc_get_taxonomy_image_url( $term_id, $taxonomy = '' ){

	if ( ! function_exists( 'taxonomy_image_plugin_get_associations' ) ){ return false; }
  if ( ! taxonomy_image_plugin_get_associations( $term_id ) ){ return false; }

	$term = get_term( $term_id, $taxonomy );
  if ( ! $term || is_wp_error( $term ) ){ return false; }
  $tt_id = 0;
  if ( isset( $term->term_taxonomy_id ) ){ $tt_id = (int) $term->term_taxonomy_id; }

	$associations = taxonomy_image_plugin_get_associations();
  print_r( $associations );
  if ( isset( $associations[ $tt_id ] ) ){
    $image_url = wp_get_attachment_image_src( $associations[ $tt_id ], 'full' )[0];
    return (int) $image_url;
  }
  return false;
}

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

  ob_start();

  $terms = apply_filters( 'taxonomy-images-get-terms', '', array(
    'taxonomy'  => 'locations',
    'hide_empty' => false,
  ) );

  if( count( $terms ) ){
    _e( '<ul class="list-unstyled sp-icc-posts-3 icc-grid">' );
    foreach( $terms as $term ){
      _e( '<li class="sp-post">' );

      $image_url = wp_get_attachment_image_src( $term->image_id, 'full' )[0];

      ?>
      <div class="bg-img-icc" style="background-image: url( <?php _e( $image_url );?> );">
        <div class="sp-post-desc">
          <h3><?php _e( $term->name );?></h3>
        </div>
        <a class="icc-img-link" href="<?php _e( get_term_link( $term ) );?>"></a>
      </div>

      <?php

      _e( '</li>' );
    }
    _e( '</ul>' );
  }

  return ob_get_clean();

} );
