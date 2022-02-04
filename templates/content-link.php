<header class="entry-header">
	<?php
		$link = get_url_in_content( get_the_content() );
		if ( $link ) {
			the_title( '<h1 class="entry-title"><a class="external-link" href="' . esc_url( $link ) . '">', '</a></h1>' );
		} else {
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
	?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php _s_posted_on(); ?>
			<?php _s_posted_by(); ?>
		</div>
	<?php endif; ?>
</header>

<div class="post-content"><?php the_content(); ?></div>
