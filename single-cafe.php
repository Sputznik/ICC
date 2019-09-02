<?php get_header();?>
<?php if( have_posts() ): while( have_posts() ): the_post();?>
  <div class="cafe-title">
    <div class="container">
      <h2><?php the_title();?></h2>
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
</style>
