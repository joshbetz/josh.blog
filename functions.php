<?php

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', [], '3.4.1' );
	wp_enqueue_style( 'josh.blog', get_template_directory_uri() . '/style.css', [ 'genericons' ], wp_get_theme()->get( 'Version' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

add_filter( 'wp_headers', function( $headers ) {
	$headers[ 'X-Frame-Options' ] = 'SAMEORIGIN';
	$headers[ 'X-XSS-Protection' ] = '1; mode=block';
	$headers[ 'X-Content-Type-Options' ] = 'nosniff';

	return $headers;
} );

add_action( 'after_setup_theme', function() {
	register_nav_menus( array(
		'main' => __( 'Main Site Menu', 'josh.blog' ),
		'social'  => __( 'Social Links Menu', 'josh.blog' ),
	) );

	// Add support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( '8000', '2000' );

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
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'caption',
	] );

	add_theme_support( 'post-formats', [
		'aside',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
	] );
} );

add_filter( 'pre_get_posts', function( $query ) {
	if ( is_archive() || is_search() ) {
		$query->set( 'posts_per_page', 20 );
	}

	return $query;
} );

function posted_on_time_string() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	return sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);
}

if ( ! function_exists( '_s_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function _s_posted_on() {
		$time_string = posted_on_time_string();
		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if ( ! function_exists( '_s_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function _s_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( '_s_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function _s_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

add_filter( 'the_title', function( $title ) {
	$last_space = strrpos( $title, ' ' );

	if ( ! $last_space ) {
		return $title;
	}

	return substr_replace( $title, "\xC2\xA0", $last_space, 1 );
} );
