<?php

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

add_action( 'after_setup_theme', function() {
	register_nav_menus( array(
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	));

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( '600', '400' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
});

add_action( 'customize_register', function( $wp_customize ) {
	$wp_customize->add_setting( 'link_color' , array(
		'default'     => '#4947F9',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
				'label'      => __( 'Link Hover Color', 'josh.blog' ),
				'section'    => 'colors',
				'settings'   => 'link_color',
			)
		)
	);
});

add_action( 'wp_head', function() {
?>
	<style type="text/css">
		a:hover { color: <?php echo get_theme_mod( 'link_color', '#4947F9' ); ?>; }
	</style>
<?php
});

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'josh.blog', get_template_directory_uri() . '/style.css', array(), '1.0' );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );
});
