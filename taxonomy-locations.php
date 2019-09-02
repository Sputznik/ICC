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
      <ul class='orbit-three-grid' style='margin-bottom:50px; padding-left: 0;'>
        <?php while ( have_posts() ) : the_post(); ?>
        <li class="orbit-article-db orbit-list-db">
          <?php
            global $post;
            $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );
          ?>
          <div class='orbit-thumbnail-bg' style='background-image: url( "<?php _e( $thumbnail[0] );?> ");position: relative;'>
            <h4><?php the_title();?></h4>
          	<a href='<?php the_permalink();?>'></a>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
</div>
<?php endif; ?>
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
.orbit-thumbnail-bg{
  position: relative;
}
.orbit-thumbnail-bg h4{
  position: absolute;
  transform: translate( -50%, -50% );
  left: 50%;
  top: 50%;
}
.orbit-thumbnail-bg a[href]{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
