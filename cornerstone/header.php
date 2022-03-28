<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8"><!--エンコード:UTF-8-->
    <meta name="viewport" content="width=device-width, initial-scale=1"><!--viewportの設定-->
    <?php wp_head(); ?><!--システム・プラグイン用-->
  </head>
<body>
<!--ヘッダーメニュー-->
<header itemscope="itemscope" itemtype="http://schema.org/WPHeader" class="down_effect">
  <div class="header-inner">
    <div class="drawer">
			<div class="header-logo"><a href="<?php echo esc_url(home_url('/')) ?>"><h1><?php bloginfo( 'name' ); ?></h1></a></div>
		</div>
		<?php
			/*
			wp_nav_menu( array(
				'theme_location' => 'headermenu',
				'menu_class'      => '',
				'container'      => 'nav',
				'container_class' => 'menu',
				'container_id' => 'nav-content',
				'depth'          => 1,
			) );
			*/
		?>
	</div>
</header>
