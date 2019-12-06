		<?php if ( is_single() ): ?>
			<nav id="page-navigation">
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
				//comments_template();
			endif; ?>
		<?php endif; ?>

		<?php if ( ! is_single() ): ?>
		<nav id="page-navigation">
			<div class="sidebar"></div>
			<div class="nav-links content">
				<div class="nav-previous"><?php previous_posts_link( '&lsaquo;&nbsp;Previous Page' ); ?></div>
				<div class="nav-next"><?php next_posts_link( 'Next Page&nbsp;&rsaquo;', '' ); ?></div>
			</div>
		</nav>
		<?php endif; ?>
	</div>

	<script>
		function isTouchDevice() {
		 return (('ontouchstart' in window)
			  || (navigator.MaxTouchPoints > 0)
			  || (navigator.msMaxTouchPoints > 0));
		}

		var ypos = 0;
		window.onscroll = function() {
			ypos = window.scrollY;
		};

		setInterval( function() {
			if ( isTouchDevice() ) {
				document.getElementById( 'site-navigation' ).className = '';
			} else if ( window.scrollY < ypos || ypos < 10 ) {
				document.getElementById( 'site-navigation' ).className = 'fixed';
			} else if ( window.scrollY > ypos ) {
				document.getElementById( 'site-navigation' ).className = '';
			}
		}, 100 );
	</script>
	<?php wp_footer(); ?>
<body>
</html>
