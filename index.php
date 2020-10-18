<?php get_header(); ?>

<section id="articles">
	<?php if ( have_posts() ): ?>
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
	<?php else: ?>
		<section id="fourohfour" class="page">
			<div class="sidebar"></div>
			<div class="content">
				<p>No posts found.</p>
				<form>
					<input type=search name=s placeholder=Search...>
					<input type=submit value=Search>
				</form>
			</div>
		</section>
	<?php endif; ?>
</section>

<?php if ( is_single() ): ?>
	<nav class="page-navigation">
		<div class="sidebar"></div>
		<div class="content">
			<?php
				the_post_navigation( array(
					'prev_text' => '&lsaquo;&nbsp;%title',
					'next_text' => '%title&nbsp;&rsaquo;'
				) );
			?>
		</div>
	</nav>

	<?php if ( comments_open() || get_comments_number() ):
		comments_template();
	?>

	<nav class="page-navigation">
		<div class="sidebar"></div>
		<div class="content">
			<?php
				the_post_navigation( array(
					'prev_text' => '&lsaquo;&nbsp;%title',
					'next_text' => '%title&nbsp;&rsaquo;'
				) );
			?>
		</div>
	</nav>

	<?php endif; ?>
<?php endif; ?>

<?php if ( ! is_single() ): ?>
<nav class="page-navigation">
	<div class="sidebar"></div>
	<div class="nav-links content">
		<div class="nav-previous"><?php previous_posts_link( '&lsaquo;&nbsp;Previous Page' ); ?></div>
		<div class="nav-next"><?php next_posts_link( 'Next Page&nbsp;&rsaquo;', '' ); ?></div>
	</div>
</nav>
<?php endif; ?>

<?php get_footer(); ?>
