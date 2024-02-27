<?php
$layout_name = 'timeline';

$layouts[ $layout_name ] = array(
	'order'      => 1,
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Timeline', 'toms' ),
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
			'key'      => 'field_' . $layout_name . '_text',
			'label'    => __( 'Text', 'toms' ),
			'name'     => $layout_name . '_text',
			'type'     => 'text',
			'required' => 1,
		),
		array(
			'key'          => 'field_' . $layout_name . '_milestones',
			'label'        => __( 'Milestones', 'toms' ),
			'name'         => $layout_name . '_milestones',
			'type'         => 'repeater',
			'required'     => 1,
			'min'          => 1,
			'layout'       => 'row',
			'button_label' => __( 'Add milestone', 'toms' ),
			'sub_fields'   => array(
				array(
					'key'      => 'field_' . $layout_name . '_title',
					'label'    => __( 'Title', 'toms' ),
					'name'     => $layout_name . '_title',
					'type'     => 'text',
					'required' => 1,
				),
				array(
					'key'      => 'field_' . $layout_name . '_date',
					'label'    => __( 'Date', 'toms' ),
					'name'     => $layout_name . '_date',
					'type'     => 'text',
					'required' => 1,
				),
			),
		),
	),
);
