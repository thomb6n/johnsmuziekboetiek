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
		<div class="container">
			<div class="top-bar-content">
				<div class="top-bar-left">
					<?php dynamic_sidebar( 'topbar-left' ); ?>
				</div>
				<div class="top-bar-right">
					<?php dynamic_sidebar( 'topbar-right' ); ?>
				</div>
			</div>
		</div>
	</div>
	<header id="site-header" class="site-header-wrapper">
		<div class="container">
			<div class="site-header">
				<div class="header-wrapper">
					<div class="site-branding">
						<a id="logo" href="<?php bloginfo( 'wpurl' ); ?>">
							<?php bloginfo( 'sitename' ); ?>
						</a>
					</div>

					<div class="navigation-menu-wrapper">
						<nav id="primary-menu" aria-label="Primary menu" aria-expanded="false">
							<?php toms_nav_menu( 'primary' ); ?>
						</nav>

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

						<button id="menu-toggle" class="toggle-offcanvas" type="button" aria-label="Toggle the navigation" data-toggle="menu-toggle">
							<i class="fa-regular fa-bars open-icon"></i>
							<i class="fa-regular fa-times close-icon"></i>
							<span class="screen-reader-text">
								<?php _e( 'Menu', 'toms' ); ?>
							</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="offcanvas-main" class="offcanvas closed" data-toggler="menu-toggle" style="display: none;">
		<div class="inner">
			<nav id="offcanvas-primary-menu" aria-label="Off-canvas primary menu" aria-expanded="false">
				<?php toms_nav_menu( 'primary' ); ?>
			</nav>
		</div>
		<div class="background-layer"></div>
	</div>

	<main id="main">
