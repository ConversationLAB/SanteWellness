<form role="search" method="get" class="search__form" action="<?php echo home_url( '/' ); ?>">
	<label for="search_label" class="sr-only"><?php _e('Search for:','sesha'); ?></label>
	<input type="search" id="search_label" name="s" placeholder="Search for ..." class="search__input"  autocomplete="off" />

	<button type="submit" class="search__button btn-primary" >
		<span class="sr-only">
			<?php _e('Search','sesha'); ?>
		</span>

		<i class="icon-search"></i>	

	</button>
</form>