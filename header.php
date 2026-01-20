<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Towing
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(''); ?>>
<?php wp_body_open(); ?>
<div class="signin_wrap">
  <div class="container">
    <div class="widget-left">
      <?php if( '' !== get_theme_mod('contact_mail')){ ?>
      <span class="emailinfo"><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo sanitize_email(get_theme_mod('contact_mail','demo@companyname.com')); ?>"><?php echo sanitize_email(get_theme_mod('contact_mail','demo@companyname.com')); ?></a></span>
      <?php } ?>
    </div>
    <!--widget-left-->
    <div class="widget-right">
      <?php if('' !== get_theme_mod('contact_no')) {?>
      <span class="phno"><i class="fa fa-phone"></i> <?php echo esc_attr( get_theme_mod('contact_no', '800 323 456 897', 'skt-towing' )); ?></span>
      <?php } ?>
      <?php if('' !== get_theme_mod('service_hr')) {?>
      <span class="support-27-7"><?php echo esc_html( get_theme_mod('service_hr', '24/7', 'skt-towing'));?></span>
      <?php } ?>
    </div>
    <!--widget-right-->
    
    <div class="clear"></div>
  </div>
  <!--container--> 
</div>
<div class="header">
  <div class="header-inner">
    <div class="logo">
      <?php skt_towing_the_custom_logo(); ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <h1><?php bloginfo('name'); ?></h1>
      <span class="tagline">
      <?php bloginfo( 'description' ); ?>
      </span> </a> </div>
    <!-- logo -->
    <div class="header-right">
      <div class="toggle"> <a class="toggleMenu" href="<?php echo esc_url('#');?>">
        <?php esc_attr_e('Menu','skt-towing'); ?>
        </a> </div>
      <!-- toggle -->
      <div class="nav">
        <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
      </div>
      <!-- nav -->
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- header-inner --> 
</div>
<?php if ( is_front_page() && ! is_home() ) { ?>
<?php if( get_theme_mod( 'hide_slider' ) == '') { ?>
<div class="slider-main">
<!-- Slider Section -->
<?php for($skt_towing_sld=7; $skt_towing_sld<10; $skt_towing_sld++) { ?>
	<?php if( get_theme_mod('page-setting'.$skt_towing_sld)) { ?>
     <?php $skt_towing_slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$skt_towing_sld,true)); ?>
		<?php while( $skt_towing_slidequery->have_posts() ) : $skt_towing_slidequery->the_post();
        $skt_towing_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
        $skt_towing_img_arr[] = $skt_towing_image;
        $skt_towing_id_arr[] = $post->ID;
        endwhile;
  	  }
    }
?>
<?php if(!empty($skt_towing_id_arr)){ ?>
    <div id="slider" class="nivoSlider">
      <?php 
	$i=1;
	foreach($skt_towing_img_arr as $skt_towing_url){ ?>
      <img src="<?php echo $skt_towing_url; ?>" title="#slidecaption<?php echo $i; ?>" />
      <?php $i++; }  ?>
    </div>
		<?php 
        $i=1;
        foreach($skt_towing_id_arr as $skt_towing_id){ 
        $skt_towing_title = get_the_title( $skt_towing_id ); 
        $post = get_post($skt_towing_id); 
        ?>
    <div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo $skt_towing_title; ?></h2>
        <p><?php the_excerpt(); ?></p>
		<a class="sldbutton" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'skt-towing');?></a>
      </div>
    </div>
    <?php $i++; } ?>
  <div class="clear"></div>
<?php } else { ?>
	<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
	<div class="infomessage"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slide-info.jpg" /></div>
    <?php endif;?>
      <div class="clear"></div>
<!-- Slider Section -->
<?php } ?>
</div>
<?php } ?>
<div class="clear"></div>
<?php if( get_theme_mod( 'hide_boxes' ) == '') { ?>
<div id="wrapTwo">
  <div class="container">
    <div class="wrap_two">
      <?php 
        if( get_theme_mod('page-setting1')) { 
        $skt_towing_queryabout = new WP_query('page_id='.get_theme_mod('page-setting1' ,true)); 
        while( $skt_towing_queryabout->have_posts() ) : $skt_towing_queryabout->the_post();
      ?>
      <h2 class="section_title">
        <?php the_title(); ?>
        <span></span></h2>
      <?php the_content(); ?>
      <?php endwhile; } else { ?>
      <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
 	  <div class="infomessage"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/service-info.jpg" /></div>	
      <?php endif; ?>
      <?php
    }
    ?>
      <div class="clear"></div>
    </div>
    <!-- .container --> 
  </div>
</div>
<?php } ?>

<?php if( get_theme_mod( 'hide_boxes' ) == '') { ?>
<div id="wrapOne">
  <div class="container">
    <div class="services-wrap">
       <?php
$pages = array();
for ( $count = 2; $count <= 6; $count++ ) {
	$mod = get_theme_mod( 'page-setting' . $count );
	if ( 'page-none-selected' != $mod ) {
		$pages[] = $mod;
	}
}
$filterArray = array_filter($pages);
if(count($filterArray) == 0){ ?>
<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
<div class="infomessage"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/four-boxes.jpg" /></div>
<?php endif;?>
<?php 	
}else{
$filled_array=array_filter($pages);
	
$args = array(
	'posts_per_page' => 4,
	'post_type' => 'page',
	'post__in' => $pages,
	'orderby' => 'post__in'
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	$count = 1;
	while ( $query->have_posts() ) : $query->the_post();
	?>
	<div class="one_four_page <?php if($count%4==0) { ?>last_column<?php } ?>"> <a href="<?php the_permalink(); ?>">
        <div class="thumb_four_page">
          <?php the_post_thumbnail(); ?>
          <div class="image-border"></div>
        </div>
        <a href="<?php the_permalink(); ?>">
        <h4>
          <?php the_title(); ?>
        </h4>
        </a>
        <div class="one_four_page_content">
		<?php
  			the_excerpt();
		?>
          <div style="text-align:left; background:#fff; color:#3a3a3a;" class="view-all-btn vall"><a style="color:#3a3a3a;" href="<?php the_permalink(); ?>">
            <?php esc_attr_e('Read More','skt-towing');?>
            </a></div>
        </div>
      </div>
        <?php if($count == 0) { ?>
        <div class="clear"></div>
        <?php } ?>
	<?php
	$count++;
	endwhile;
 endif;
}
?>
    </div>
    <!-- .services-wrap-->
    <div class="clear"></div>
  </div>
  <!-- .container --> 
</div>
<?php 
} 
?>
<?php
}
?>