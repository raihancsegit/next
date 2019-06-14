<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package next
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

$is_next_exist = function_exists( 'next_do_location' );

if ( is_singular() ) {
	if ( ! $is_next_exist || ! next_do_location( 'single' ) ) {
		get_template_part( 'template-parts/single' );
	}
} elseif ( is_archive() || is_home() ) {
	if ( ! $is_next_exist || ! next_do_location( 'archive' ) ) {
		get_template_part( 'template-parts/archive' );
	}
} elseif ( is_search() ) {
	if ( ! $is_next_exist || ! next_do_location( 'archive' ) ) {
		get_template_part( 'template-parts/search' );
	}
} else {
	if ( ! $is_next_exist || ! next_do_location( 'single' ) ) {
		get_template_part( 'template-parts/404' );
	}
}

get_footer();
