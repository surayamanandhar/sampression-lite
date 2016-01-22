<?php
/**
 * The template for displaying the footer.
 *
 * @package Sampression-Lite
 * @since Sampression Lite 1.0
 */
?>

 </div>
</div>
<!-- #content-wrapper -->
<div class="footer-widget">
   <div class="container">
   <?php get_sidebar(); ?>
   </div>
</div><!-- .footer-widget -->
<footer id="footer">
	<div class="container">
		<div class="columns sixteen">
            <?php do_action( 'sampression_credits' ); ?>
            <div id="btn-top-wrapper">
			<a href="javascript:pageScroll('.top');" class="btn-top"></a>
			</div>
		</div>

	</div><!--.container-->
</footer><!--#footer-->

<?php 
	   	/** sampression_footer hook **/
	   	do_action( 'sampression_footer' );
	   ?>	
  
<?php wp_footer(); ?>
</body>
</html>