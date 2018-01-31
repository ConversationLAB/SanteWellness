<?php $page_links = get_field('page_link'); ?>
<?php if ( $page_links ): ?>
	<div class="pagelink__wrapper">
		<?php foreach ( $page_links as $post ) : setup_postdata( $post ); ?>

			<a class="pagelink__link" href="<?php the_permalink(); ?>">
				<span class="pagelink__title text-uppercase j3 baseline-none">
					<?php the_title(); ?>
				</span>

				<span class="pagelink__thumbnail">
					<?php the_post_thumbnail(); ?>
				</span>
			</a>

		<?php endforeach; wp_reset_postdata(); ?>
	</div>
<?php endif; ?>
