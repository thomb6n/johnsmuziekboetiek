<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
	<link rel="preconnect" href="https://fonts.gstatic.com" />
	<script src="https://kit.fontawesome.com/84c396f697.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
	<div class="top-bar">
		<div class="container-large">
			<div class="top-bar-content">
				<div class="top-bar-left">
					<?php dynamic_sidebar( 'top-bar-left' ); ?>
				</div>
				<div class="top-bar-right">
					<?php dynamic_sidebar( 'top-bar-right' ); ?>
				</div>
			</div>
		</div>
	</div>
	<header id="site-header" class="site-header-wrapper">
		<div class="container-large">
			<div class="site-header">
				<div class="header-wrapper">
					<div class="site-branding">
						<a id="logo" href="<?php bloginfo( 'wpurl' ); ?>">
							<img src="<?php //echo IMAGEPATH . 'logo.svg'; ?>" alt="Site logo">
							<span class="screen-reader-text"><?php bloginfo( 'sitename' ); ?></span>
						</a>
					</div>

					<div id="menus">
						<nav id="primary-menu" aria-label="Primary menu" aria-expanded="false">
							<?php toms_nav_menu( 'primary' ); ?>
						</nav>
						<nav id="secondary-menu" aria-label="Secondary menu" aria-expanded="false">
							<?php toms_nav_menu( 'secondary' ); ?>
							<div class="menu woocommerce-icons">
								<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>">
									<i class="fa-regular fa-user"></i>
									<span class="screen-reader-text">
										<?php _e( 'Account', 'toms' ); ?>
									</span>
								</a>
								<a href="<?php echo wc_get_cart_url(); ?>">
									<i class="fa-regular fa-shopping-cart"></i>
									<span class="screen-reader-text">
										<?php _e( 'Cart', 'toms' ); ?>
									</span>
								</a>
							</div>
						</nav>
					</div>

					<button id="menu-toggle" type="button" aria-label="Toggle the navigation" data-toggle="closed">
						<i class="fa-regular fa-bars open-icon"></i>
						<i class="fa-regular fa-times close-icon"></i>
						<span class="screen-reader-text">
							<?php _e( 'Menu', 'toms' ); ?>
						</span>
					</button>
				</div>
			</div>
		</div>
	</header>
	<main id="main">
