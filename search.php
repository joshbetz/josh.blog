<?php get_header(); ?>

<div class="wrapper">
	<div class="content">
		<h1 class="entry-title">
			<?php
				printf(
					esc_html__( 'Results for "%s"', 'josh.blog' ),
					'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
				);
			?>
		</h1>

		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php get_template_part( 'templates/archive', get_post_format() ); ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<nav class="page-navigation">
	<div class="nav-links content">
		<div class="nav-previous"><?php previous_posts_link( '&lsaquo;&nbsp;Previous Page' ); ?></div>
		<div class="nav-next"><?php next_posts_link( 'Next Page&nbsp;&rsaquo;' ); ?></div>
	</div>
</nav>

<?php get_footer(); ?>
