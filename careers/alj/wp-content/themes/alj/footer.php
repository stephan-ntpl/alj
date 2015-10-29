<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage alj
 * @since Twenty Ten 1.0
 */
?>
<footer class="site-footer" style="z-index:75 !important">
			<div class="footer-content">
				<div class="copyright">
					&copy; 2015 Abdul Latif Jameel IPR Company Limited. Permission to use this site is granted strictly subject to the Terms of Use
				</div>
				<nav class="footer-nav">
					<?php
					$menuArgs = array(
						'menu'=>'footer-menu',
						'container' => false,
						'items_wrap' => '%3$s',
						'walker' => new nolist_walker()
						);
						wp_nav_menu($menuArgs);?>
				</nav>
				<div class="alj-website-link">
					<a href="http://www.alj.com" target="_blank">www.alj.com</a>
				</div>
			</div>
		</footer>
		<!-- End Footer -->
		<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/vendors/jqueryui/jquery-ui.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/vendors/jquery.easing/jquery.easing.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/vendors/vunit/vunit.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/vendors/jquery.mmenu/js/jquery.mmenu.min.all.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/vendors/royalslider/jquery.royalslider.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/vendors/owl.carousel/owl.carousel.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/vendors/chosen/chosen.jquery.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/vendors/wow/wow.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/vendors/fixto/fixto.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/js/app.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/js/functions.js"></script>
</body>
</html>
