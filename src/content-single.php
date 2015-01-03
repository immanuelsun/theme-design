<?php
/**
 * @package Simone
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- Featured Image -->
		<?php
		if (has_post_thumbnail()) {
		    echo '<div class="single-post-thumbnail clear">';
		    echo '<div class="image-shifter">';
		    echo the_post_thumbnail('large-thumb');
		    echo '</div>';
		    echo '</div>';
		}
		?>


		<header class="entry-header">

		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'simone' ) );
			if ( $categories_list && simone_categorized_blog() ) {
				printf( '<span class="cat-links">' . __( '%1$s', 'simone' ) . '</span>', $categories_list );
			}
		?>

				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<div class="entry-meta">
					<?php simone_posted_on(); ?>

					<!-- Comments -->
					<?php
					    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
					 		        echo '<span class="comments-link">';
					        comments_popup_link( __( 'Leave a comment', 'simone' ), __( '1 Comment', 'simone' ), __( '% Comments', 'simone' ) );
					        echo '</span>';
					    }
					?>
				</div><!-- .entry-meta -->

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'simone' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			Tags:
			<?php
			    echo get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' );

			    edit_post_link( __( 'Edit', 'simone' ), '<span class="edit-link">', '</span>' );
			?>

		</footer><!-- .entry-footer -->


</article><!-- #post-## -->
