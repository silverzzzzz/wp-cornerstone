<?php get_header(); ?>
<div class="post-content-area up_effect"><!--投稿エリア全体-->
<!-- 記事の情報を取得 -->
  <?php if ( have_posts() ) :
    while ( have_posts() ) :
    the_post();
  ?>
  <?php the_time('Y年m月d日'); ?><?php the_category(', '); ?>
  <span class="post-thetitle"><?php the_title('<h1 class="post-title">','</h1>'); ?></span>
  <figure class="post-thumb" role="img"><?php the_post_thumbnail('full'); ?></figure>
	<article class="entry-body single">
    <?php the_content(); ?>
    <?php endwhile; else: ?>
    <!-- “else”では投稿がない場合に実行 -->
    <p>お探しの記事は見つかりません。</p>
    <!-- ループを「完全に」終了 -->
    <?php endif; ?>
	</article>
</div>
<?php  get_footer();  ?>
