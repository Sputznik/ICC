<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];?>
<div class="bg-img-icc" style="background-image: url( <?php _e( $image );?> );">
  <a class="icc-img-link" href="<?php the_permalink();?>"></a>
</div>
<div class="sp-post-desc">
  <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
  <p><?php the_excerpt();?></p>
  <p><a class="read-more" href="<?php the_permalink();?>">Continue Reading</a></p>
</div>
