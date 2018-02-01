<?php 
/*
 * Template Name: Landing Page
 * Description: Home page and landing page template. Uses front-page.php
 */
get_header(); ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/page/content', 'front-page' );
	endwhile;
endif; ?>

<?php get_footer(); ?>