<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Towing
 */
?>

<div id="footer-wrapper">
<div class="container">
  <div class="footer">
    <div class="cols-4">
      <div class="widget-column-1">
        <h5 class="addressfooter"><?php bloginfo('name'); ?></h5>
        <?php if( '' !== get_theme_mod('contact_add')){ ?>
        <p class="parastyle"><?php echo esc_html( get_theme_mod('contact_add', 'First Floor, Rogger John Building 69 Market Street Hampshire, London UK 7925', 'skt-towing' )); ?></p>
        <?php } ?>
        <div class="phone-no">
          <p>
            <?php if( '' !== get_theme_mod('contact_no')){ ?>
            <i class="fa fa-phone"></i> <?php echo esc_attr( get_theme_mod('contact_no', '800 323 456 897', 'skt-towing' )); ?>
            <?php } ?>
            <br>
            <?php if( '' !== get_theme_mod('contact_mail')){ ?>
            <i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo sanitize_email(get_theme_mod('contact_mail','demo@companyname.com')); ?>"><?php echo sanitize_email(get_theme_mod('contact_mail','demo@companyname.com')); ?></a>
            <?php } ?>
          </p>
        </div>
        <div class="clear"></div>
        <div class="social-icons">
          <?php if ( '' !== get_theme_mod( 'fb_link' ) ) { ?>
          <a title="facebook" class="fa fa-facebook fa-1x" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','http://www.facebook.com')); ?>"></a>
          <?php } ?>
          <?php if ( '' !== get_theme_mod( 'twitt_link' ) ) { ?>
          <a title="twitter" class="fa fa-twitter fa-1x" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','http://www.twitter.com')); ?>"></a>
          <?php } ?>
          <?php if ( '' !== get_theme_mod('gplus_link') ) { ?>
          <a title="google-plus" class="fa fa-google-plus fa-1x" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','http://plus.google.com')); ?>"></a>
          <?php }?>
          <?php if ( '' !== get_theme_mod('linked_link') ) { ?>
          <a title="linkedin" class="fa fa-linkedin fa-1x" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','http://www.linkedin.com')); ?>"></a>
          <?php } ?>
        </div>
      </div>
      <div class="widget-column-2">
        <h5>
          <?php esc_attr_e('Quick Links','skt-towing');?>
        </h5>
        <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
      </div>
      <div class="widget-column-3">
        <h5>
          <?php esc_attr_e('Recent Post','skt-towing');?>
        </h5>
        <ul>
          <?php $args = array( 'posts_per_page' => 3, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
            $the_query = new WP_Query( $args );
          ?>
          <?php while ( $the_query->have_posts() ) :  $the_query->the_post(); ?>
          <li><a href="<?php the_permalink(); ?>">
            <?php the_title();?>
            </a></li>
          <?php endwhile; ?>
        </ul>
      </div>
      <div class="widget-column-4">
        <h5>
          <?php esc_attr_e('Customer Services','skt-towing');?>
        </h5>
        <?php wp_nav_menu( array('theme_location' => 'services' )); ?>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <!--end .cols-4--> 
  </div>
  <!--end .footer--> 
</div>
<!--end .container-->
<div class="copyright-wrapper">
  <div class="container">
    <div class="design-by"><?php bloginfo('name'); ?> <?php esc_html_e('Theme By ','skt-towing');?> <a href="<?php echo esc_url('https://www.sktthemes.org/product-category/automotive-wordpress-themes/');?>" target="_blank">
        <?php esc_html_e('SKT Automotive Themes','skt-towing'); ?>
        </a></div>
    <div class="clear"></div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>