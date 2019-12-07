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
			background-image: url(<?php echo joshdotblog_get_header_img_url( get_the_post_thumbnail_url(), 800); ?>);
			background-size: cover;
			background-position: 50% calc(50% + 50px);
		}

		@media only screen and (min-width: 750px) {
			#page-header {
				background-image: url(<?php echo joshdotblog_get_header_img_url( get_the_post_thumbnail_url(), 1000); ?>);
			}
		}

		@media only screen and (min-width: 960px) {
			#page-header {
				background-image: url(<?php echo joshdotblog_get_header_img_url( get_the_post_thumbnail_url(), 2000); ?>);
			}
		}

		@media only screen and (min-width: 1920px) {
			#page-header {
				background-image: url(<?php echo joshdotblog_get_header_img_url( get_the_post_thumbnail_url(), 4000); ?>);
			}
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
				<?php if ( is_home() ): ?>
				<h2><?php echo get_bloginfo( 'description', 'display' ); ?></h2>
				<p>👋 I'm Josh</p>
				<p>I'm a software engineer on the WordPress VIP team at Automattic.</p>
				<p>I've been running a version of this blog since 2003.</p>
				<p>More information <a href="/about-me">over here</a>.</p>
				<?php endif; ?>
			</div>
		</div>
