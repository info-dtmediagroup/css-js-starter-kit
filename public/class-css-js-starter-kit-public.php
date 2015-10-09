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
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Css_Js_Starter_Kit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Css_Js_Starter_Kit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/css-js-starter-kit-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Css_Js_Starter_Kit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Css_Js_Starter_Kit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/css-js-starter-kit-public.js', array( 'jquery' ), $this->version, false );

	}
	



    /**
     * Cleanup functions depending on each checkbox returned value in admin
     *
     * @since    1.0.0
     */
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


    // Add Wow.js
    public function css_js_starter_wow_js() {
        if(!empty($this->css_js_starter_options['wow_js'])){
				wp_enqueue_script( 'wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), null, true);
				wp_enqueue_script( 'wow-init', plugin_dir_url( __FILE__ ) . 'public/js/wow-init.js', array(), null, true);
    
		}
    }
    
    // Load jQuery from CDN if available
    public function css_js_starter_cdn_jquery(){
        if(!empty($this->css_js_starter_options['jquery_cdn'])){
            if(!is_admin()){
                            if(!empty($this->css_js_starter_options['cdn_provider'])){
                                $link = $this->css_js_starter_options['cdn_provider'];
                            }else{
                                $link = 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js';
                            }
                            $try_url = @fopen($link,'r');
                            if( $try_url !== false ) {
                                wp_deregister_script( 'jquery' );
                                wp_register_script('jquery', $link, array(), null, false);
                            }
            }
        }
    }





}
