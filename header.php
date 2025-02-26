<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" type="image/png">

	<?php if ( is_singular() && post_type_supports( get_post_type(), 'excerpt' ) ) : ?>
	<meta name="description" content="<?php echo esc_attr( get_the_excerpt() ); ?>">
	<?php endif; ?>

	<?php // preload the fallback font ?>
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/montserrat-v18-latin-regular.woff2" crossorigin="anonymous" as="font" type="font/woff2">
	<style id="critical-css">
		<?php require get_template_directory() . '/critical.css.php'; ?>
	</style>

	<meta name="theme-color" content="#e3f2f9" media="(prefers-color-scheme: light)">
	<meta name="theme-color" content="#144962" media="(prefers-color-scheme: dark)">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div id="header">
		<div class="content">
			<header>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="Home"><?php echo get_avatar( get_option( 'admin_email' ), 66, '', '', [] ) ;?></a>
				<h1 class="page-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<p class="page-description"><?php echo get_bloginfo( 'description' ); ?></p>
			</header>

			<?php if ( has_nav_menu( 'main' ) || has_nav_menu( 'social' ) ) : ?>
				<div id="site-header-menu" class="site-header-menu">
					<?php if ( has_nav_menu( 'main' ) ) : ?>
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'main',
									'menu_class'     => 'main-menu',
								 ) );
							?>
						</nav>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'social' ) ) : ?>
						<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
								) );
							?>
						</nav>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
