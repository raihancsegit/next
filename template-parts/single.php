<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php while ( have_posts() ) : the_post(); ?>

<main <?php post_class( 'site-main' ); ?> role="main">

	<header class="page-header">
		<?php
		if ( apply_filters( 'hello_elementor_page_title', true ) ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
		?>
	</header>

	<div class="page-content">
		<?php the_content(); ?>
		<div class="post-tags">
			<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'next' ), null, '</span>' ); ?>
		</div>
		<?php wp_link_pages(); ?>
	</div>

	<?php comments_template(); ?>
</main>

<?php endwhile;
