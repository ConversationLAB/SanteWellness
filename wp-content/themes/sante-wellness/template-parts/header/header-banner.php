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

<?php get_template_part('template-parts/banner/banner', 'slideshow');  ?>

<main id="site-content" class="site-content / has-menu-animation clearfix" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
	<div class="container">
	