<?php

toms_register_post_type(
	'review',
	'Review',
	'Reviews',
	array(
		'menu_icon' => 'dashicons-smiley',
		'supports'  => array( 'title' ),
	)
);
