<?php
/**
 * The header for the theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package next
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$site_name = get_bloginfo( 'name' );
$tagline = get_bloginfo( 'description', 'display' );
?>
<header class="site-header" role="banner">

	<div class="site-branding">
		<?php if ( has_custom_logo() ) {
			the_custom_logo();
		} elseif ( $site_name ) { ?>
            <h1 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'next' ); ?>" rel="home">
                    <?php echo $site_name; ?>
                </a>
            </h1>
            <p class="site-description">
                <?php if ( $tagline ) {
					echo $tagline;
                } ?>
            </p>
		<?php } ?>
	</div>

	<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
	<nav class="site-navigation" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
	</nav>
	<?php endif; ?>
</header>
