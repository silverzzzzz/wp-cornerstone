<?php
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="post-inner">
		<div class="entry-content">
			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', '' ) );
			}
			?>
		</div><!-- .entry-content -->
	</div>
	<div class="section-inner">
		<?php
		edit_post_link();
		?>
	</div>
	<?php
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>
		<div class="comments-wrapper section-inner">
			<?php comments_template(); ?>
		</div>
		<?php
	}
	?>
</article>
