<header class="entry-header">
	<?php
		$link = get_url_in_content( get_the_content() );
		if ( $link ) {
			the_title( '<h1 class="entry-title"><a class="external-link" href="' . esc_url( $link ) . '">', '</a></h1>' );
		} else {
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
	?>
</header>

<div class="post-content"><?php the_content(); ?></div>

<footer class="entry-footer">
	<?php if ( 'post' === get_post_type() ) : ?>
		<?php _s_posted_on(); ?>
	<?php endif; ?>
</footer>
