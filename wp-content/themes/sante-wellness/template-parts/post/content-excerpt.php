<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Sesha
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-listing__item baseline-sm relative'); ?>>
	<div class="row">
		<?php if ( '' !== get_the_post_thumbnail() ) : ?>
			<figure class="post__thumbnail / col">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				</a>
			</figure>
		<?php endif; ?>

		<div class="post-listing__summary / col">
			<header class="post-listing__header baseline-xs">
				<?php the_title( sprintf( '<h2 class="post-listing__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="post-listing__meta">
						<?php
							echo sesha_time_link();
							sesha_edit_link();
						?>
					</div>
				<?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
					<div class="post-listing__meta">
						<?php sesha_edit_link(); ?>
					</div>
				<?php endif; ?>

			</header>

			<div class="post-listing__excerpt">
				<?php the_excerpt(); ?>
			</div>


		</div>

	</div>

</article>
