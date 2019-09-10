<ul id="<?php _e( $atts['id'] );?>" data-target="<?php _e('li.sp-post');?>" data-url="<?php _e( $atts['url'] );?>" class="list-unstyled sp-icc-posts-2 icc-fixed">
  <?php while( $this->query->have_posts() ) : $this->query->the_post(); global $post;?>
    <li class="sp-post">
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];?>
      <div class="bg-img-icc" style="background-image: url( <?php _e( $image );?> );">
        <a class="icc-img-link" href="<?php the_permalink();?>"></a>
      </div>
      <div class="sp-post-desc">
        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
        <p class="text-muted"><?php the_date();?></p>
      </div>
    </li>
  <?php endwhile;?>
</ul>
