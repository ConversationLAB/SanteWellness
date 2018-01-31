<?php 
/*
 * Template Name: Tabbed Content
 * Description: A page template with tabs
 */

get_header(); ?>
<?php
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/page/content', 'page' );
endwhile;
?>
<?php get_footer(); ?>