<?php
/**
 * The template for displaying all single posts
 *
 */
get_header();
?>

<?php
while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/post/content', get_post_format() );

	the_post_navigation( array(
		'prev_text' => '<span class="sr-only">' . __( 'Previous Post', 'sesha' ) . '</span>   <span class="nav-title"><i class="fa fa-chevron-left" aria-hidden="true"></i> %title</span>',
		'next_text' => '<span class="sr-only">' . __( 'Next Post', 'sesha' ) . '</span>       <span class="nav-title">%title <i class="fa fa-chevron-right" aria-hidden="true"></i></span>',
	) );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;


endwhile; 
?>

<?php get_footer(); ?>
