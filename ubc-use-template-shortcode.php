<?php

namespace UBC\Shortcode;

/**
 *
 * @wordpress-plugin
 * Plugin Name:       UBC Use Template Shortcode
 * Plugin URI:        http://ctlt.ubc.ca/
 * Description:       A shortcode to allow you to use a PHP template to output content
 * Version:           1.0.1
 * Author:            Richard Tape
 * Author URI:        http://blogs.ubc.ca/mbcx9rvt
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Use_Template {

	/**
	 * The version of this plugin
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var (string) $version The version of this plugin
	 */

	protected static $version = '1.0.0';


	/**
	 * The text domain for this plugin
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var (string) $text_domain The text domain for this plugin
	 */

	protected static $text_domain = 'ubc-use-template-shortcode';


	/**
	 * Instance of this class
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var (object) $instance
	 */

	protected static $instance;


	/**
	 * The path to this file
	 *
	 * @since 1.0.0
	 * @access public
	 * @var string $plugin_path
	 */

	public static $plugin_path = '';

	/**
	 * The url to this file
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var (string) $plugin_url
	 */

	public static $plugin_url = '';

	/**
	 * Initialize ourselves - adds actions/filters
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function init() {

		// Set the plugin path as where this file resides
		self::$plugin_path = trailingslashit( dirname( __FILE__ ) );

		// And the URL
		self::$plugin_url = trailingslashit( plugins_url( '', __FILE__ ) );

		// Set up our filters
		$this->add_filters();

		// Set up our actions
		$this->add_actions();

	}/* init() */



	/**
	 * Abstracted method to add actions
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function add_actions() {

		// Register the shortcode
		add_action( 'init', array( $this, 'init__add_shortcode' ) );

	}/* add_actions() */



	/**
	 * Add our filters
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function add_filters() {

		// Ensure we can have custom data and style tags
		add_filter( 'wp_kses_allowed_html', array( $this, 'wp_kses_allowed_html__add_data_attributes' ), 10, 2 );

		// Ensure we can have style display: none;
		add_filter( 'safe_style_css', array( $this, 'safe_style_css__allow_display_none' ) );

	}/* add_filters() */



	/**
	 * Add data-attributes to wp_kses_post
	 *
	 * @since 1.0.0
	 *
	 * @param (array) $allowed - What tags are allowed
	 * @param (string) $context - Where are we using wp_kses
	 * @return (array) Modified tags
	 */

	public function wp_kses_allowed_html__add_data_attributes( $allowed, $context ) {

		if ( is_array( $context ) ) {
			return $allowed;
		}

		if ( 'post' !== $context ) {
	    	return $allowed;
		}

		$allowed['a']['data-toggle'] = true;
		$allowed['a']['data-parent'] = true;
		$allowed['a']['style'] = true;

		$allowed['button']['data-dismiss'] = true;

		$allowed['div']['data-category'] = true;
		$allowed['div']['style'] = true;

		return $allowed;

	}/* wp_kses_allowed_html__add_data_attributes() */


	/**
	 * By default WordPress does not allow display: none; in style attributes
	 *
	 * @since 1.0.0
	 *
	 * @param (array) $safe_tags - Predetermined safe tags
	 * @return (array) $safe_tags - modified safe tags with display: none allowed
	 */

	public function safe_style_css__allow_display_none( $safe_tags ) {

		$safe_tags[] = 'display';

		return $safe_tags;

	}/* safe_style_css__allow_display_none() */


	/**
	 * Register the ubc_template shortcode
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function init__add_shortcode() {

		add_shortcode( 'ubc_template', array( $this, 'add_shortcode__ubc_template' ) );

	}/* init__add_shortcode() */



	/**
	 * Logic for the ubc_template shortcode. Looks for a specific template file
	 * that is requested in the shortcode atts, if it exists, fetches it.
	 *
	 * @since 1.0.0
	 *
	 * @param (array) $attr - Attributes passed to the shortcode
	 * @return (string) markup for this shortcode
	 */

	public function add_shortcode__ubc_template( $attr ) {

		$attr = shortcode_atts( array( 'department' => '', 'template' => '' ), $attr, 'ubc_template' );

		// Need both, bail early if not set
		if ( empty( $attr['department'] ) || empty( $attr['template'] ) ) {
			return __( 'ubc_template shortcode requires both a department and template', $this->get_text_domain() );
		}

		$department = sanitize_title_with_dashes( $attr['department'] );
		$template 	= sanitize_title_with_dashes( $attr['template'] );

		$path 		= $this->generate_path( $department, $template );

		if ( ! file_exists( $path ) ) {
			return __( 'Specified template file does not exist', $this->get_text_domain() );
		}

		$data 		= apply_filters( 'ubc_use_template_data', array(), $department, $template );

		// This allows us to use odd/even counts in templates
		global $usage_id;
		$usage_id = ( ! isset( $usage_id ) ) ? 0 : $usage_id;

		// Fetch the content of this template
		$content 	= \UBC\Helpers::fetch_template_part( $path, $data );

		// Run it through a filter so we can modify outside should someone wish to add
		$content 	= apply_filters( 'ubc_use_template_content', $content, $data, $department, $template );

		do_action( 'ubc_use_template_end', $content, $data, $department, $template );

		return wp_kses_post( $content );

	}/* add_shortcode__ubc_template() */


	/**
	 * Formulate the path based on the department and template
	 *
	 * @since 1.0.0
	 *
	 * @param (string) $department - the department (dir name)
	 * @param (string) $template - the template name (file name in the dir without .php)
	 * @return (string) a full file path to include
	 */

	private function generate_path( $department = '', $template = '' ) {

		// The root URL
		$path 		= self::$plugin_path . 'templates/';

		// Form the full path and then check if that template exists
		$path 		.= trailingslashit( $department ) . $template . '.php';

		$path 		= apply_filters( 'ubc_use_template_path', $path, $department, $template );

		return $path;

	}/* generate_path() */


	/**
	 * A quick getter for the plugin version number
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return (int) The version of this plugin
	 */

	public static function get_version() {

		return static::$version;

	}/* get_version() */


	/**
	 * Quick getter for the text domain of this plugin
	 * Usage: \UBC\Press::get_text_domain()
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return (string) The text domain of this plugin
	 */

	public static function get_text_domain() {

		return static::$text_domain;

	}/* get_text_domain() */

}/* Class Use_Template */


// Let's get this party started
add_action( 'plugins_loaded', '\UBC\Shortcode\plugins_loaded__init_use_template', 2 );

/**
 * Instantiate Use_Template
 *
 * @author Richard Tape <@richardtape>
 * @since 1.0
 * @param null
 * @return null
 */

function plugins_loaded__init_use_template() {

	$Use_Template = new \UBC\Shortcode\Use_Template();
	$Use_Template->init();

}/* plugins_loaded__init_use_template() */
