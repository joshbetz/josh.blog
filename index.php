<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" type="image/png">
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div id="header">
		<div class="content">
			<h1 class="page-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p><?php echo get_bloginfo( 'description' ); ?></p>

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

	<div class="content">
		<?php
			if ( is_archive() ) {
				the_archive_title( '<h1 class="archive-title">', '</h1>' );
			}
		?>

		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php get_template_part( 'content', get_post_format() ); ?>
				</article>
			<?php endwhile; ?>
		<?php else: ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<p>404. Not Found. Sorry.</p>
				</article>
		<?php endif; ?>
	</div>

	<?php if ( is_single() ): ?>
		<nav class="page-navigation">
			<div class="content">
				<?php
					the_post_navigation( array(
						'prev_text' => '&lsaquo;&nbsp;%title',
						'next_text' => '%title&nbsp;&rsaquo;'
					) );
				?>
			</div>
		</nav>

		<?php if ( comments_open() || get_comments_number() ): ?>
			<div class="content">
				<?php comments_template(); ?>
			</div>

			<div class="content">
				<nav class="page-navigation">
					<?php
						the_post_navigation( array(
							'prev_text' => '&lsaquo;&nbsp;%title',
							'next_text' => '%title&nbsp;&rsaquo;'
						) );
					?>
				</nav>
			</div>
		<?php endif; ?>
	<?php else: ?>
		<nav class="page-navigation">
			<div class="nav-links content">
				<div class="nav-previous"><?php previous_posts_link( '&lsaquo;&nbsp;Previous Page' ); ?></div>
				<div class="nav-next"><?php next_posts_link( 'Next Page&nbsp;&rsaquo;', '' ); ?></div>
			</div>
		</nav>
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="content">
			<?php if ( has_nav_menu( 'main' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Main Menu', '' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'main',
							'menu_class'     => 'main-menu',
						 ) );
					?>
				</nav>
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', '' ); ?>">
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

			<div class="site-info">
				&copy; <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span> <?php echo date( 'Y' ); ?>.
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', '' ) ); ?>"><?php printf( __( 'Proudly powered by %s.', 'josh.blog' ), 'WordPress' ); ?></a>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
