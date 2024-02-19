<?php

define( 'THEME_DIR', get_stylesheet_directory() );
define( 'IMAGEPATH', get_stylesheet_directory_uri() . '/assets/images/' );

require 'includes/bootstrap.php';
require 'includes/helpers.php';
require 'includes/cpts.php';
require 'includes/taxonomies.php';

if ( class_exists( 'FacetWP' ) ) {
	require 'includes/facets.php';
}

if ( class_exists( 'acf' ) ) {
	require 'includes/acf.php';
}
