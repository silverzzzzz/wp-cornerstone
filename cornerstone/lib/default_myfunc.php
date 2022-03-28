<?php

/*==================
  WordPress標準機能
  @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
====================*/
function my_setup() {
  add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
  add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
  add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
  add_theme_support( 'html5', array( /* HTML5のタグで出力 */
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );
}
add_action( 'after_setup_theme', 'my_setup' );
/*===================
 * CSSとJavaScriptの読み込み
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 *====================*/
function my_script_init() {
  wp_enqueue_style( 'ress', get_template_directory_uri() . '/css/ress-min.css', array(), '1.0.0', 'all' );//ressの読み込み
  wp_enqueue_style( 'themestyle', get_template_directory_uri() . '/css/theme-default.css', array(), '1.0.2', 'all' );//テーマデフォルトCSSの読み込み
  wp_enqueue_style( 'style', get_stylesheet_uri(), array(),filemtime( get_template_directory() . '/style.css') );//Stylecssの読み込み
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('jquery'),true );//Scriptの読み込み
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );
/*===========
 * メニューの登録
 *@codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
=============*/
function my_menu_init() {
  register_nav_menus( array(
    'headermenu'  => 'ヘッダーメニュー',
    'utility' => 'ユーティリティメニュー',
    'drawer'  => 'ドロワーメニュー',
  ) );
}
add_action( 'after_setup_theme', 'my_menu_init' );

/*===========================
 * ====JavaScript,CSSの圧縮===*
 * ==========================*/

/*=====================
 * 新着記事一覧・サムネイルの自動リサイズ*
 * =========================*/
//newpost用にカスタムサムネイルサイズを追加
set_post_thumbnail_size(768, 432, true ); // 個別サムネサイズ
add_image_size('newposts_thumbnail', 384, 216, true); //新着記事取得用サイズ

/*===================
 * カスタムcssゾーン
 * ===================*/
//Custom CSS Widget
add_action( 'admin_menu', 'custom_css_hooks' );
add_action( 'save_post', 'save_custom_css' );
add_action( 'wp_head','insert_custom_css' );
function custom_css_hooks() {
  add_meta_box( 'custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high' );
  add_meta_box( 'custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high' );
}
function custom_css_input() {
  global $post;
  echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
  echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
  if ( !wp_verify_nonce( $_POST['custom_css_noncename'], 'custom-css' ) ) return $post_id;
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) return $post_id;
  $custom_css = $_POST['custom_css'];
  update_post_meta( $post_id, '_custom_css', $custom_css );
}
function insert_custom_css() {
  if ( is_page() || is_single() ) {
    if ( have_posts() ) : while ( have_posts() ) : the_post();
      echo '<style type="text/css">' . get_post_meta(get_the_ID(), '_custom_css', true) . '</style>';
    endwhile; endif;
    rewind_posts();
  }
}
?>
