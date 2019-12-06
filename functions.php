<?php

add_action( 'after_setup_theme', function() {
	register_nav_menus( array(
		'main'  => __( 'Main Site Menu', 'josh.blog' ),
	) );

	// Add support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( '2000', '500' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Switch some default markup to html5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
} );

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=IBM+Plex+Sans:400,400i,500,700&display=swap' );
	wp_enqueue_style( 'josh.blog', get_template_directory_uri() . '/style.css', array( 'google-fonts' ), '2.0.0' );
} );
