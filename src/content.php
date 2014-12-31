<?php
/**
 * @package Simone
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
		if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { // Custom template for the first post on the front page
		    if (has_post_thumbnail()) {
		        echo '<div class="front-index-thumbnail clear">';
		        echo '<div class="image-shifter">';
		        echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'my-simone') . get_the_title() . '" rel="bookmark">';
		        echo the_post_thumbnail('large-thumb');
		        echo '</a>';
		        echo '</div>';
		        echo '</div>';
		    }
		    echo '<div class="index-box';
		    if (has_post_thumbnail()) { echo ' has-thumbnail'; };
		    echo '">';
		} else {
		    echo '<div class="index-box">';
		    if (has_post_thumbnail()) {
		        echo '<div class="small-index-thumbnail clear">';
		        echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'my-simone') . get_the_title() . '" rel="bookmark">';
		        echo the_post_thumbnail('index-thumb');
		        echo '</a>';
		        echo '</div>';
		    }
		}
		?>


		<header class="entry-header">
			<!-- Stciky Post -->
			<?php
			if ( is_sticky() ) {
				echo '<i class="fa fa-thumb-tack sticky-post"></i>';
			}
			?>

			<!-- Categories -->
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'simone' ) );
				if ( $categories_list && simone_categorized_blog() ) {
					printf( '<span class="cat-links">' . __( '%1$s', 'simone' ) . '</span>', $categories_list );
				}
			?>

			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
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
				<?php edit_post_link( __( 'Edit', 'simone' ), '<span class="edit-link">', '</span>' );; ?>
			</div><!-- .entry-meta -->

			<?php endif; ?>

		</header><!-- .entry-header -->

		<!-- First Post with full content, others the excerpt. -->
		<?php
		if ( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) {
			echo '<div class="entry-content">';
			the_content( __( '', 'simone') );
			echo '</div>';
			echo '<footer class="entry-footer">';
			echo '<a href="' . get_permalink() . '" title="' . __('Read', 'simone') . get_the_title() . '" rel="bookmark">Read the article <i class="fa fa-arrow-circle-o-right"></i> </a>';
			echo '</footer> <!-- .entry-footer -->';
		} else { ?>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- /.entry-content -->
			<footer class="entry-footer continue-reading">
				<?php echo '<a href="' . get_permalink() . '" title="' . __('Read', 'simone') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i> </a>'; ; ?>
			</footer><!-- /.entry-footer -->
		<?php } ?>

</article><!-- #post-## -->