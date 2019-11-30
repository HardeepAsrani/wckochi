<?php

/**
 * Plugin Name: Gutenberg Example - WordCamp Kochi
 * Plugin URI: https://github.com/HardeepAsrani/wckochi
 * Description: This is a plugin demonstrating how to register new blocks for the Gutenberg editor.
 * Version: 1.0.0
 * Author: Hardeep Asrani
 *
 * @package wckochi
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load all translations for our plugin from the MO file.
*/
add_action( 'init', 'wckochi_gutenberg_load_textdomain' );

function wckochi_gutenberg_load_textdomain() {
	load_plugin_textdomain( 'wckochi', false, basename( __DIR__ ) . '/languages' );
}

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * Passes translations to JavaScript.
 */
function wckochi_gutenberg_register_block() {

	// automatically load dependencies and version
	$asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

	wp_register_script(
		'wckochi-gutenberg',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version']
	);

	wp_register_style(
		'wckochi-gutenberg-editor',
		plugins_url( 'editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
	);

	wp_register_style(
		'wckochi-gutenberg',
		plugins_url( 'style.css', __FILE__ ),
		array( ),
		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
	);

	register_block_type( 'wckochi/wckochi-gutenberg', array(
		'style' => 'wckochi-gutenberg',
		'editor_style' => 'wckochi-gutenberg-editor',
		'editor_script' => 'wckochi-gutenberg',
	) );

  if ( function_exists( 'wp_set_script_translations' ) ) {
    /**
     * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
     * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
     * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
     */
    wp_set_script_translations( 'wckochi-gutenberg', 'wckochi' );
  }

}
add_action( 'init', 'wckochi_gutenberg_register_block' );
