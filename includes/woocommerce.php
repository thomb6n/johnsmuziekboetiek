<?php

function toms_product_meta_boxes() {
	remove_meta_box( 'postexcerpt', 'product', 'normal' );
	remove_meta_box( 'commentsdiv', 'product', 'normal' );

	remove_meta_box( 'tagsdiv-product_tag', 'product', 'side' );
	remove_meta_box( 'woocommerce-product-images', 'product', 'side' );
}

add_action( 'add_meta_boxes_product', 'toms_product_meta_boxes', 999 );

function toms_remove_product_types( $types ) {
	unset( $types['grouped'] );
	unset( $types['external'] );
	unset( $types['variable'] );

	return $types;
}
add_filter( 'product_type_selector', 'toms_remove_product_types' );

function toms_product_type_options( $options ) {
	if ( isset( $options['virtual'] ) ) {
		unset( $options['virtual'] );
	}

	if ( isset( $options['downloadable'] ) ) {
		unset( $options['downloadable'] );
	}
	return $options;
}
add_filter( 'product_type_options', 'toms_product_type_options' );

function toms_remove_product_tabs( $tabs ) {
	unset( $tabs['linked_product'] );
	unset( $tabs['attribute'] );
	unset( $tabs['advanced'] );
	return( $tabs );
}
add_filter( 'woocommerce_product_data_tabs', 'toms_remove_product_tabs', 10, 1 );

function toms_disable_reviews() {
	remove_post_type_support( 'product', 'comments' );
}
add_action( 'init', 'toms_disable_reviews' );

function toms_remove_downloads_meta_box() {
	remove_meta_box( 'woocommerce-order-downloads', 'shop_order', 'normal' );
}
add_action( 'add_meta_boxes', 'toms_remove_downloads_meta_box', 999 );
