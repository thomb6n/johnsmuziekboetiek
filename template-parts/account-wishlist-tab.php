<?php
$wishlist = toms_get_wishlist();
?>
<h2><?php _e( 'Your wishlist', 'toms' ); ?></h2>
<table class="wishlist-table">
	<tbody>
		<?php
		foreach ( $wishlist as $product_id ) {
			$_product = wc_get_product( $product_id ); // Get the product object

			if ( $_product ) {
				?>
				<tr class="product-row">
					<td class="product-image">
						<?php echo $_product->get_image(); ?>
					</td>
					<td class="product-name">
						<?php
						echo '<a href="' . esc_url( $_product->get_permalink() ) . '">' . $_product->get_name() . '</a>';
						?>
					</td>
					<td class="product-remove">
						<button class="button remove-from-wishlist" data-product-id="<?php echo $product_id; ?>">
							<span class="screen-reader-text">
								<?php _e( 'Remove', 'toms' ); ?>
							</span>
						</button>
					</td>
				</tr>
				<?php
			}
		}
		?>
	</tbody>
</table>
