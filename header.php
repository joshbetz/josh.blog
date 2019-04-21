<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" type="image/png">
        <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section id="page">
<header id="page-header">
	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

<?php
	$description = get_bloginfo( 'description', 'display' );
	if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; ?></p>
	<?php endif;

if ( has_nav_menu( 'social' ) ) : ?>
	<nav id="social-navigation" class="social-navigation" role="navigation">
		<?php
			// Social links navigation menu.
			wp_nav_menu( array(
				'theme_location' => 'social',
				'depth'          => 1,
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',
			) );
		?>
	</nav><!-- .social-navigation -->
<?php endif; ?>
</header>
