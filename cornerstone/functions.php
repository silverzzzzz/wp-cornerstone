<?php
/*デフォルト関数の取得*/
require_once ('lib/default_myfunc.php' );
/*pタグの自動挿入の停止*/
remove_filter('the_content', 'wpautop'); // 記事の自動整形を無効にする
remove_filter('the_excerpt', 'wpautop'); // 抜粋の自動整形を無効にする
/*------------------------
テーマ内でよく使う処理を記述
-------------------------*/
