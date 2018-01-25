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

	<?php if( get_option( 'setting_fonts' ) ) : ?>
	<script>
	WebFont.load({
	google: {
		families: ['<?php echo get_option( 'setting_fonts' ); ?>:<?php echo get_option( 'setting_fonts_weight' ); ?>']
	}
	});
	</script>
	<?php endif; ?>
	<?php if( get_option( 'setting_fonts_headings' ) && get_option( 'setting_fonts' ) != get_option( 'setting_fonts_headings' ) ) : ?>
	<script>
	WebFont.load({
	google: {
		families: ['<?php echo get_option( 'setting_fonts_headings' ); ?>:<?php echo get_option( 'setting_fonts_weight_headings' ); ?>']
	}
	});
	</script>
	<?php endif; ?>



	<?php if( get_option( 'setting_fonts' ) ) echo '<style>'; ?>
		body {
		<?php if( get_option( 'setting_fonts' ) ) : ?>
		font-family: <?php echo get_option( 'setting_fonts' ); ?>, sans-serif;
		<?php endif; ?>
		<?php if( get_option( 'setting_fonts_weight_body' ) ) : ?>
		font-weight: <?php echo get_option( 'setting_fonts_weight_body' ); ?>;
		<?php endif; ?>
		}

		<?php if( get_option( 'setting_fonts_headings' ) ) : ?>
		h1, h2, h3, h4, h5, h6,
		.h1, .h2, .h3, .h4, .h5, .h6 {
			font-family: <?php echo get_option( 'setting_fonts_headings' ); ?>, sans-serif;
			font-weight: <?php echo get_option( 'setting_fonts_weight_headings_bold' ); ?>;
		}
		.h1-light, .h2-light, .h3-light, .h4-light, .h5-light, .h6-light {
			font-weight: <?php echo get_option( 'setting_fonts_weight_headings' ); ?>;
		}
		<?php endif; ?>



	<?php if( get_option( 'setting_fonts' ) ) echo '</style>'; ?>

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<a class="skip-link sr-only" href="#site-content"><?php _e( 'Skip to content', 'sesha' ); ?></a>

<?php get_template_part('template-parts/header/header', 'banner');  ?>