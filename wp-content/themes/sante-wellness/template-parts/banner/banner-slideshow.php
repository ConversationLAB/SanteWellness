<?php
if ( is_page() && $post->post_parent ) {
	$is_parent = true;
	$postID = wp_get_post_parent_id( $post_ID );
} else {
	$is_parent = false;
	$postID = get_the_ID();
}

if( have_rows('slideshow_banner', $postID) ) : ?>

<div class="slideshow__banner / js-slideshow">

	<?php while( have_rows('slideshow_banner', $postID) ): the_row(); 
		$image = get_sub_field('slideshow_image', $postID);
		
		$title = get_sub_field('slideshow_title', $postID);

		$link = get_sub_field('slideshow_link', $postID);
		$color = 'style=" color: '. get_sub_field('slideshow_text_colour', $postID) .';"';
		$position = 'data-slideshow-text-position="'. get_sub_field('slideshow_text_position', $postID) . '"';
	?>
		<?php if($link) :?>
		<a href="<?php echo $link; ?>" class="slideshow__banner-slide" style="background-image: url(<?php echo $image['url']; ?>) ">
		<?php else : ?>			    
		<div class="slideshow__banner-slide" style="background-image: url(<?php echo $image['url']; ?>) ">
		<?php endif; ?>			    

			<?php if( $title ): ?>
				<div class="container relative">				
					<header class="slideshow__banner-title-wrapper" <?php echo $position; ?>>
						<div class="slideshow__banner-title / h1 text-uppercase baseline-none" <?php echo $color; ?>>
							<?php echo $title; ?>
						</div>
					</header>
				</div>
			<?php endif; ?>			    
		
		<?php if($link) :?>
		</a>
		<?php else : ?>			    
		</div>
		<?php endif; ?>			    

	<?php endwhile; ?>
</div>
<?php endif; ?>