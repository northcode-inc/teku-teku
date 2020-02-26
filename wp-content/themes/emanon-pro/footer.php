<?php
/**
* Template footer
* @package WordPress
* @subpackage Emanon_Pro
* @since Emanon Pro 1.0
*/
?>
<?php emanon_cta_footer_section(); ?>
<?php emanon_cta_popup(); ?>
<!--footer-->
<footer class="footer">
	<?php emanon_footer_sns_follow(); ?>
	<?php emanon_cta_popup_modal_window(); ?>
	<?php get_sidebar( 'footer' ); ?>
	<div class="container">
		<div class="col12">
			<?php emanon_top_page_btn(); ?>
			<?php if ( has_nav_menu( 'footer-nav' ) ) : ?>
			<ul id="menu-footer-nav" class="footer-nav">
			<?php wp_nav_menu( array ( 'theme_location' => 'footer-nav', 'container' => false, 'fallback_cb' => '', 'depth' => '1', 'items_wrap' => '%3$s' ) ); ?>
			<?php if ( function_exists( 'the_privacy_policy_link' ) ) { the_privacy_policy_link( '<li>', '</li>' ); } ?>
			</ul>
			<?php endif; ?>
			<div class="copyright"><small>©️&nbsp;2019&nbsp;<a href="https://yurari-chiro.com/">大和南林間カイロプラクティック整体院　てくてく</a></small></div>
		</div>
	</div>
</footer>
<!--end footer-->
<?php wp_footer(); ?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
</body>
</html>
<?php emanon_html_compress_end(); ?>