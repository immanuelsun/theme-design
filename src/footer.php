<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Simone
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

        <!-- Footer Widgets -->
        <?php get_sidebar('footer'); ?>

        <!-- Site info -->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'simone' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'simone' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'simone' ), 'Simone', '<a href="http://www.newstreamsdesign.com" rel="designer">Immanuel Sun</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
