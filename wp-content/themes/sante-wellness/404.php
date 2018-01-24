<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<header class="page-header">
	<h1 class="page-title baseline-lg text-center"><?php _e( 'Oops! That page can&rsquo;t be found.', 'sesha' ); ?></h1>
</header>

<div class="row">
	<div class="col-8 col-offset-2">

		<p>This page does not exist. Try searching for something or visit our homepage.</p>

		<div class="baseline-md">
			<?php get_search_form(); ?> 
		</div>

		<p class="text-center">
			<a href="/" class="btn-secondary btn-large">Go Home</a>
		</p>

	</div>
</div>




<?php get_footer(); ?>
