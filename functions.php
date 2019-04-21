<?php

if ( ! isset( $content_width ) ) {
	$content_width = 700;
}

add_action( 'after_setup_theme', function() {
	register_nav_menus( array(
		'social'  => __( 'Social Links Menu', 'josh.blog' ),
	));

	// Add support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( '700', '400' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Switch some default markup to html5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
});

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,300i,700' );
	wp_enqueue_style( 'josh.blog', get_template_directory_uri() . '/style.css', array( 'google-fonts' ), '2.0.0' );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );
});
