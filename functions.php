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


add_shortcode( 'icc_city_guides', function(){

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
