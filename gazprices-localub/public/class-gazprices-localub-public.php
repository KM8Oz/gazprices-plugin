<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://kmoz.dev
 * @since      1.0.0
 *
 * @package    Gazprices_localub
 * @subpackage Gazprices_localub/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Gazprices_localub
 * @subpackage Gazprices_localub/public
 * @author     Your Name <email@example.com>
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/gazprices-localub-public-display.php';

class Gazprices_localub_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Gazprices_localub    The ID of this plugin.
	 */
	private $Gazprices_localub;

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
	 * @param      string    $Gazprices_localub       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Gazprices_localub, $version ) {

		$this->Gazprices_localub = $Gazprices_localub;
		$this->version = $version;

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
		 * defined in Gazprices_localub_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gazprices_localub_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Gazprices_localub, plugin_dir_url( __FILE__ ) . 'css/gazprices-localub-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gazprices_localub_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gazprices_localub_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( "react", plugin_dir_url( __FILE__ ) . 'js/react.min.js', array(), $this->version, false );
		wp_enqueue_script( "react-dom", plugin_dir_url( __FILE__ ) . 'js/react-dom.min.js', array(), $this->version, false );
		wp_enqueue_script( "gazprices-umd", plugin_dir_url( __FILE__ ) . 'js/gazprices-umd.min.js', array(), $this->version, false );
		wp_enqueue_script( $this->Gazprices_localub, plugin_dir_url( __FILE__ ) . 'js/gazprices-localub-public.js', array("react", "react-dom", "gazprices-umd", 'jquery'), $this->version, false );
	}

}
