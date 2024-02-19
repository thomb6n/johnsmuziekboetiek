<?php
$layout_name = 'text-column';

$layouts[ $layout_name ] = array(
	'order'      => 1,
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Text Column', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'      => 'field_' . $layout_name . '_content',
			'label'    => __( 'Content', 'toms' ),
			'name'     => $layout_name . '_content',
			'type'     => 'wysiwyg',
			'required' => 1,
		),
	),
);
