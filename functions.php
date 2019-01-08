<?php

if ( ! isset( $content_width ) ) {
	$content_width = 700;
}

wp_embed_register_handler( 'spotify', '#https?://(open|play)\.spotify\.com/((\w+)/(\w+))#i', function( $matches, $attr, $url, $rawattr ) {
	if ( $matches[3] == "track" ) {
		return sprintf( '<iframe src="https://open.spotify.com/embed/%s" width="100%%" height="80" frameborder="0" allowtransparency="true"></iframe>', $matches[2] );
	} else {
		return sprintf( '<iframe src="https://open.spotify.com/embed/%s" width="100%%" height="380" frameborder="0" allowtransparency="true"></iframe>', $matches[2] );
	}
});

add_action( 'after_setup_theme', function() {
	register_nav_menus( array(
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
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
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:700|Rasa:400,600' );
	wp_enqueue_style( 'josh.blog', get_template_directory_uri() . '/style.css', array( 'google-fonts' ), '1.6.1' );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );
});
