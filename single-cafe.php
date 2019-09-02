<?php get_header();?>
<?php if( have_posts() ): while( have_posts() ): the_post();?>
  <div class="cafe-title">
    <div class="container">
      <h2><?php the_title();?></h2>
    </div>
  </div>
  <div class="cafe-description container">
    <div class="row">
      <div class="col-sm-3">
        <h4><i class="fa fa-map-marker"></i>&nbsp;Address</h4>
        <?php _e( do_shortcode( '[orbit_cf id="cafe-address"]' ) );?>
      </div>
      <div class="col-sm-3">
        <h4><i class="fa fa-clock-o"></i>&nbsp;Timings</h4>
        <?php _e( do_shortcode( '[orbit_cf id="timings"]' ) );?>
      </div>
      <div class="col-sm-6">
        <div class="cafe-map">
          <?php _e( do_shortcode( '[orbit_cf id="cafe-map"]' ) );?>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; endif; ?>
<?php get_footer();?>

<style>
  @media( min-width: 768px ){
    .cafe-title{ margin-top: 80px; }
  }
  .cafe-title{
    background: #333;
    padding: 120px 0 80px;
  }
  .cafe-title h2{
    color: #fff;
    line-height: 1.4;
    text-transform: uppercase;
    max-width: 500px;
  }
  .cafe-description{
    padding: 50px 0;
  }
  .cafe-map{ margin-top: -150px; }
</style>
