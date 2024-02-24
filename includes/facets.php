<?php

function toms_register_facets( $facets ) {
	$facets[] = array(
		'name'          => 'product_search',
		'label'         => __( 'Search', 'toms' ),
		'type'          => 'search',
		'search_engine' => 'swp_default',
		'placeholder'   => __( 'Search...', 'toms' ),
		'auto_refresh'  => 'yes',
	);

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
		'name'       => 'pagination',
		'label'      => __( 'Pagination', 'toms' ),
		'type'       => 'pager',
		'pager_type' => 'numbers',
		'inner_size' => '1',
		'dots_label' => '…',
		'prev_label' => '<i class="fa-solid fa-angle-left"></i> ',
		'next_label' => '<i class="fa-solid fa-angle-right"></i>',
	);

	$facets[] = array(
		'name'                => 'results_count',
		'label'               => __( 'Results count', 'toms' ),
		'type'                => 'pager',
		'pager_type'          => 'counts',
		// translators: lower, upper and total results count
		'count_text_plural'   => sprintf( __( '%1$s - %2$s of %3$s results', 'toms' ), '[lower]', '[upper]', '[total]' ),
		'count_text_singular' => __( '1 result', 'toms' ),
		'count_text_none'     => __( 'No results', 'toms' ),
	);

	return $facets;
}
add_filter( 'facetwp_facets', 'toms_register_facets' );
