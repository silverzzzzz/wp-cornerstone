<footer id="footer">
  <div class="footer-inner">
    <?php dynamic_sidebar( 'side-widget' ); ?>
    <div class="footer-nav-area">
      <?php wp_nav_menu( array(
        'theme_location' => 'footer-nav',
        'container' => 'nav',
        'container_class' => 'footer-nav',
        'container_id' => 'footer-nav',
        'fallback_cb' => ''
        ) ); ?>
    </div>
    <div class="copyrightsection theme_bg_color ">
		  <a href="<?php echo home_url() ?>"><p id="copyright">Copyright ©<?php bloginfo( 'name' ); ?> All Rights Reserved.</p></a>
    </div>
  </div>
</footer>
<?php wp_footer(); ?><!--システム・プラグイン用-->
</body>
</html>
