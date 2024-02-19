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
