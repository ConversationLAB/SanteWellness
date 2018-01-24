<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-single__item baseline-md relative'); ?>>


	<div class="row">
	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<figure class="post__thumbnail / col">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'sesha-featured-image' ); ?>
			</a>
		</figure>
	<?php endif; ?>

		<div class="post-single__content / col">
			<header class="post-single__header baseline-xs">
				<?php
					if ( is_single() ) {
						the_title( '<h1 class="post-single__title">', '</h1>' );
					} else {
						the_title( '<h2 class="post-single__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}

					if ( 'post' === get_post_type() ) :
						echo '<div class="post-single__meta">';
							if ( is_single() ) :
								sesha_posted_on();
							else :
								echo sesha_time_link();
							endif;
							sesha_edit_link();
						echo '</div>';
					endif;
				?>
			</header><!-- .post-single__header -->

		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="sr-only"> "%s"</span>', 'sesha' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'sesha' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		?>
		</div>
	</div>


</article>
