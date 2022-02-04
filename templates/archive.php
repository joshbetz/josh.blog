<header class="entry-header">
	<div class="entry-meta">
		<?php echo posted_on_time_string(); ?>
	</div>

	<?php the_title( '<span class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></span>' ); ?>
</header>
