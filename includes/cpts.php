<?php

toms_register_post_type(
	'review',
	__( 'Review', 'toms' ),
	__( 'Reviews', 'toms' ),
	array(
		'menu_icon'          => 'dashicons-smiley',
		'supports'           => array( 'title' ),
		'publicly_queryable' => false,
	)
);
