	</div>

	<?php if ( ! function_exists( 'is_amp_endpoint' ) || ! is_amp_endpoint() ): ?>
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
	<?php endif; ?>

	<?php wp_footer(); ?>
<body>
</html>
