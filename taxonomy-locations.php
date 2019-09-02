<?php get_header();?>
<?php $term = $wp_query->get_queried_object();?>
<div class="location-title">
  <div class="container">
    <h2><?php _e( $term->name );?></h2>
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
