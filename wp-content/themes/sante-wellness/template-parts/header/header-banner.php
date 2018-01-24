<header id="site-header" class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container">

		<?php get_template_part('template-parts/header/site', 'branding');  ?>

		<button class="navbar-toggle / js-toggle-offcanvas-menu">
			<i class="toggle-menu-icon fa fa-bars" aria-hidden="true"></i>
			<i class="toggle-menu-icon fa fa-times" aria-hidden="true"></i>
		</button>
	
		<?php get_template_part('template-parts/navigation/navigation', 'top');  ?>

	</div>

</header>

<div class="jumbotron has-menu-animation" style="background-image: url('<?php header_image(); ?>')">
	<div class="container" >
		<h1><?php bloginfo( 'name' ) ?></h1>
		<p><?php bloginfo( 'description' ) ?></p>
	</div>
</div>

<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
<div class="container has-menu-animation">
	<div class="row">
		<main id="site-content" class="site-content / clearfix col" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
<?php else : ?>

<main id="site-content" class="site-content / has-menu-animation clearfix" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
	<div class="container">
<?php endif; ?>