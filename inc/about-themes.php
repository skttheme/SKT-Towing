<?php
/**
 * SKT Towing About Theme
 *
 * @package SKT Towing
 */
 
//about theme info
add_action( 'admin_menu', 'skt_towing_abouttheme' );
function skt_towing_abouttheme() {    	
	add_theme_page( __('About Theme', 'skt-towing'), __('About Theme', 'skt-towing'), 'edit_theme_options', 'skt_towing_guide', 'skt_towing_mostrar_guide');   
} 

//guidline for about theme
function skt_towing_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_attr_e('About Theme Info', 'skt-towing'); ?>
		   </div>
          <p><?php esc_html_e('SKT Towing is an automotive, repair, service industry, call to action and lead generating business, corporate or professional website related WordPress theme which can be used for multipurposes. Can be used for blogging, personal and any other kind of portfolio and photography and eCommerce websites as well. Compatible with WooCommerce, Nextgen Gallery and Contact Form 7 among other plugins. Simple, flexible and Easy to use.','skt-towing'); ?></p>
		  <a href="<?php echo SKT_PRO_THEME_URL; ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo SKT_LIVE_DEMO; ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-towing'); ?></a> | 
				<a href="<?php echo SKT_PRO_THEME_URL; ?>"><?php esc_html_e('Buy Pro', 'skt-towing'); ?></a> | 
				<a href="<?php echo SKT_THEME_DOC; ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-towing'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo SKT_THEME_URL; ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>