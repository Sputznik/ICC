<ul id="<?php _e( $atts['id'] );?>" data-target="<?php _e('li.sp-post');?>" data-url="<?php _e( $atts['url'] );?>" class="list-unstyled sp-icc-posts-2 grid-horizontal">
  <?php while( $this->query->have_posts() ) : $this->query->the_post();?>
    <li class="sp-post">
      <?php get_template_part( 'partials/post', 'horizontal'); ?>
    </li>
  <?php endwhile;?>
</ul>
