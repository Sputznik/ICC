<!-- ICC Social icons template -->
<?php
  $web_link = get_post_meta( get_the_ID(), 'story-website', true );
  $mail_link = get_post_meta( get_the_ID(), 'story-mail', true );
  $fb_link =  get_post_meta( get_the_ID(), 'story-facebook', true );
  $insta_link = get_post_meta( get_the_ID(), 'story-instagram', true );
  $flag =

  $icons = array(
    'web'  => array(
      'icon'  => 'fa fa-globe',
      'url'   => $web_link
    ),
    'mail'  => array(
      'icon'  => 'fa fa-envelope',
      'url'   => $mail_link
    ),
    'fb'  => array(
      'icon'  => 'fa fa-facebook',
      'url'   =>  $fb_link
    ),
    'in'  => array(
      'icon'  => 'fa fa-instagram',
      'url'   => $insta_link
    ),
  );
?>
<?php if( $web_link || $mail_link || $fb_link || $insta_link ):?>
  <div class="icc-social-icons">
  <h5 class='social-media-heading uppercase'>
    <span><strong>Follow <?php the_title();?></strong></span>
  </h5>
  <ul class="list-inline social-icons">
  <?php foreach( $icons as $key => $icon ): $class = $key." social-fa-icon"; ?>
    <?php if( !empty($icon['url']) ):?>
      <li>
        <a class='<?php _e( $class ); ?>' target='_blank' href='<?php _e( ( $key == 'mail' ) ? "mailto:".$icon['url'] : $icon['url'] );?>'>
          <i class='<?php _e( $icon['icon'] );?>'></i>
        </a>
      </li>
    <?php endif;?>
  <?php endforeach;?>
  </ul>
  </div>
<?php endif;?>
<!-- ICC Social icons template -->
