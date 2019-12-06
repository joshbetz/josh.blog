<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" type="image/png">

	<style>
		#page-header {
			<?php if ( has_post_thumbnail() ): ?>
			background: url(<?php echo get_the_post_thumbnail_url(); ?>);
			<?php else: ?>
			background: url(https://i0.wp.com/josh.blog/wp-content/uploads/sites/4/2014/12/DSC01921.jpg?w=2800);
			<?php endif; ?>
			background-size: cover;
			background-position: 50% calc(50% + 50px);
		}
	</style>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page">
		<nav id="site-navigation" class="fixed">
			<div class="sidebar">
				<h1 class="page-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
			<?php
			// Social links navigation menu.
			wp_nav_menu( array(
				'container'      => false,
				'theme_location' => 'main',
				'depth'          => 1,
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',
			) );
			?>
		</nav>

		<div id="page-header">
			<div class="sidebar">
				<?php if ( ! is_singular() ): ?>
				<h2><?php echo get_bloginfo( 'description', 'display' ); ?></h2>
				<p>👋 I'm Josh</p>
				<p>I'm a software engineer on the WordPress VIP team at Automattic.</p>
				<p>I've been running a version of this blog since 2003.</p>
				<p>More information <a href="/about-me">over here</a>.</p>
				<?php endif; ?>
			</div>
		</div>
