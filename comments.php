<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		
		<div id="comment-title">
			<div class="sidebar"></div>
			<div class="content">
				<h2 class="comments-title">
					<?php
					$_s_comment_count = get_comments_number();
					if ( '1' === $_s_comment_count ) {
						printf(
							/* translators: 1: title. */
							esc_html__( 'One thought on &ldquo;%1$s&rdquo;', '_s' ),
							'<span>' . wp_kses_post( get_the_title() ) . '</span>'
						);
					} else {
						printf( 
							/* translators: 1: comment count number, 2: title. */
							esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $_s_comment_count, 'comments title', '_s' ) ),
							number_format_i18n( $_s_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							'<span>' . wp_kses_post( get_the_title() ) . '</span>'
						);
					}
					?>
				</h2><!-- .comments-title -->

				<?php the_comments_navigation(); ?>
			</div>
		</div>

		<ol class="comment-list">
			<?php
				wp_list_comments( [
					'style'       => 'div',
					'short_ping'  => true,
					'avatar_size' => 60,
					'end-callback' => function() {
						echo '</div></div></div>';
					},
					'callback'    => function( $comment, $args, $depth ) {
						?>
							<div <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
								<div class="comment-author vcard <?php if ( $depth == 1 ) echo 'sidebar' ?>">
									<?php
										// Display avatar unless size is set to 0
										if ( $args['avatar_size'] != 0 ) {
											$avatar_size = ! empty( $args['avatar_size'] ) ? $args['avatar_size'] : 70; // set default avatar size
											echo '<div>';
											echo get_avatar( $comment, $avatar_size );
											echo '</div>';
										}
									?>

									<div><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
										<?php
										/* translators: 1: date, 2: time */
										printf(
											__( '%1$s at %2$s', 'textdomain' ),
											get_comment_date(),
											get_comment_time()
										); ?>
									</a></div>

									<div><?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() );?></div>
								</div>
								<div class="content">
									<?php comment_text(); ?>

									<div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>

									<div class="children">
						<?php
					},
				] );
			?>
		</ol><!-- .comment-list -->

		<div class="comment-footer">
			<div class="sidebar"></div>
			<div class="content">
				<?php
					the_comments_navigation();

					// If comments are closed and there are comments, let's leave a little note, shall we?
					if ( ! comments_open() ) :
						?>
						<p class="no-comments"><?php esc_html_e( 'Comments are closed.', '_s' ); ?></p>
						<?php
					endif;
				?>
			</div>
		</div>

	<?php endif; // Check for have_comments(). ?>

	<div class="comment-footer">
		<div class="sidebar"></div>
		<div class="content"><?php comment_form(); ?></div>
	</div>

</div><!-- #comments -->
