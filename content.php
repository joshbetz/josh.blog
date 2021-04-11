<header class="entry-header">
	<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;
	?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			_s_posted_on();
			_s_posted_by();
			?>
		</div>
	<?php endif; ?>
</header>

<?php if ( $url = get_the_post_thumbnail_url() ): ?>
	<img class="featured-image" src="<?php echo esc_url( $url ) ?>" />
<?php endif; ?>

<div class="post-content"><?php the_content(); ?></div>

<footer class="entry-footer">
	<?php _s_entry_footer(); ?>
</footer>
