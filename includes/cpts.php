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

toms_register_post_type(
	'faq',
	__( 'FAQ', 'toms' ),
	__( 'FAQs', 'toms' ),
	array(
		'menu_icon'          => 'dashicons-testimonial',
		'supports'           => array( 'title', 'editor' ),
		'publicly_queryable' => false,
	)
);
