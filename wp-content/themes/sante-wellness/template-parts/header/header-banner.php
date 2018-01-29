<?php 
	$book_now_url = get_permalink( get_option( 'setting_book_now_link' ) );
?>

<header id="site-header" class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container">

		<?php get_template_part('template-parts/header/site', 'branding');  ?>

		<a href="<?php echo $book_now_url; ?>" class="btn-book-now-cta btn btn-default btn-lg">
			Book Now
		</a>

		<button class="navbar-toggle / js-toggle-offcanvas-menu">
			<i class="toggle-menu-icon fa fa-bars" aria-hidden="true"></i>
			<i class="toggle-menu-icon fa fa-times" aria-hidden="true"></i>
		</button>
	
		<?php get_template_part('template-parts/navigation/navigation', 'top');  ?>

	</div>

</header>



<?php 
if( have_rows('slideshow_banner') ): ?>

	<div class="slideshow__banner / js-slideshow">

	<?php while( have_rows('slideshow_banner') ): the_row(); 
		$image = get_sub_field('slideshow_image');
		$title = get_sub_field('slideshow_title');
		$link = get_sub_field('slideshow_link');
		$color = 'style=" color: '. get_sub_field('slideshow_text_colour') .';"';
		$position = 'data-slideshow-text-position="'. get_sub_field('slideshow_text_position') . '"';
	?>

		<a href="<?php echo $link; ?>" class="slideshow__banner-slide" style="background-image: url(<?php echo $image['url']; ?>) ">

			<?php if( $title ): ?>
				<div class="container relative">
				
					<header class="slideshow__banner-title-wrapper" <?php echo $position; ?>>
						<h2 class="slideshow__banner-title / h1-light baseline-none" <?php echo $color; ?>>
							<?php echo $title; ?>
						</h2>
					</header>

				</div>
			<?php endif; ?>	
		    
		</a>

	<?php endwhile; ?>

	</div>

<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
<div class="container has-menu-animation">
	<div class="row">
		<main id="site-content" class="site-content / clearfix col" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
<?php else : ?>

<main id="site-content" class="site-content / has-menu-animation clearfix" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
	<div class="container">
<?php endif; ?>