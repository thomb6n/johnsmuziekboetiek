<?php
$layout_name = 'header';

$layouts[ $layout_name ] = array(
	'order'      => 1,
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Header', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'          => 'field_' . $layout_name . '_title',
			'label'        => __( 'Title', 'toms' ),
			'name'         => $layout_name . '_title',
			'type'         => 'text',
			'instructions' => __( 'This is the H1 of the page, it can only be used once per page.', 'toms' ),
			'required'     => 1,
		),
		array(
			'key'   => 'field_' . $layout_name . '_background',
			'label' => __( 'Background', 'toms' ),
			'name'  => $layout_name . '_background',
			'type'  => 'image',
		),
	),
);
