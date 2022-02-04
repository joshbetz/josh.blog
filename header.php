<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" type="image/png">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/montserrat-v18-latin-regular.woff2" crossorigin="anonymous" as="font" type="font/woff2">
	<meta name="theme-color" content="#e3f2f9">
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div id="header">
		<div class="content">
			<h1 class="page-title"><?php echo get_avatar( get_option( 'admin_email' ), 60 ) ;?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="page-description"><?php echo get_bloginfo( 'description' ); ?></p>

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
