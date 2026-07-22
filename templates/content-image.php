<?php if ( has_post_thumbnail() ): ?>
	<?php the_post_thumbnail( 'featured-wide', [ 'class' => 'featured-image' ] ); ?>
<?php endif; ?>

<div class="post-content"><?php the_content(); ?></div>

<footer class="entry-footer">
	<?php _s_entry_footer(); ?>
</footer>
