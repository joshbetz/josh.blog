<header class="entry-header">
	<div class="entry-meta">
		<?php echo posted_on_time_string(); ?>
	</div>

	<?php if ( strlen( get_the_title() ) > 0 ): ?>
		<?php the_title( '<span class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></span>' ); ?>
	<?php else: ?>
		<?php
			$excerpt = get_the_excerpt();
			printf( '<span class="excerpt">%s <a href="%s">#</a></span>', $excerpt, esc_url( get_permalink() ) );
		?>
	<?php endif; ?>
</header>
