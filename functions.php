<?php
/**
 * Next functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package next
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! isset( $content_width ) ) {
	$content_width = 800; // pixels
}

/*
 * Set up theme support
 */
if ( ! function_exists( 'next_elementor_setup' ) ) {
	function next_elementor_setup() {
		$hook_result = apply_filters_deprecated( 'elementor_next_theme_load_textdomain', [ true ], '2.0', 'next_elementor_load_textdomain' );
		if ( apply_filters( 'next_elementor_load_textdomain', $hook_result ) ) {
			load_theme_textdomain( 'next', get_template_directory() . '/languages' );
		}

		$hook_result = apply_filters_deprecated( 'elementor_next_theme_register_menus', [ true ], '2.0', 'next_elementor_register_menus' );
		if ( apply_filters( 'next_elementor_register_menus', $hook_result ) ) {
			register_nav_menus( array( 'menu-1' => __( 'Primary', 'next' ) ) );
		}

		$hook_result = apply_filters_deprecated( 'elementor_next_theme_add_theme_support', [ true ], '2.0', 'next_elementor_add_theme_support' );
		if ( apply_filters( 'next_elementor_add_theme_support', $hook_result ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );
			add_theme_support( 'custom-logo', array(
				'height' => 100,
				'width' => 350,
				'flex-height' => true,
				'flex-width' => true,
			) );

			/*
			 * Editor Style
			 */
			add_editor_style( 'editor-style.css' );

			/*
			 * WooCommerce
			 */
			$hook_result = apply_filters_deprecated( 'elementor_next_theme_add_woocommerce_support', [ true ], '2.0', 'next_elementor_add_woocommerce_support' );
			if ( apply_filters( 'next_elementor_add_woocommerce_support', $hook_result ) ) {

				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0):
				// zoom:
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox:
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe:
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'next_elementor_setup' );

/*
 * Theme Scripts & Styles
 */
if ( ! function_exists( 'next_elementor_scripts_styles' ) ) {
		function next_elementor_scripts_styles() {
			wp_enqueue_style( 'next-style', get_stylesheet_uri() );
	}
}
add_action( 'wp_enqueue_scripts', 'next_elementor_scripts_styles' );

/*
 * Register Elementor Locations
 */
if ( ! function_exists( 'next_elementor_register_elementor_locations' ) ) {
	function next_elementor_register_elementor_locations( $elementor_theme_manager ) {
		$hook_result = apply_filters_deprecated( 'elementor_next_theme_register_elementor_locations', [ true ], '2.0', 'next_elementor_register_elementor_locations' );
		if ( apply_filters( 'next_elementor_register_elementor_locations', $hook_result ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'next_elementor_register_elementor_locations' );

/*
 * Set default content width
 */
if ( ! function_exists( 'next_elementor_content_width' ) ) {
	function next_elementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'next_elementor_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'next_elementor_content_width', 0 );


function next_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'praxis' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'praxis' ),
		'before_widget' => '<section id="%1$s" class="widget widget_categories %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'next_widgets_init' );
