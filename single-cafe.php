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
      </div>
      <div class="col-sm-3">
        <h4><i class="fa fa-clock-o"></i>&nbsp;Timings</h4>
      </div>
      <div class="col-sm-6">
        <div class="cafe-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31108.637134282417!2d77.629565!3d12.934717!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3b9120fad40e4ffc!2sThird%20Wave%20Coffee%20Roasters%20%7C%20Koramangala!5e0!3m2!1sen!2sin!4v1567405702786!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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
