<?php
/**
 * The template for displaying archive pages
 */

get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<header class="page-header">
	<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
	?>
	</header>
	<?php endif; ?>


	<?php
	if ( have_posts() ) : ?>
		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();
	/*
	* Include the Post-Format-specific template for the content.
	* If you want to override this in a child theme, then include a file
	* called content-___.php (where ___ is the Post Format name) and that will be used instead.
	*/
		get_template_part( 'template-parts/post/content', 'excerpt' );
		endwhile;

		sesha_page_navi();

	else :
		get_template_part( 'template-parts/post/content', 'none' );
	endif; ?>

<?php get_footer(); ?>