<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php if ( is_singular() && post_type_supports( get_post_type(), 'excerpt' ) ) : ?>
	<meta name="description" content="<?php echo esc_attr( get_the_excerpt() ); ?>">
	<?php endif; ?>

	<?php // preload the fallback font ?>
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/montserrat-v18-latin-regular.woff2" crossorigin="anonymous" as="font" type="font/woff2">
	<style id="critical-css">
		@font-face {
			font-family: 'Montserrat';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local(''),
				url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/montserrat-v18-latin-regular.woff2') format('woff2');
		}
		@font-face {
			font-family: 'Montserrat';
			font-style: italic;
			font-weight: 400;
			font-display: optional;
			src: local(''),
				url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/montserrat-v18-latin-italic.woff2') format('woff2');
		}
		@font-face {
			font-family: 'Montserrat';
			font-style: normal;
			font-weight: 600;
			font-display: optional;
			src: local(''),
				url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/montserrat-v18-latin-600.woff2') format('woff2');
		}
		@font-face {
			font-family: 'Montserrat';
			font-style: italic;
			font-weight: 600;
			font-display: optional;
			src: local(''),
				url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/montserrat-v18-latin-600italic.woff2') format('woff2');
		}

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
				<?php
					$avatar_url = get_theme_file_uri( '/avatar.png' );
					$avatar_src = $avatar_url;
					$avatar_srcset = '';

					if ( function_exists( '\\Imgproxy\\imgproxy' ) ) {
						$avatar_src = \Imgproxy\imgproxy()->image( $avatar_url )->resize( 66, 66 )->url();
						$avatar_src_2x = \Imgproxy\imgproxy()->image( $avatar_url )->resize( 132, 132 )->url();
						$avatar_srcset = sprintf( '%s 1x, %s 2x', $avatar_src, $avatar_src_2x );
					}
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="Home">
					<img class="avatar" src="<?php echo esc_url( $avatar_src ); ?>"<?php if ( $avatar_srcset ) : ?> srcset="<?php echo esc_attr( $avatar_srcset ); ?>"<?php endif; ?> width="66" height="66" alt="" decoding="async">
				</a>
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
