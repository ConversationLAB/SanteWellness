<?php if ( is_page_template('page-columns-2.php') || is_page_template('page-contact.php') ) :  ?>
		</main>

		<aside id="sidebar" class="site-sidebar / col-4 clearfix" role="complementary">
			<h1 class="sr-only">Sidebar</h1>
			<?php the_field('sidebar_content'); ?>
			<?php dynamic_sidebar( 'sidebar-page-single' ); ?>
		</aside>
	</div> <!-- END .row -->

</div> <!-- END .container -->

<?php endif; ?>