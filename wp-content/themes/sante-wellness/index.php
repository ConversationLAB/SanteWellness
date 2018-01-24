<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.

 */

get_header(); ?>

	<header class="page-header">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	<?php else : ?>
		<h1 class="page-title"><?php _e( 'Posts', 'sesha' ); ?></h1>
	<?php endif; ?>
	</header>

	<?php
	if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) : the_post();
	/*
	* Include the Post-Format-specific template for the content.
	* If you want to override this in a child theme, then include a file
	* called content-___.php (where ___ is the Post Format name) and that will be used instead.
	*/
			get_template_part( 'template-parts/post/content', 'excerpt');
		endwhile;
		

		sesha_page_navi();
	else :
		get_template_part( 'template-parts/post/content', 'none' );
	endif;
	?>



<?php get_footer(); ?>