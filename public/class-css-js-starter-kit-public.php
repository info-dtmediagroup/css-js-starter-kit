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
             $background_color_css  = ".logo_container{ background:".$this->css_js_starter_options['header_background_color'].";} #et-top-navigation{ background:".$this->css_js_starter_options['header_background_color'].";}";
             return $background_color_css;
         }
    }
	
	public function css_js_starter_header_background_color_css(){
         if( $this->css_js_starter_header_background_color() != null && !wp_is_mobile() ){
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
        if(!empty($this->css_js_starter_options['remove_emoji'])){
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
	
		
	// Make Slider Fullscreen
	
	    public function css_js_starter_fullscreen_slider() {
        if(!empty($this->css_js_starter_options['fullscreen_slider']) && !wp_is_mobile() ){
				wp_enqueue_script( 'fullscreen_slider', plugin_dir_url( __FILE__ ) . 'js/fullscreen_slider.js', array(), null, true);
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
	public function css_js_starter_remove_css_js_ver() {
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
        if(!empty($this->css_js_starter_options['mobile_menu']) ){
				wp_enqueue_script('mobilemenutouch', plugin_dir_url( __FILE__ ) . 'js/hammer.js', array(), null, true);
				wp_enqueue_style('mobilemenucss', plugin_dir_url( __FILE__ ) . 'css/mobile_menu.css', array(), null );
				wp_enqueue_script('mobilemenujs', plugin_dir_url( __FILE__ ) . 'js/mobile_menu.js', array(), null, true);
        }
    }
	
	//Stupid Dropdown Fix
	public function css_js_starter_dropdown_fix() {
		if(!empty($this->css_js_starter_options['mobile_menu']) ){
				wp_enqueue_script('mobilemenudropdown', plugin_dir_url( __FILE__ ) . 'js/dropdown_fix.js', array(), null, true);
        }
	}
	
	//Remove the fucking 300ms Tap delay
	public function css_js_starter_fastclick() {
		wp_enqueue_script('fastclickjs', plugin_dir_url( __FILE__ ) . 'js/fastclick.js', array(), null, true);
	}
	
	//Add SVG Support
	public function css_js_starter_svg_support() {
		$svg_mime = array(
			// Image formats.
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif' => 'image/gif',
			'png' => 'image/png',
			'bmp' => 'image/bmp',
			'tiff|tif' => 'image/tiff',
			'ico' => 'image/x-icon',
			'svg' => 'image/svg+xml',
			// Video formats.
			'asf|asx' => 'video/x-ms-asf',
			'wmv' => 'video/x-ms-wmv',
			'wmx' => 'video/x-ms-wmx',
			'wm' => 'video/x-ms-wm',
			'avi' => 'video/avi',
			'divx' => 'video/divx',
			'flv' => 'video/x-flv',
			'mov|qt' => 'video/quicktime',
			'mpeg|mpg|mpe' => 'video/mpeg',
			'mp4|m4v' => 'video/mp4',
			'ogv' => 'video/ogg',
			'webm' => 'video/webm',
			'mkv' => 'video/x-matroska',
			'3gp|3gpp' => 'video/3gpp', // Can also be audio
			'3g2|3gp2' => 'video/3gpp2', // Can also be audio
			// Text formats.
			'txt|asc|c|cc|h|srt' => 'text/plain',
			'csv' => 'text/csv',
			'tsv' => 'text/tab-separated-values',
			'ics' => 'text/calendar',
			'rtx' => 'text/richtext',
			'css' => 'text/css',
			'htm|html' => 'text/html',
			'vtt' => 'text/vtt',
			'dfxp' => 'application/ttaf+xml',
			// Audio formats.
			'mp3|m4a|m4b' => 'audio/mpeg',
			'ra|ram' => 'audio/x-realaudio',
			'wav' => 'audio/wav',
			'ogg|oga' => 'audio/ogg',
			'mid|midi' => 'audio/midi',
			'wma' => 'audio/x-ms-wma',
			'wax' => 'audio/x-ms-wax',
			'mka' => 'audio/x-matroska',
			// Misc application formats.
			'rtf' => 'application/rtf',
			'js' => 'application/javascript',
			'pdf' => 'application/pdf',
			'swf' => 'application/x-shockwave-flash',
			'class' => 'application/java',
			'tar' => 'application/x-tar',
			'zip' => 'application/zip',
			'gz|gzip' => 'application/x-gzip',
			'rar' => 'application/rar',
			'7z' => 'application/x-7z-compressed',
			'exe' => 'application/x-msdownload',
			'psd' => 'application/octet-stream',
			'xcf' => 'application/octet-stream',
			// MS Office formats.
			'doc' => 'application/msword',
			'pot|pps|ppt' => 'application/vnd.ms-powerpoint',
			'wri' => 'application/vnd.ms-write',
			'xla|xls|xlt|xlw' => 'application/vnd.ms-excel',
			'mdb' => 'application/vnd.ms-access',
			'mpp' => 'application/vnd.ms-project',
			'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'docm' => 'application/vnd.ms-word.document.macroEnabled.12',
			'dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
			'dotm' => 'application/vnd.ms-word.template.macroEnabled.12',
			'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'xlsm' => 'application/vnd.ms-excel.sheet.macroEnabled.12',
			'xlsb' => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
			'xltx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
			'xltm' => 'application/vnd.ms-excel.template.macroEnabled.12',
			'xlam' => 'application/vnd.ms-excel.addin.macroEnabled.12',
			'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
			'pptm' => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
			'ppsx' => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
			'ppsm' => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
			'potx' => 'application/vnd.openxmlformats-officedocument.presentationml.template',
			'potm' => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
			'ppam' => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
			'sldx' => 'application/vnd.openxmlformats-officedocument.presentationml.slide',
			'sldm' => 'application/vnd.ms-powerpoint.slide.macroEnabled.12',
			'onetoc|onetoc2|onetmp|onepkg' => 'application/onenote',
			'oxps' => 'application/oxps',
			'xps' => 'application/vnd.ms-xpsdocument',
			// OpenOffice formats.
			'odt' => 'application/vnd.oasis.opendocument.text',
			'odp' => 'application/vnd.oasis.opendocument.presentation',
			'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
			'odg' => 'application/vnd.oasis.opendocument.graphics',
			'odc' => 'application/vnd.oasis.opendocument.chart',
			'odb' => 'application/vnd.oasis.opendocument.database',
			'odf' => 'application/vnd.oasis.opendocument.formula',
			// WordPerfect formats.
			'wp|wpd' => 'application/wordperfect',
			// iWork formats.
			'key' => 'application/vnd.apple.keynote',
			'numbers' => 'application/vnd.apple.numbers',
			'pages' => 'application/vnd.apple.pages',
			);
		return $svg_mime;
	}
	
	//Fix Fullwidth Images
	public function css_js_starter_fwimage() {
		wp_enqueue_script('fwimages', plugin_dir_url( __FILE__ ) . 'js/fw-images.js', array(), null, true);
	}
}
