<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       adesignr.com
 * @since      1.0.0
 *
 * @package    Css_Js_Starter_Kit
 * @subpackage Css_Js_Starter_Kit/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Css_Js_Starter_Kit
 * @subpackage Css_Js_Starter_Kit/public
 * @author     Alex <alex@adesignr.com>
 */
class Css_Js_Starter_Kit_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->css_js_starter_options = get_option($this->plugin_name);


	}


    /**
     * Cleanup functions depending on each checkbox returned value in admin
     *
     * @since    1.0.0
     */

    // Add animate.css
    public function css_js_starter_animate_css() {
        if(!empty($this->css_js_starter_options['animate_css'])){
				wp_enqueue_style('animatecss', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css', array(), null );
        }
    }

    // Add Font Awesome
    public function css_js_starter_fawesome_css() {
        if(!empty($this->css_js_starter_options['fawesome_css'])){
				wp_enqueue_style('fawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), null );
		}
    }
	
	// Add Floating Header
	public function css_js_starter_floating_header_css() {
        if(!empty($this->css_js_starter_options['floating_header_css']) && !wp_is_mobile() ){
				wp_enqueue_style('floatingheader', plugin_dir_url( __FILE__ ) . 'css/floating_header.css', array(), null );
		}
    }
	
	private function css_js_starter_header_background_color(){
         if(isset($this->css_js_starter_options['header_background_color']) && !empty($this->css_js_starter_options['header_background_color']) ){
             $background_color_css  = ".et_menu_container{ background:".$this->css_js_starter_options['header_background_color'].";}";
             return $background_color_css;
         }
    }
	
	public function css_js_starter_header_background_color_css(){
         if( !empty($this->css_js_starter_header_background_color() != null) && !wp_is_mobile() ){
             echo '<style>';
             if($this->css_js_starter_header_background_color() != null){
                   echo $this->css_js_starter_header_background_color();
             }
             echo '</style>';
         }
     }


    // Add Wow.js
    public function css_js_starter_wow_js() {
        if(!empty($this->css_js_starter_options['wow_js'])){
				wp_enqueue_script( 'wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), null, true);
				wp_enqueue_script( 'wow-init', plugin_dir_url( __FILE__ ) . 'js/wow-init.js', array(), null, true);
    
		}
    }
    
    // Load jQuery from CDN if available
    public function css_js_starter_cdn_jquery(){
        if(!empty($this->css_js_starter_options['jquery_cdn'])){
            if(!is_admin()){
                            if(!empty($this->css_js_starter_options['cdn_provider'])){
                                $link = $this->css_js_starter_options['cdn_provider'];
                            }else{
                                $link = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js';
                            }
                            $try_url = @fopen($link,'r');
                            if( $try_url !== false ) {
                                wp_deregister_script( 'jquery' );
                                wp_register_script('jquery', $link, array(), null, false);
                            }
            }
        }
    }
	
	//Remove Emoji
	public function css_js_starter_remove_emoji() {
        if(!empty($this->css_js_starter_options['wow_js'])){
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );	
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
			add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    
		}
    }
	
	function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}
	
	// Add Greensock
    public function css_js_starter_gsap_js() {
        if(!empty($this->css_js_starter_options['gsap_js'])){
				wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js', array(), null, true);    
		}
    }
	
	// Cleanup head
    public function css_js_starter_cleanup() {

        if($this->css_js_starter_options['cleanup']){


            remove_action( 'wp_head', 'rsd_link' );                 // RSD link
            remove_action( 'wp_head', 'feed_links_extra', 3 );            // Category feed link
            remove_action( 'wp_head', 'feed_links', 2 );                // Post and comment feed links
            remove_action( 'wp_head', 'index_rel_link' );
            remove_action( 'wp_head', 'wlwmanifest_link' );
            remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );        // Parent rel link
            remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );       // Start post rel link
            remove_action( 'wp_head', 'rel_canonical', 10, 0 );
            remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
            remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Adjacent post rel link
            remove_action( 'wp_head', 'wp_generator' );               // WP Version
            remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
            remove_action( 'wp_print_styles', 'print_emoji_styles' );


        }
    }   
    // Cleanup head
    public function css_js_starter_remove_x_pingback($headers) {
        if(!empty($this->css_js_starter_options['cleanup'])){
            unset($headers['X-Pingback']);
            return $headers;
        }
    }
	
	
	// Remove  CSS and JS query strings versions
	public function css_js_starter_remove_css_js_ver( ) {
		if(!empty($this->css_js_starter_options['css_js_versions'])){
			function css_js_starter_remove_css_js_ver_filter($src ){
				 if( strpos( $src, '?ver=' ) ) $src = remove_query_arg( 'ver', $src );
				 return $src;
			}
			add_filter( 'style_loader_src', 'css_js_starter_remove_css_js_ver_filter', 10, 2 );
			add_filter( 'script_loader_src', 'css_js_starter_remove_css_js_ver_filter', 10, 2 );
		}
	}

	// Add Mobile Menu
    public function css_js_starter_mobile_menu() {
        if(!empty($this->css_js_starter_options['mobile_menu']) && wp_is_mobile() ){
				wp_enqueue_script('mobilemenutouch', plugin_dir_url( __FILE__ ) . 'js/jquery.touchSwipe.min.js', array(), null );
				wp_enqueue_style('mobilemenucss', plugin_dir_url( __FILE__ ) . 'css/mobile_menu.css', array(), null );
				wp_enqueue_script('mobilemenujs', plugin_dir_url( __FILE__ ) . 'js/mobile_menu.js', array(), null );
        }
    }	



}
