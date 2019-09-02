<?php get_header();?>
<?php global $wp_query;?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 search-content">
				<h1 class="page-title"><?php printf( __( '(%d) Search Results for: %s' ), $wp_query->found_posts, get_search_query() ); ?></h1>
				<hr>
				<?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
				<div class="search-item">
					<h2 class='orbit-title'><a href='<?php the_permalink();?>'><?php the_title();?></a></h2>
					<?php $excerpt = get_the_excerpt();?>
					<?php if( $excerpt ): ?><div class='orbit-excerpt'><?php _e( $excerpt );?></div><?php endif;?>
					<a class='orbit-btn' href='<?php the_permalink();?>'>Continue Reading</a>
				</div>
				<?php endwhile;?>
				<?php
					else :
			 			printf( __('Sorry, but nothing matched your search terms. Please try again with some different keywords.') );
					endif;
				?>
			</div>
		</div>
	</div>
  <?php if( term_exists( get_search_query(), 'locations ') ):?>
  <div class="container term-results">

    <?php
      $cafes = do_shortcode( '[orbit_query post_type="cafe" style="img-grid" tax_query="locations:'.get_search_query().'"]' );
      if( $cafes ){
        echo "<div class='cafes-results'>";
        echo "<h4 class='overlay-label'>".get_search_query()."</h4>";
        echo "</div>";
      }
      echo do_shortcode( '[orbit_query post_type="cafe" style="img-grid" tax_query="locations:'.get_search_query().'"]' );
    ?>
  </div>
  <?php endif;?>
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
<?php get_footer();?>
<style>
  .term-results{
    /*background: #333;*/
    padding: 50px 15px;
  }

  .overlay-label{
    background: #222;
    display: inline-block;
    color: #fff;
    padding: 5px 10px;
    text-transform: capitalize;
  }
</style>
