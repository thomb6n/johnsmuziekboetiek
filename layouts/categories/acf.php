<?php
$layout_name = 'categories';

$layouts[ $layout_name ] = array(
	'order'      => 1,
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Categories', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'      => 'field_' . $layout_name . '_title',
			'label'    => __( 'Title', 'toms' ),
			'name'     => $layout_name . '_title',
			'type'     => 'text',
			'required' => 0,
		),
		array(
			'key'           => 'field_' . $layout_name . '_categories',
			'label'         => __( 'Categories', 'toms' ),
			'name'          => $layout_name . '_categories',
			'type'          => 'taxonomy',
			'required'      => 1,
			'taxonomy'      => 'product_cat',
			'add_term'      => 0,
			'save_terms'    => 0,
			'load_terms'    => 0,
			'return_format' => 'id',
			'field_type'    => 'multi_select',
			'allow_null'    => 0,
		),
	),
);
