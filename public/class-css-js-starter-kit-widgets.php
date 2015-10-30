<?php
/**
 * The file that defines the widgets
 *
 * 
 *
 * @link       adesignr.com
 * @since      1.0.0
 *
 * @package    Css_Js_Starter_Kit
 * @subpackage Css_Js_Starter_Kit/public
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Css_Js_Starter_Kit
 * @subpackage Css_Js_Starter_Kit/public
 * @author     Alex <alex@adesignr.com>
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');
	
//Mailchimp Widget
 
class Css_Js_Starter_Kit_Mailchimp_Widget extends WP_Widget {

	/**
	 * Initialize the class and set its properties.
	 *
	 */
	public function __construct() {
	
		parent::__construct(
			'Css_Js_Starter_Kit_Mailchimp_Widget',
			__( 'CJSK Mailchimp Widget', 'text_domain' ),
			array(
				'classname'   => 'Css_Js_Starter_Kit_Mailchimp_Widget',
				'description' => __( 'Create the Mailchimp Widget.', 'text_domain' )
			)
		);

	}
	
	/**
	 * Widget Output
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance) {
		?>
		<h4 class="widgettitle">Newsletter</h4>
		<p>Jetzt abonnieren und auf dem neuesten Stand bleiben</p>
		<form id="cjsk_mailchimp_widget">
			<input id="mailchimp_email" name="mailchimp_email" type="email" placeholder="E-Mail Adresse"/>
			<button>abonnieren</button>
			<input id="mailchimp_lists" type="hidden" value=""/>
		</form>		
		<?php
	}
	
	/**
	 * Widget Backend
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */ 
	public function form ( $instance ) {
		$mailchimp_api_key = esc_attr( $instance['mailchimp_api_key'] );
		$mailchimp_refresh_list = esc_attr( $instance['mailchimp_refresh_list'] );
		$mailchimp_lists = esc_attr( $instance['mailchimp_lists'] );
		?>
		<!--<form id="mailchimp_refresh">-->
		<p>
			<label for="<?php echo $this->get_field_id('mailchimp_api_key'); ?>"><?php _e('API Key:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('mailchimp_api_key'); ?>" name="<?php echo $this->get_field_name('mailchimp_api_key'); ?>" type="text" value="<?php echo $mailchimp_api_key; ?>" />
		</p>
		<p>
			<?php _e('Refresh Lists: '); ?>
			<button id="<?php echo $this->get_field_id('mailchimp_refresh_list'); ?>" class="button" name="<?php echo $this->get_field_name('mailchimp_refresh_list'); ?>"><?php _e('Refresh') ?></button>
		</p><!--</form>-->
		<p>
			<label for="<?php echo $this->get_field_id('mailchimp_lists'); ?>"><?php _e('Choose List:'); ?></label> 
			<select id="<?php echo $this->get_field_id('mailchimp_lists'); ?>" class="widefat" name="<?php echo $this->get_field_name( 'mailchimp_lists' ); ?>">
			</select>
		</p>
     
    <?php 
		 
	}
	
	
	/**
	 * Widget Updater
	 *
	 * @since    1.7.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['mailchimp_api_key'] = ( ! empty( $new_instance['mailchimp_api_key'] ) ) ? strip_tags( $new_instance['mailchimp_api_key'] ) : '';
		$instance['mailchimp_refresh_list'] = ( ! empty( $new_instance['mailchimp_refresh_list'] ) ) ? strip_tags( $new_instance['mailchimp_refresh_list'] ) : '';
		$instance['mailchimp_lists'] = ( ! empty( $new_instance['mailchimp_lists'] ) ) ? strip_tags( $new_instance['mailchimp_lists'] ) : '';
		
		return $instance;
	}
	  
}

//Register Mailchimp Widget
add_action( 'widgets_init', function(){
     register_widget( 'Css_Js_Starter_Kit_Mailchimp_Widget' );
});	
/**
	 * Our Ajax Request
	 * First: The Script
	 
	 

	function mailchimp_widget_fetch_list() { ?>
		<script type="text/javascript" >
			jQuery(document).ready(function($) {
				jQuery('form#mailchimp_refresh').submit(function(e){
					alert(jQuery('#widget-css_js_starter_kit_mailchimp_widget-4-mailchimp_api_key').value());
					e.preventDefault();
					jQuery(this).ajaxSubmit({
						success	: function(){
							alert("Lists refreshed");
						},
						url		: ajaxVars.ajaxurl,
						data	: {ajax_nonce : ajaxVars.ajax_nonce, action : 'mailchimp_fetch_lists'},
						type	: 'POST',
						timeout	: 50000,
					});
				});
			});
		</script> <?php
	}
	add_action( 'admin_footer', 'mailchimp_widget_fetch_list' ); // Write our JS below here
	*/
	/**
	 * Second: The Request
	 
	 
	add_action('wp_ajax_mailchimp_fetch_lists', 'mailchimp_fetch_lists');
	
	function mailchimp_fetch_lists() {
		check_ajax_referer('Mailchimp', 'ajax_nonce');
		$_POST = array_map('stripslashes_deep', $_POST);
		
		$apikey = $_POST['widget-css_js_starter_kit_mailchimp_widget[4][mailchimp_api_key]'];
		list(, $datacentre) = explode('-', $apikey);
		$apiurl = 'https://<dc>.api.mailchimp.com/3.0/lists';
		$apiurl = str_replace('<dc>', $datacentre, $apikey);
		
		$data = array(
			'apikey'	=> $apikey
		);
		
		$payload = json_encode($data);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $apiurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
		
		$result = curl_exec($ch);
		curl_close ($ch);
		$data = json_decode($result);
		
		return $data;
		
		die();
	}*/

//Mailchimp Widget End