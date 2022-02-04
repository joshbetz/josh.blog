<?php get_header(); ?>

<div class="wrapper">
	<div class="content">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title">Not Found</h1>
			<p>Sorry, there's nothing like that here.</p>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
