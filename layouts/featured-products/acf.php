<?php
$layout_name = 'featured-products';

$layouts[ $layout_name ] = array(
	'order'      => 1,
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Featured Products', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'      => 'field_' . $layout_name . '_title',
			'label'    => __( 'Title', 'toms' ),
			'name'     => $layout_name . '_title',
			'type'     => 'text',
			'required' => 1,
		),
		array(
			'key'   => 'field_' . $layout_name . '_subtitle',
			'label' => __( 'Subtitle', 'toms' ),
			'name'  => $layout_name . '_subtitle',
			'type'  => 'text',
		),
		array(
			'key'     => 'field_' . $layout_name . '_query',
			'label'   => __( 'Query', 'toms' ),
			'name'    => $layout_name . '_query',
			'type'    => 'radio',
			'choices' => array(
				'latest'     => __( 'Latest', 'toms' ),
				'handpicked' => __( 'Handpicked', 'toms' ),
				'category'   => __( 'Category', 'toms' ),
			),
		),
		array(
			'key'               => 'field_' . $layout_name . '_choice',
			'label'             => __( 'Products', 'toms' ),
			'name'              => $layout_name . '_choice',
			'type'              => 'relationship',
			'post_type'         => 'product',
			'min'               => 1,
			'max'               => 6,
			'return_format'     => 'id',
			'filters'           => array(
				'search',
				'taxonomy',
			),
			'required'          => 1,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_' . $layout_name . '_query',
						'operator' => '==',
						'value'    => 'handpicked',
					),
				),
			),
		),
		array(
			'key'               => 'field_' . $layout_name . '_category',
			'label'             => __( 'Category', 'toms' ),
			'name'              => $layout_name . '_category',
			'type'              => 'taxonomy',
			'taxonomy'          => 'product_cat',
			'field_type'        => 'select',
			'allow_null'        => 0,
			'required'          => 1,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_' . $layout_name . '_query',
						'operator' => '==',
						'value'    => 'category',
					),
				),
			),
		),
	),
);
