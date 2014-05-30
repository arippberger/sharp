<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sharp
 */
?>
		
		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'sharp' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'sharp' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'sharp' ), 'Sharp', '<a href="http://underscores.me/" rel="designer">arippberger</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->

	</div><!-- .container -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
