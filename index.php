<?php get_header(); ?>

<div class="wrapper">
	<div class="content">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php get_template_part( 'templates/content', get_post_format() ); ?>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<?php if ( is_single() ): ?>
	<?php if ( get_the_author_meta( 'description' ) ): ?>
		<div class="content">
			<div class="author-bio">
				<div class="author-title-wrapper">
					<div class="author-avatar vcard">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
					</div>
					<h2 class="author-title heading-size-4">
						<?php
						printf(
							/* translators: %s: Author name */
							__( 'By %s', 'josh.blog' ),
							esc_html( get_the_author() )
						);
						?>
					</h2>
				</div><!-- .author-name -->
				<div class="author-description">
					<?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ); ?>
					<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php _e( 'View Archive <span aria-hidden="true">&rarr;</span>', 'josh.blog' ); ?>
					</a>
				</div><!-- .author-description -->
			</div><!-- .author-bio -->
		</div>
	<?php endif; ?>

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
			<div class="nav-next"><?php next_posts_link( 'Next Page&nbsp;&rsaquo;' ); ?></div>
		</div>
	</nav>
<?php endif; ?>

<?php get_footer(); ?>
