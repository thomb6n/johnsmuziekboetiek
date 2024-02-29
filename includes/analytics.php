<?php
add_action( 'woocommerce_thankyou', 'toms_track_purchase_conversion' );

function toms_track_purchase_conversion( $order_id ) {
	if ( ! $order_id ) {
			return;
	}

	$order          = wc_get_order( $order_id );
	$order_total    = $order->get_total();
	$order_shipping = $order->get_shipping_total();
	$order_tax      = $order->get_total_tax();
	?>
	<script>
		gtag('event', 'purchase', {
			"transaction_id": "<?php echo $order->get_order_number(); ?>",
			"value": <?php echo $order_total; ?>,
			"currency": "<?php echo $order->get_currency(); ?>",
			"shipping": <?php echo $order_shipping; ?>,
			"tax": <?php echo $order_tax; ?>
		});
	</script>
	<?php
}
