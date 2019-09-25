<?php get_header(); ?>



<?php
	

		if ( have_posts() ) {
			while ( have_posts() ) {
				echo '<h1 style="text-align: center;">'. get_the_title() .'</h1>';
				the_post();
				the_content();
			}

		} else {

		_e('Контента нет', 'bets_theme');

		}
		?>


<?php get_footer() ?>