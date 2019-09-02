<?php get_header();?>
<?php $term = $wp_query->get_queried_object();$image_url = apply_filters( 'taxonomy-images-queried-term-image-url', '', array( 'image_size' => 'full' ) );?>
<div class="bg-overlay-title" style="background-image:url('<?php _e( $image_url );?>')">
  <div class="bg-overlay"></div>
  <h2><?php _e( $term->name );?></h2>
</div>
<?php if ( have_posts() ) : ?>
<div class="container" style="padding: 50px 15px;">
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
body.tax-locations .header3 .navbar-default.sticky-solid{
  background-color: transparent;
}
body.tax-locations .header3 .navbar-default.sticky-solid.scrolled{
  background-color: #fff;
}



.bg-overlay-title{
  background-size: cover;
  background-position: center;
  padding: 120px 0 80px;
  position: relative;
}
.bg-overlay-title h2{
  color: #fff;
  line-height: 1.4;
  text-transform: uppercase;
  position: absolute;
  z-index: 2;
  text-align: center;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
}
.bg-overlay{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #33333399;
}
</style>
