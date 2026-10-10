<header class="entry-header">
	<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;
	?>
</header>

<?php if ( has_post_thumbnail() ): ?>
	<?php the_post_thumbnail( 'featured-wide', [ 'class' => 'featured-image' ] ); ?>
<?php endif; ?>

<div class="post-content"><?php the_content(); ?></div>

<footer class="entry-footer">
	<?php _s_entry_footer(); ?>
</footer>
