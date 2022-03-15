<?php
/*
 * Template Name: デフォルト
 * Description:サイドバーあり,タイトルエリアあり
 */
get_header(); ?>
<div class="page-content-area up_effect">
<!-- 記事を取得 -->
  <?php
    if ( have_posts() ) {
      while ( have_posts() ) :
      the_post();
  ?>
  <!-- タイトルを出力 -->
  <div class="page-maintitle-area"><!--固定ページタイトルエリア-->
    <?php the_title('<h1 id="page-title">','</h1>'); ?>
  </div>
  <div class="uk-container page-containner">
    <main id="page-main" <?php post_class(); ?> role="main">
      <div class="page-entry-body">
        <?php the_content(); ?>
      </div>
      <?php
        endwhile;
        };
      ?>
    </main>
    <aside id="page-sidebar" role="complementary"><!--サイドバーセクション-->
      <?php get_sidebar( get_post_type() ); ?>
    </aside>
  </div>
</div>
<?php get_footer(); ?>
