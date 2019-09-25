<?php get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
<section id="info" class="info">
		<div class="container">
			<div class="wrapper">
				<div class="about">
					<h2 class="section-title"><?php _e('About Us', 'test'); ?></h2>
					<div class="section-text">
						<?php the_content(); ?>
					</div>
				</div>
				<?php 
						$args = array(
									'posts_per_page' => 2,
									'post_type' => 'news'
								);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) {
						?>
				<div class="news">
					<h2 class="section-title"><?php _e('News', 'test'); ?></h2>
					<?php 
						while ( $query->have_posts() ) {
										$query->the_post();

						?>
					<div class="post d-flex align-items-center">
						<div class="post_thumbnail">
							<img src="<?php the_field('image_for_preview'); ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="post_text">
							<span class="post-date"><?php the_time( 'j, F Y' ); ?></span>
							<p class="post_text_text">
								<?php the_excerpt(); ?>
							</p>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php 
				wp_reset_postdata();
				}	 ?>
			</div>
		</div>
	</section>
<?php 
endwhile; endif;
get_footer(); ?>