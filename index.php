<?php get_header(); ?>

<section id="articles">
	<?php while ( have_posts() ): the_post(); ?>
	<div>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<aside class="sidebar">
				<div class="sidebar-contents">
					<?php if ( ! is_page() ):?>
					<a class="post-date" href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
					<div class="categories">
						<h3>Categories</h3>
						<?php echo get_the_category_list(); ?>
					</div>
					<div class="tags"><?php echo get_the_tag_list( '<h3>Tags</h3><ul><li>', '</li><li>', '</li></ul>' ); ?></div>
					<?php endif; ?>
				</div>
			</aside>
			<div class="content">
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="post-content"><?php the_content(); ?></div>
			</div>
		<article>
	</div>
	<?php endwhile; ?>
</section>

<?php get_footer(); ?>
