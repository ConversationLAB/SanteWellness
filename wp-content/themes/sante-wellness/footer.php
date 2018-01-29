<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*/

?>
<?php get_sidebar(); // test ?>

<footer id="site-footer" class="site-footer / has-menu-animation  clearfix" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
	<h1 class="sr-only">Footer</h1>
	<div class="container">
		<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
	</div> <!-- END .container -->
</footer>

<div class="page-wrapper-overlay"></div>

<?php wp_footer(); ?>

</body>
</html>
