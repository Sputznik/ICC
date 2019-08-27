<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];?>
<div class="bg-img-icc" style="background-image: url( <?php _e( $image );?> );">
  <div class="sp-post-desc">
    <h3><?php the_title();?></h3>
  </div>
  <a class="icc-img-link" href="<?php the_permalink();?>"></a>
</div>
