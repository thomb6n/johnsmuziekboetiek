<?php
$layout_name = 'reviews';

$layouts[ $layout_name ] = array(
	'order'      => 1,
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Reviews', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'     => 'field_' . $layout_name . '_message',
			'label'   => __( 'Message', 'toms' ),
			'name'    => $layout_name . '_message',
			'type'    => 'message',
			'message' => __( 'This is the reviews layout. It will show all the published reviews.', 'toms' ),
		),
	),
);
