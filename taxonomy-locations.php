<?php get_header();?>
<?php $term = $wp_query->get_queried_object();?>
<div class="location-title">
  <div class="container">
    <h2><?php _e( $term->name );?></h2>
  </div>
</div>
<?php if ( have_posts() ) : ?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <ul class="list-unstyled sp-icc-posts-3 icc-grid">
        <?php while ( have_posts() ) : the_post(); ?>
        <li class="sp-post">
          <?php get_template_part( 'partials/post', 'img-grid'); ?>
        </li>
        <?php endwhile;?>
      </ul>
    </div>
  </div>
</div>
<?php endif; ?>
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
<?php get_footer();?>
<style>
@media( min-width: 768px ){
  .location-title{ margin-top: 80px; }
}
.location-title{
  background: #333;
  padding: 120px 0 80px;
}
.location-title h2{
  color: #fff;
  line-height: 1.4;
  text-transform: uppercase;
  max-width: 500px;
}
</style>
