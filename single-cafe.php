<?php get_header();?>
<?php if( have_posts() ): while( have_posts() ): the_post();?>
  <div class="cafe-title">
    <h2><?php the_title();?><h2>
  </div>
<?php endwhile; endif; ?>
<?php get_footer();?>

<style>
  .cafe-title{
    background: #333;
    padding: 120px 0 80px;
  }
  .cafe-title h2{
    text-transform: uppercase;
    max-width: 400px;
  }
</style>
