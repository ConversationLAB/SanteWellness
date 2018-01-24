<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
*/

?><!DOCTYPE html>
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
	<?php if ( get_option( 'setting_google_analytics' ) ) : // Google Analytics ?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_option( 'setting_google_analytics' ); ?>"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', '<?php echo get_option( 'setting_google_analytics' ); ?>');
	</script>
	<?php endif; ?>
	
	<?php get_template_part('template-parts/header/header', 'head');  ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<a class="skip-link sr-only" href="#site-content"><?php _e( 'Skip to content', 'sesha' ); ?></a>

<?php get_template_part('template-parts/header/header', 'banner');  ?>