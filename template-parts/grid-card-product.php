<?php
$product = ! empty( $args['product'] ) ? $args['product'] : get_the_ID();

if ( ! $product instanceof WC_Product ) {
	$product = wc_get_product( $product );
}

$image = $product->get_image_id();
$image = wp_get_attachment_image_url( $image, 'medium' );
$url   = $product->get_permalink();
?>
<div class="grid-card-product">
	<div class="image-wrapper">
		<img src="<?php echo $image; ?>" alt="">
		<div class="product-hover-text">
			<p><i class="fa-solid fa-eye"></i> <?php _e( 'View product', 'toms' ); ?></p>
		</div>
	</div>
	<h3 class="title"><?php echo $product->get_title(); ?></h3>
	<p class="price"><?php echo $product->get_price_html(); ?></p>
	<a href="<?php echo $url; ?>" class="overlay-link">
		<span class="screen-reader-text"><?php echo __( 'View product', 'toms' ) . ' ' . $product->get_title(); ?></span>
	</a>
</div>
