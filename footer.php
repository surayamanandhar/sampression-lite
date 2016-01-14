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

<footer id="footer">
	<div class="container">
		<div class="columns fourteen">
            <?php do_action( 'sampression_credits' ); ?>
		</div>

		<div class="columns two footer-right">
			<div id="btn-top-wrapper">
			<a href="javascript:pageScroll('.top');" class="btn-top"></a>
			</div>
		</div><!--/footer-right-->

	</div><!--.container-->
</footer><!--#footer-->

<?php 
	   	/** sampression_footer hook **/
	   	do_action( 'sampression_footer' );
	   ?>	
  
<?php wp_footer(); ?>
</body>
</html>