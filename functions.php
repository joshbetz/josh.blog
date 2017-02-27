<?php

if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

add_action( 'after_setup_theme', function() {
	register_nav_menus( array(
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	));

	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
});

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'josh.blog', get_template_directory_uri() . '/style.css', array(), '1.0' );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );
});
