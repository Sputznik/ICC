<?php $image_url = icc_get_taxonomy_image_url( $term );?>
<div class="bg-img-icc" style="background-image: url( <?php _e( $image_url );?> );">
  <div class="sp-post-desc">
    <h3><?php _e( $term->name );?></h3>
  </div>
  <a class="icc-img-link" href="<?php _e( get_term_link( $term ) );?>"></a>
</div>
