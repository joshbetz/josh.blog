<?php
get_header();
while ( have_posts() ): the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<span class="article-meta">
			<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?><a href="<?php the_permalink(); ?>">#</a></span>
		</span>
	</header>

	<?php if ( has_post_thumbnail() ): ?>
		<?php the_post_thumbnail(); ?>
	<?php endif; ?>

	<div class="post-content"><?php the_content(); ?></div>
</article>
<?php
	if ( is_singular() ):
		the_post_navigation( array( 'prev_text' => '&lsaquo;&nbsp;%title', 'next_text' => '%title&nbsp;&rsaquo;' ) );

		if ( comments_open() || get_comments_number() ):
			//comments_template();
		endif;
	endif;

endwhile;
?>

<?php if ( ! is_singular() ): ?>
<nav class="navigation page-navigation">
	<div class="nav-links">
		<div class="nav-previous"><?php previous_posts_link( '&lsaquo;&nbsp;Previous Page' ); ?></div>
		<div class="nav-next"><?php next_posts_link( 'Next Page&nbsp;&rsaquo;', '' ); ?></div>
	</div>
</nav>
<?php endif;

get_footer();
