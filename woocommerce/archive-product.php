<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

get_header( 'shop' );

?>
<section class="header has-background" style="background-image: url('<?php echo IMAGEPATH . 'johns-header.jpg'; ?>')">
	<div class="container">
		<div class="content">
			<h1 class="title"><?php woocommerce_page_title(); ?></h1>
		</div>
	</div>
</section>

<section class="products-overview container">
	<aside class="filtering">
		<h2><?php _e( 'Filters', 'toms' ); ?></h2>
		<?php echo facetwp_display( 'facet', 'search' ); ?>
		<?php echo facetwp_display( 'facet', 'product_cat' ); ?>
	</aside>

	<div class="products-grid">
		<?php
		if ( woocommerce_product_loop() ) {
			woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/grid-card', 'product' );
				}
			}

			woocommerce_product_loop_end();
		} else {
			do_action( 'woocommerce_no_products_found' );
		}
		?>
		<nav class="woocommerce-facet-pagination">
			<?php echo facetwp_display( 'facet', 'pagination' ); ?>
		</nav>
	</div>

</section>
<?php

get_footer( 'shop' );
