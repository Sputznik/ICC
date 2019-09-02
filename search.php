<?php get_header();?>
<?php global $wp_query;?>
<div class="search-content">

  <div class="container">
    <?php get_search_form();?>
  </div>

  <?php if( term_exists( get_search_query(), 'locations ') ):?>
  <div class="container term-results">
    <?php
      $cafes = do_shortcode( '[orbit_query pagination="1" posts_per_page="6" post_type="cafe" style="img-grid" tax_query="locations:'.get_search_query().'"]' );
      if( $cafes ){
        echo "<div class='cafes-results'>";
        echo "<h4 class='overlay-label'>CAFÉS</h4>";
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
          <h4 class='overlay-label'>Articles</h4>
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
