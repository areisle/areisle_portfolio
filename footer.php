<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package areisle_portfolio
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	    <details>
            <summary>Credits</summary>
            <p>HTML5 and CSS3 Badges adapted from ones created by <a href="http://daphyre.deviantart.com/art/HTML5-Logos-and-Badges-380429526">daPhyre</a> under the Creative Commons Attribution 3.0 Unported license.</p>
        </details>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'areisle_portfolio' ) ); ?>"><?php //printf( esc_html__( 'Proudly powered by %s', 'areisle_portfolio' ), 'WordPress' ); ?></a>
<!--			<span class="sep"> | </span>-->
			<?php //printf( esc_html__( 'Theme: %1$s by %2$s.', 'areisle_portfolio' ), 'areisle_portfolio', '<a href="https://automattic.com/" rel="designer">Abbey Reisle</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
