<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
									<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="search__field" placeholder="Search">
	</div>
</form>