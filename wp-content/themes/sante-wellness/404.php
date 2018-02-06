<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<header class="page-header">
	<h1 class="page-title h2 baseline-lg text-center">
		<?php _e( 'Oops! That page can&rsquo;t be found.', 'sesha' ); ?>
	</h1>
</header>

<p class="text-center">This page does not exist. Try searching for something or visit our homepage.</p>

<p class="text-center">
	<a href="/" class="btn btn-primary btn-large">Go Home</a>
</p>

<?php get_footer(); ?>
