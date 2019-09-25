<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tag -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
  	<title><?php echo wp_get_document_title(); ?></title>
</head>
<body>
	<nav id="menu">
	  <header>
	    <h2><?php _e('Menu', 'test'); ?> <span class="close">&#10006;</span></h2>
	    <?php 

	    $args = [
				'theme_location'  => 'header_menu',
				'container'       => 'nav', 
				'container_class' => 'mob-nav',
				'items_wrap'      => '<ul id="%1$s" class="menu__item">%3$s</ul>',
			];

	    wp_nav_menu( $args );

	    $phone = get_field('phone', 'option');
	    $number_obj = new Phone_Number($phone);
	    $correct_phone = $number_obj->get_valid_number();
	     ?>
		<a href="<?php echo $correct_phone; ?>" class="telephone"><?php echo $phone; ?></a>
	  </header>
	</nav>
	<main id="panel">
	<!-- Content -->
	<header id="header" class="header">
		<div class="top-header">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-3 col-6">
						<a href="<?php echo home_url( '/' ); ?>" class="logo"><img src="<?php the_field('logo', 'option'); ?>" alt="Awesome Design"></a>
					</div>
					<div class="col-lg-3 col-3 ml-auto text-right">
						<a href="<?php echo $correct_phone; ?>" class="tel"><?php echo $phone; ?></a>
						<span class="toggle-btn">&#9776;</span>
					</div>
				</div>
			</div>
		</div>
		<div class="offer-header">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-3">
						<div class="search">
							<?php get_search_form(); ?>
						</div>
					</div>
					<div class="col-lg-6 ml-auto">
									<?php 

					    $args = [
								'theme_location'  => 'header_menu',
								'container'       => 'nav', 
								'container_class' => 'nav',
								'items_wrap'      => '<ul id="%1$s" class="menu d-flex">%3$s</ul>',
							];

					    wp_nav_menu( $args ); ?>
					</div>
					<div class="col-lg-2 text-right">
						<button class="btn offer-header__btn contacts-btn">
							<?php _e('Contact', 'test'); ?>
						</button>
					</div>
				</div>

				<?php 
						$args = array(
									'posts_per_page' => 3,
									'post_type' => 'news'
								);
						$query = new WP_Query( $args );
						if ( $query->have_posts() && is_front_page()) {
						?>

				<div class="row">
					<div class="col-lg-12">
						<div class="offer-carousel">

						<?php 
						while ( $query->have_posts() ) {
										$query->the_post();

						?>
							<div class="slide d-flex">
								<div class="content">
									<span class="slide-date"><img src="<?php echo get_template_directory_uri(); ?>/img/clock.png" class="date" alt="Date"><?php the_time( 'j, F Y' ); ?></span>
									<h1 class="slide-title">
										<?php the_title(); ?>
									</h1>
									<button class="btn slide-button"><?php _e('Read More', 'test'); ?></button>
								</div>
								<div class="offer-image">
									<?php the_post_thumbnail( 'full', array(
																'class' => "offer-image-image"
															)
															); ?>
								</div>
							</div>
							<?php } ?>
							
						</div>
					</div>
				</div>
				<?php 
				wp_reset_postdata();
				}	 ?>
			</div>
		</div>
	</header>	
