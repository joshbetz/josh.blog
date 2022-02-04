	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="content">
			<?php if ( has_nav_menu( 'main' ) || has_nav_menu( 'social' ) ): ?>
				<div class="footer-menus">
					<?php if ( has_nav_menu( 'main' ) ) : ?>
						<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Main Menu', 'josh.blog' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'main',
									'menu_class'     => 'main-menu',
								 ) );
							?>
						</nav>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'social' ) ) : ?>
						<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'josh.blog' ); ?>">
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

			<div class="site-info">
				<span class="copyright">&copy; <?php echo date( 'Y' ); ?> <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></span>
				<span><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'josh.blog' ) ); ?>"><?php printf( __( 'Powered by %s', 'josh.blog' ), 'WordPress' ); ?></a></span>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
