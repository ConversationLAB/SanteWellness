<?php if ( is_active_sidebar( 'sidebar' ) ) :  ?>
		</main>

		<aside id="sidebar" class="site-sidebar / col-3 clearfix" role="complementary">
			<h1 class="sr-only">Sidebar</h1>
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</aside>
	</div> <!-- END .row -->

</div> <!-- END .container -->

<?php else : ?>
	</div> <!-- END .container -->
</main>

<?php endif; ?>