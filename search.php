<?php get_header();?>
<?php global $wp_query;?>
<div class="search-content">

  <div class="container">
    <?php get_search_form();?>
  </div>

  <?php $search_terms = icc_get_terms_by_search( get_search_query() ); if( is_array( $search_terms ) && count( $search_terms ) ):?>
  <div class="container term-results">
    <ul class="list-unstyled sp-icc-posts-3 icc-grid">
    <?php foreach ( $search_terms as $term ):?>
      <li class="sp-post">
        <?php $image_url = icc_get_taxonomy_image_url( $term );?>
        <div class="bg-img-icc" style="background-image: url( <?php _e( $image_url );?> );">
          <div class="sp-post-desc">
            <h3><?php _e( $term->name );?></h3>
          </div>
          <a class="icc-img-link" href="<?php _e( get_term_link( $term ) );?>"></a>
        </div>
      </li>
    <?php endforeach;?>
    </ul>
  </div>
  <?php endif;?>

  <?php if( term_exists( get_search_query(), 'locations ') ):?>
  <div class="container term-results">
    <?php
      $cafes = do_shortcode( '[orbit_query pagination="1" posts_per_page="6" post_type="cafe" style="img-grid" tax_query="locations:'.get_search_query().'"]' );
      if( $cafes ){
        echo "<div class='cafes-results'>";
        _e( do_shortcode( '[icc_label title="CAFÉS"]' ) );
        echo $cafes;
        echo "</div>";
      }
    ?>
  </div>
  <?php endif;?>

  <div class="articles-results">
    <div class="container">
  		<div class="row">
  			<div class="col-lg-12">
  				<?php if ( have_posts() ) : ?>
          <?php _e( do_shortcode( '[icc_label title="ARTICLES"]' ) );?>
          <ul class="list-unstyled sp-icc-posts-3 icc-fixed">
            <?php while ( have_posts() ) : the_post(); ?>
  				  <li class="sp-post">
              <?php get_template_part( 'partials/post', 'common'); ?>
  				  </li>
  				  <?php endwhile;?>
          </ul>
  				<?php
  					else :
  			 			printf( __('Sorry, but nothing matched your search terms. Please try again with some different keywords.') );
  					endif;
  				?>
  			</div>
  		</div>
  	</div>
  </div>
  <?php if ( have_posts() ): ?>
	<!-- Previous/next page navigation. -->
	<div class="container-fluid search-pagination">
		<div class="container text-center">
			<?php
				the_posts_pagination(
					array(
						'mid_size' 	=> 1,
						'prev_text' => __( '&laquo;' ),
						'next_text' => __( '&raquo;' ),
						'screen_reader_text' => __( ' ' ),
					)
				);
			?>
		</div>
	</div>
	<?php endif;?>
</div>
<?php get_footer();?>
