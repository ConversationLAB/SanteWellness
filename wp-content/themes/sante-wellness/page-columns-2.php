<?php 
/*
 * Template Name: 2 Column Layout
 * Description: 1 Main column and a sidebar
 */
get_header(); ?>

<?php
while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/page/content', 'page' );

endwhile; // End of the loop.
?>
<?php get_footer(); ?>
 