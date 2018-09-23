<?php
/**
 * Plugin Name: Gutenberg for Portfolio Post Type
 * Plugin URI:  https://github.com/wpfangirl
 * Description: Adds Gutenberg support and a block template to Devin Price's Portfolio Post Type plugin
 * Version:     0.2
 * Author:      Sallie Goetsch
 * Author URI:  https://www.wpfangirl.com/
 * Text Domain: gutenberg-ppt
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Check to see whether Gutenberg is active
function bbp_is_gutenberg_active() {
	if ( in_array( 'gutenberg/gutenberg.php', (array) get_option( 'active_plugins' ) ) ||
		( is_multisite() && array_key_exists( 'gutenberg/gutenberg.php', (array) get_site_option( 'active_sitewide_plugins' ) ) ) ) {

		return true;
	}

	return false;
}

if( !bbp_is_gutenberg_active() ) {
	echo '<p>This plugin requires Gutenberg to be active.</p>';
	exit;
}

add_action( 'init', 'bbp_add_portfolio_gutenberg_support', 30 );
function bbp_add_portfolio_gutenberg_support(){
	if ( class_exists('Portfolio_Post_Type') ) {
		bbp_add_portfolio_template();
		add_portfolio_cat_to_api();
		add_portfolio_tag_to_api();
	}
}

// Add REST API support and block template
function bbp_add_portfolio_template() {
    $post_type_object = get_post_type_object( 'portfolio' );
    $post_type_object->show_in_rest = true;
    $post_type_object->rest_base = 'portfolio';
    $post_type_object->template = array(
		array( 'core/heading', array(
			'placeholder' => 'Executive Summary',
			'level' => '2',
			) 
		),
		array( 'core/paragraph', array(
			'placeholder' => 'Put the problem and the results you got into about 160 characters, with keywords. Then you can use it for your meta description.',
			'customFontSize' => '24',
			) 
		),
		array( 'core/columns', 
			array(
				'align' => 'wide',
				'columns' => '2',
			), 
		array(
			array( 'core/column', array(), array(
				array( 'core/image', array() ),
			) ),
			array( 'core/column', array(), array(
				array( 'core/heading', array(
					'placeholder'=> 'Client Company Name',
					'level'	=> '3',
				) ),
				array( 'core/paragraph', array(
					'placeholder' => 'Describe your client: industry, company size, who their customer is, what they do.',
				) ),
			) ),
		) ),
		array('core/quote', array(
		) ),
		array( 'core/heading', array(
			'placeholder' => 'The Challenge',
			'level' => '2',
		) ),
		array( 'core/paragraph', array(
			'placeholder' => 'Why did your client need your services?',
		) ),
		array( 'core/image', array(
			'align' => 'wide',
		) ),
		array( 'core/heading', array(
			'placeholder' => 'Your Solution',
			'level' => '2',
		) ),
		array( 'core/paragraph', array(
			'placeholder' => 'Write two or three short paragraphs describing what you did to solve the problem.',
		) ),
		array( 'core/image', array(
			'align' => 'wide',
		) ),
		array( 'core/heading', array(
			'placeholder' => 'Results and ROI',
			'level' => '2',
		) ),
		array( 'core/paragraph', array(
			'placeholder' => 'You need a keyword-rich sound bite with numbers in it, e.g. tripled revenue or cut production time in half.',
			'customFontSize' => '20',
			'customTextColor' => '#FF6900',

		) ),
		array( 'core/paragraph', array(
			'placeholder' => 'Provide more detail about how happy the client is and why. You could put another quote here instead.',
		) ),
		array( 'core/image', array(
			'align' => 'wide',
		) ),
		array( 'core/paragraph', array(
			'placeholder' => 'Write your call to action here. Give it a large font size and a color background.',
			'customFontSize' => '28',
			'customTextColor' => '#ffffff',
			'customBackgroundColor' => '#313131',
		) ),
		array( 'core/button', array(
			'customBackgroundColor' => '#CF2E2E',
			'customTextColor' => '#ffffff',
			'align' => 'center',
		) ),
	);
}

// Add REST API support for portfolio categories
function add_portfolio_cat_to_api() { 
	$mytax = get_taxonomy( 'portfolio_category' ); 
	$mytax->show_in_rest = true; 
}

// Add REST API support for portfolio tags
function add_portfolio_tag_to_api() { 
	$mytax = get_taxonomy( 'portfolio_tag' ); 
	$mytax->show_in_rest = true; 
} 
