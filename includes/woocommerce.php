<?php

// This replaces the address on the my account page
function toms_custom_address_formatting( $address, $customer_id, $name ) {
	$address['address_1'] = $address['address_1'] . ' ' . $address['address_2'];
	unset( $address['address_2'] );
	return $address;
}
add_filter( 'woocommerce_my_account_my_address_formatted_address', 'toms_custom_address_formatting', 10, 3 );

// This replaces the address on the thank you page
function toms_custom_address_formatted_replacement( $replacements, $args ) {
	$replacements['{address_1}'] = $args['address_1'] . ' ' . $args['address_2'];
	$replacements['{address_2}'] = '';
	return $replacements;
}
add_filter( 'woocommerce_formatted_address_replacements', 'toms_custom_address_formatted_replacement', 10, 2 );

// This replaces the address on the order page
function toms_custom_order_address_formatting( $address, $order ) {
	$address['address_1'] = $address['address_1'] . ' ' . $address['address_2'];
	unset( $address['address_2'] );
	return $address;
}
add_filter( 'woocommerce_order_formatted_billing_address', 'toms_custom_order_address_formatting', 10, 2 );

function toms_custom_address_fields( $fields ) {
	$fields['address_1']['label']       = __( 'Street', 'toms' );
	$fields['address_1']['placeholder'] = __( 'Street', 'toms' );
	$fields['address_1']['required']    = true;
	$fields['address_1']['class']       = array( 'form-row-first' );

	$fields['address_2']['label']       = __( 'House number', 'toms' );
	$fields['address_2']['placeholder'] = __( 'House number', 'toms' );
	$fields['address_2']['required']    = true;
	$fields['address_2']['class']       = array( 'form-row-last' );
	$fields['address_2']['label_class'] = array();

	return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'toms_custom_address_fields' );

function toms_product_meta_boxes() {
	remove_meta_box( 'commentsdiv', 'product', 'normal' );
	remove_meta_box( 'tagsdiv-product_tag', 'product', 'side' );
}
add_action( 'add_meta_boxes_product', 'toms_product_meta_boxes', 999 );

function toms_order_meta_boxes() {
	remove_meta_box( 'woocommerce-order-downloads', 'woocommerce_page_wc-orders', 'normal' );
	remove_meta_box( 'order_custom', 'woocommerce_page_wc-orders', 'normal' );
}
add_action( 'add_meta_boxes', 'toms_order_meta_boxes', 999 );

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
	unset( $tabs['shipping'] );
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

function toms_set_quantity_to_one() {
	if ( function_exists( 'WC' ) && WC()?->cart?->get_cart() ) {
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			WC()->cart->set_quantity( $cart_item_key, 1, true );
		}
	}
}
add_action( 'wp_loaded', 'toms_set_quantity_to_one' );

function toms_register_custom_endpoint() {
	add_rewrite_endpoint( 'gla-add-to-cart', EP_ROOT );
}
add_action( 'init', 'toms_register_custom_endpoint' );

function toms_gla_add_to_cart() {
	// Check if the custom-add-cart parameter is set in the URL
	if ( isset( $_GET['gla-add-to-cart'] ) ) {
		// Get the product ID from the URL
		$product_id = $_GET['gla-add-to-cart'];
		$product_id = str_replace( 'gla_', '', $product_id );

		$result = WC()->cart->add_to_cart( $product_id );

		if ( $result ) {
			wp_safe_redirect( wc_get_cart_url() );
			exit;
		}
	}
}
add_action( 'template_redirect', 'toms_gla_add_to_cart' );

function toms_account_wishlist_tab( $menu_items ) {
	$menu_items = array_slice( $menu_items, 0, 2, true ) +
		array( 'wishlist' => __( 'Wishlist', 'toms' ) ) +
		array_slice( $menu_items, 2, null, true );
	return $menu_items;
}
add_filter( 'woocommerce_account_menu_items', 'toms_account_wishlist_tab', 10, 1 );

function toms_wishlist_tab_content() {
	get_template_part( 'template-parts/account-wishlist-tab' );
}
add_action( 'woocommerce_account_wishlist_endpoint', 'toms_wishlist_tab_content' );

function toms_add_wishlist_endpoint() {
	add_rewrite_endpoint( 'wishlist', EP_PAGES ); // 'wishlist' is the endpoint slug
}
add_action( 'init', 'toms_add_wishlist_endpoint' );

add_action( 'wp_ajax_add_to_wishlist', 'toms_add_to_wishlist_ajax' );
add_action( 'wp_ajax_nopriv_add_to_wishlist', 'toms_add_to_wishlist_ajax' );

function toms_add_to_wishlist_ajax() {
	if ( isset( $_POST['product_id'] ) ) {
		$product_id = $_POST['product_id'];
		toms_add_to_wishlist( $product_id );
		wp_send_json_success( 'Product added to wishlist successfully.' );
	} else {
		wp_send_json_error( 'Error: Product ID is missing.' );
	}
}

add_action( 'wp_ajax_remove_from_wishlist', 'toms_remove_from_wishlist_ajax' );
add_action( 'wp_ajax_nopriv_remove_from_wishlist', 'toms_remove_from_wishlist_ajax' );

function toms_remove_from_wishlist_ajax() {
	if ( isset( $_POST['product_id'] ) ) {
		$product_id = $_POST['product_id'];
		toms_remove_from_wishlist( $product_id );
		wp_send_json_success( 'Product removed from wishlist successfully.' );
	} else {
		wp_send_json_error( 'Error: Product ID is missing.' );
	}
}
