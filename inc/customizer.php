<?php
/**
 * SKT Towing Theme Customizer
 *
 * @package SKT Towing
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_towing_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class skt_towing_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
 
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#d92d66',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','skt-towing'),
			'description'	=> __('More color options in PRO Version','skt-towing'),				
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
// Home Boxes 	
	$wp_customize->add_section('page_boxes',array(
		'title'	=> __('Home Boxes','skt-towing'),
 		'description' => sprintf( __( 'Featured Image Dimensions : ( 270 X 254 )<br/> Select Featured Image for these pages <br /> How to set featured image %s', 'skt-towing' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_FEATURED_SET_VIDEO_URL.'"' ), __( 'Click Here ?', 'skt-towing' )
						)
					),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_towing_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for service section:','skt-towing'),
			'section'	=> 'page_boxes'	
	));	
	
	$wp_customize->add_setting('page-setting2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_towing_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box one:','skt-towing'),
			'section'	=> 'page_boxes'	
	));
	
	$wp_customize->add_setting('page-setting3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_towing_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box two:','skt-towing'),
			'section'	=> 'page_boxes'
	));
	
	$wp_customize->add_setting('page-setting4',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_towing_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting4',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box three:','skt-towing'),
			'section'	=> 'page_boxes'
	));	
	
	$wp_customize->add_setting('page-setting5',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_towing_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting5',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box four:','skt-towing'),
			'section'	=> 'page_boxes'
	));	
	
	
	$wp_customize->add_setting('hide_boxes',array(
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_boxes', array(
    	   'section'   => 'page_boxes',
    	   'label'     => __('Hide This Section','skt-towing'),
    	   'type'      => 'checkbox'
     ));		
	 
// Home Boxes
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','skt-towing'),
		'description'	=> __('Add slider images here. Slider Image Size ( 1400 X 557 ) Set Featured image for slide image.<br /> More slider settings available in PRO Version.','skt-towing'),			
		'priority'		=> null
	));	

// Slider Section
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_towing_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','skt-towing'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_towing_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','skt-towing'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_towing_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','skt-towing'),
			'section'	=> 'slider_section'
	));	
	
// Slider Section
	
	$wp_customize->add_setting('hide_slider',array(
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
    	   'section'   => 'slider_section',
    	   'label'     => __('Hide This Section','skt-towing'),
    	   'type'      => 'checkbox'
     ));	
 
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','skt-towing'),
			'description'	=> __('Add social icons link here. <br /> More icon available in in PRO Version','skt-towing'),	
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> 'http://www.facebook.com',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','skt-towing'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> 'http://www.twitter.com',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','skt-towing'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> 'http://plus.google.com',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','skt-towing'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> 'http://www.linkedin.com',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','skt-towing'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
 
	$wp_customize->add_section('contact_sec',array(
			'title'	=> __('Contact Details','skt-towing'),
			'description'	=> __('Add you contact details here','skt-towing'),
			'priority'	=> null
	));
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('First Floor, Rogger John Building 69 Market Street Hampshire, London UK 7925','skt-towing'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'contact_add', array(
				'label'	=> __('Add contact address here','skt-towing'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add'
			)
		)
	);
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('800 323 456 897','skt-towing'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','skt-towing'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	
	$wp_customize->add_setting('service_hr',array(
			'default'	=> __('24/7','skt-towing'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('service_hr',array(
			'label'	=> __('Add service hour here.','skt-towing'),
			'section'	=> 'contact_sec',
			'setting'	=> 'service_hr'
	));	
	
	
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'demo@companyname.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add your email here','skt-towing'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));
}
add_action( 'customize_register', 'skt_towing_customize_register' );

//Integer
function skt_towing_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function skt_towing_custom_css(){
		?>
        	<style type="text/css">
					a,
					.logo a, .header .header-inner .logo h1, h5.addressfooter, .header .header-inner .nav ul li a:hover, 
					.signin_wrap a:hover,				
					.services-wrap .one_fourth:hover h3,
					.blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,
					.MoreLink:hover,
					.cols-3 ul li a:hover,.wedobox:hover .btn-small,.wedobox:hover .boxtitle,.slide_more, 
					.threebox a.read-more:hover, .news a, .footer a:hover, .signin_wrap span.emailinfo a:hover, .header .header-inner .nav ul li a:hover, .one_four_page:hover h4, .postmeta a:hover{
					 color:<?php echo esc_attr(get_theme_mod('color_scheme','#d92d66') ); ?>;}
					
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover, .social-icons a:hover, .nivo-controlNav a.active, .nivo-directionNav a:hover,				 .news a.read-more:hover, .slide_info a.sldbutton, .social-icons a:hover, .signin_wrap span.phno, .one_four_page_content, .date-news, h3.widget-title
					{ background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#d92d66')); ?>;}
					
					h2.section_title span{border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#d92d66')); ?>;}
					
					.MoreLink:hover, .threebox:hover .chooseus-image
					{ border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#d92d66')); ?>;}
					
			</style>
<?php      
}
         
add_action('wp_head','skt_towing_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_towing_customize_preview_js() {
	wp_enqueue_script( 'skt_towing_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_towing_customize_preview_js' );


function skt_towing_custom_customize_enqueue() {
	wp_enqueue_script( 'skt-towing-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'skt_towing_custom_customize_enqueue' );