<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy

 */

get_header(); ?>

<h1 class="sr-only">
	<?php echo get_bloginfo('name') ?>
</h1>


<?php // Show the selected frontpage content.
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/page/content', 'front-page' );
	endwhile;
endif; ?>

<?php get_footer(); ?>