<?php

function toms_register_facets( $facets ) {
	$facets[] = array(
		'name'         => 'search',
		'label'        => __( 'Search', 'toms' ),
		'type'         => 'search',
		'placeholder'  => __( 'Search...', 'toms' ),
		'auto_refresh' => 'yes',
	);

	$facets[] = array(
		'name'            => 'category',
		'label'           => __( 'Category', 'toms' ),
		'type'            => 'checkboxes',
		'source'          => 'tax/category',
		'hierarchical'    => 'yes',
		'show_expanded'   => 'yes',
		'ghosts'          => 'no',
		'preserve_ghosts' => 'no',
		'operator'        => 'or',
		'orderby'         => 'display_value',
		'count'           => '-1',
		'soft_limit'      => '-1',
	);

	$facets[] = array(
		'name'         => 'pagination',
		'label'        => __( 'Pagination', 'toms' ),
		'type'         => 'pager',
		'auto_refresh' => 'yes',
		'pager_type'   => 'numbers',
		'inner_size'   => '1',
		'dots_label'   => '…',
		'prev_label'   => '<i class="fa-solid fa-angle-left"></i> ',
		'next_label'   => '<i class="fa-solid fa-angle-right"></i>',
	);

	return $facets;
}
add_filter( 'facetwp_facets', 'toms_register_facets' );
