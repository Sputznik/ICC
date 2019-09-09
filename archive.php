<?php get_header();?>
<div class="bg-overlay-title" style="background-color: #999;">
  <div class="bg-overlay"></div>
  <h2><?php the_archive_title();?></h2>
</div>
<?php if ( have_posts() ) : ?>
<div class="container" style="padding: 50px 15px;">
  <div class="row">
    <div class="col-sm-12">
      <ul class="list-unstyled sp-icc-posts-3 icc-fixed">
        <?php while ( have_posts() ) : the_post(); ?>
        <li class="sp-post">
          <?php get_template_part( 'partials/post', 'common'); ?>
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
  .sp-icc-posts-3 .sp-post{ border: #eee solid 1px;}
</style>
