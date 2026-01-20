<?php
/**
 * SKT Towing functions and definitions
 *
 * @package SKT Towing
 */
 
if ( ! isset( $content_width ) ) {
	$content_width = 640;
} 
 
/**
 * Filter the except length to 30 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function skt_towing_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'skt_towing_excerpt_length', 999 );

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'skt_towing_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_towing_setup() {
	load_theme_textdomain( 'skt-towing', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_theme_support( 'custom-header', array( 'header-text' => false ) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skt-towing' ),
		'footer' => __( 'Footer Quick Links', 'skt-towing' ),
		'services' => __( 'Footer Customer Services', 'skt-towing' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	
	add_editor_style( 'editor-style.css' );
}
endif; // skt_towing_setup
add_action( 'after_setup_theme', 'skt_towing_setup' );

function skt_towing_widgets_init() {	
	
	register_sidebar( array(
		'name'          => esc_attr__( 'Blog Sidebar', 'skt-towing' ),
		'description'   => esc_attr__( 'Appears on blog page sidebar', 'skt-towing' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
}
add_action( 'widgets_init', 'skt_towing_widgets_init' );


function skt_towing_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Oswald, trsnalate this to off, do not
		* translate into your own language.
		*/
		$pacifico = _x('on','Pacifico:on or off','skt-towing');
 		$ptsans = _x('on','PT Sans:on or off','skt-towing');
		$oswald = _x('on','Oswald:on or off','skt-towing');
		$lobster = _x('on','Lobster:on or off','skt-towing');
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/		
		
		if('off' !== $pacifico){
			$font_family = array();
			
			if('off' !== $pacifico){
				$font_family[] = 'Pacifico:400';
			}

			if('off' !== $ptsans){
				$font_family[] = 'PT+Sans:400,400italic,700,700italic';
			}	
			
			if('off' !== $oswald){
				$font_family[] = 'Oswald:400,700,300';
			}
			
			if('off' !== $lobster){
				$font_family[] = 'Lobster:400';
			}																	
				
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function skt_towing_scripts() {
	wp_enqueue_style('skt-towing-font', skt_towing_font_url(), array());
	wp_enqueue_style( 'skt-towing-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skt-towing-editor-style', get_template_directory_uri().'/editor-style.css');
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri().'/css/nivo-slider.css');
	wp_enqueue_style( 'skt-towing-main-style', get_template_directory_uri().'/css/responsive.css');		
	wp_enqueue_style( 'skt-towing-base-style', get_template_directory_uri().'/css/style_base.css');
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'skt-towing-custom_js', get_template_directory_uri() . '/js/custom.js');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animation.css');	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_towing_scripts' );

define('SKT_URL','https://www.sktthemes.org');
define('SKT_THEME_URL','https://www.sktthemes.org/themes');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/towing_documentation/');
define('SKT_PRO_THEME_URL','https://www.sktthemes.org/shop/towing-wordpress-theme/');
define('SKT_THEME_FEATURED_SET_VIDEO_URL','https://www.youtube.com/watch?v=310YGYtGLIM');
define('SKT_LIVE_DEMO','http://sktthemesdemo.net/towing/');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// Add a Custom CSS file to WP Admin Area
function skt_towing_admin_theme_style() {
	    wp_enqueue_style('skt-towing-custom-admin-style', get_template_directory_uri() . '/css/admin-style.css');
}
add_action('admin_enqueue_scripts', 'skt_towing_admin_theme_style');


if ( ! function_exists( 'skt_towing_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_towing_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


/**
 * Enqueue a script in the WordPress admin, excluding customize.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function skt_towing_admin_customize_script( $hook ) {
    if ( 'customize.php' != $hook ) {
        return;
    }
	wp_enqueue_style('skt-towing-custom-admin-style', get_template_directory_uri() . '/css/admin-style.css', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'skt_towing_admin_customize_script' );