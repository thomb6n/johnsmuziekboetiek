<?php
$layout_name = 'welcome-back';

$layouts[ $layout_name ] = array(
	'order'      => 1,
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Welcome Back', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'     => 'field_' . $layout_name . '_message',
			'label'   => __( 'Message', 'toms' ),
			'name'    => $layout_name . '_message',
			'type'    => 'message',
			'message' => __( 'This is the Welcome Back layout. It will show a personalised message when a user is logged in.', 'toms' ),
		),
	),
);
