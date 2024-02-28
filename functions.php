<?php

define( 'THEME_DIR', get_stylesheet_directory() );
define( 'IMAGEPATH', get_stylesheet_directory_uri() . '/assets/images/' );

require 'includes/bootstrap.php';
require 'includes/helpers.php';
require 'includes/cpts.php';
require 'includes/taxonomies.php';

if ( class_exists( 'WooCommerce' ) ) {
	require 'includes/woocommerce.php';
}

if ( class_exists( 'FacetWP' ) ) {
	require 'includes/facet-wp.php';
	require 'includes/facets.php';
}

if ( class_exists( 'WPSEO_Options' ) ) {
	require 'includes/yoast.php';
}

if ( class_exists( 'acf' ) ) {
	require 'includes/acf.php';
}

if ( 'https://johnsmuziekboetiek.flywheelstaging.com' === get_site_url() ) {
	add_filter(
		'http_request_args',
		function ( $args, $url ) {
			if ( 0 === strpos( $url, get_site_url() ) ) {
				$args['headers'] = array(
					'Authorization' => 'Basic ' . base64_encode( 'flywheel:lush-stage' ),
				);
			}
			return $args;
		},
		10,
		2
	);
}
