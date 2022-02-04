<?php if ( $url = get_the_post_thumbnail_url() ): ?>
	<img class="featured-image" src="<?php echo esc_url( $url ) ?>" />
<?php endif; ?>

<div class="post-content"><?php the_content(); ?></div>

<footer class="entry-footer">
	<?php _s_entry_footer(); ?>
</footer>
