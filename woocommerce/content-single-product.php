<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$product_title          = get_the_title();
$product_price          = $product->get_price_html();
$product_description    = get_the_content();
$image_id               = $product->get_image_id();
$product_image          = wp_get_attachment_image_url( $image_id, 'large' );
$product_spotify_embed  = get_field( 'product-spotify-embed', $product->ID );
$product_youtube_videos = get_field( 'product-youtube-videos', $product->ID );

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="container">
		<div class="product-content-wrapper">
			<div class="image-wrapper">
				<img src="<?php echo $product_image; ?>" alt="">
			</div>
			<div class="product-information">
				<h1><?php echo $product_title; ?></h1>
				<div class="product-description">
					<?php echo apply_filters( 'the_content', $product_description ); ?>
				</div>
				<p class="price"><?php echo $product_price; ?></p>
				<a href="<?php echo $product->add_to_cart_url(); ?>" class="add-to-cart">
					<?php _e( 'Add to cart', 'toms' ); ?>
				</a>
			</div>
		</div>

		<?php
		if ( $product_youtube_videos ) {
			?>
			<div class="product-videos">
				<h2><?php _e( 'Watch now', 'toms' ); ?></h2>
				<div class="videos-wrapper">
					<?php
					foreach ( $product_youtube_videos as $youtube_video ) {
						$youtube_video_url = $youtube_video['product-youtube-video'];
						?>
						<div class="product-video">
							<?php echo wp_oembed_get( $youtube_video_url ); ?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<?php
		}
		?>

		<?php
		if ( $product_spotify_embed ) {
			?>
			<div class="product-spotify">
				<h2><?php _e( 'Listen now', 'toms' ); ?></h2>
				<div class="spotify-wrapper">
					<?php echo $product_spotify_embed; ?>
				</div>
			</div>
			<?php
		}
		?>

		<div class="related-products">
			<h2><?php _e( 'Related products', 'toms' ); ?></h2>
		</div>
	</div>
</div>


<?php
do_action( 'woocommerce_template_single_add_to_cart' );
do_action( 'woocommerce_after_single_product' );
?>
